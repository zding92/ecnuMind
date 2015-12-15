<?php
namespace Custom\Controller;
use Custom\Common\Controller\CommonController;

class SearchPeopleController extends CommonController {
	public function searchPeople() {
		$this->display();
	}
	
	/**
	 * 发送站内信   
	 */
	public function sendNotification(){
		$user_notification = M("user_notification",null);
		
		//获取收件人ID
		$condition['recipient_id'] = I("post.RecipientId");
		//获取发件人ID
		$condition['sender_id'] = session('user_id');
		//获取上一次向该用户发送站内信系统时间
		$latestTime=$user_notification->where($condition)->max('note_time');
		//获取当前系统时间
		$currentTime=date("Y-m-d G:i:s");
		$seperation = strtotime($currentTime) - strtotime($latestTime);
		//判断如果一天之内已经向该用户发送过站内信，则不允许再次发送
		if($seperation < 86400)
			$this->ajaxReturn("forbidden","EVAL");
		//否则，允许发送站内信，将数据添加至数据库
		else{
			$data['recipient_id'] = I("post.RecipientId");
			$data['sender_id'] = session('user_id');
			$data['note_content'] = I("post.NoteContent");
			$data['note_time'] = date('Y-m-d G:i:s',time());
			$user_notification->add($data);
			
			$Custom = M('ecnu_mind.user_custom');
			$Custom->where("user_id=".$data['recipient_id'])->setInc('unreadmsg_user_num', 1);
			
			$this->ajaxReturn("success","EVAL");
		}
	}
	
	
	/**
	 * 取出所有field
	 */	
	public function getAllFields(){
		$allFieldModel = M("ecnu_mind.field",null);
		$allField = $allFieldModel -> select();
		$arrayCnt = 0;
		foreach ($allField as $allFieldRow){
			$dataToFront[$arrayCnt] = $allFieldRow["name"];
			$arrayCnt++;
		}
		$this->ajaxReturn($dataToFront);
	}
	
	
	/***
	 * 取出所对用的ability中people_count相加最高的20个direction
	 */
	public function getHotDirection(){
		$allDirectionModel = M("ecnu_mind.direction",null);
		$allAblityModel = M("ecnu_mind.ability",null);
		
		//获得所有领域
		$allDirection = $allDirectionModel -> select();
		
		//$DirectionHeatResult为存放每种direction以及其people_count累计值的数组
		$DirectionHeatResult[]['direction_name'] = '';
		$DirectionHeatResult[]['people_count'] = 0;
		$DirectionHeatResultCnt = 0;
		
		foreach ($allDirection as $allDirectionRow){
			//$allRelatedAblity是所有属于某领域的能力
			$allRelatedAblity = $allAblityModel 
								-> where("direction_id=".$allDirectionRow['id'])
								-> select();
			
			//在DirectionHeatResult中存放当前的direction_name
			$DirectionHeatResult[$DirectionHeatResultCnt]['direction_name'] = $allDirectionRow['name'];
			
			//将符合direction的每行ability中的people_count累加，放到DirectionHeatResult[people_count]
			foreach ($allRelatedAblity as $allRelatedAblityRow){
				$DirectionHeatResult[$DirectionHeatResultCnt]['people_count'] += $allRelatedAblityRow['people_count'];		
			}					
			$DirectionHeatResultCnt++;
		}
		//记录排序是否成功
		$sortState = $this->multi_array_sort($DirectionHeatResult,'people_count',SORT_DESC);
 		
		$orderedDirection = array();
		for ($i = 0; $i < min(20, count($DirectionHeatResult)); ++$i)
			array_push($orderedDirection, $DirectionHeatResult[$i]['direction_name']);

		$this->ajaxReturn($orderedDirection);
	}
	
	
	/***
	 * 获取people_count靠前的20个热门能力
	 */
	public function getHotAbility(){
		$allAbilityModel = M('ecnu_mind.ability',null);
		
		$allAbility = $allAbilityModel 
						-> order('people_count desc') 
						-> limit(20)
						-> select();
		
		$hotAbilityToFrontCnt = 0;
		foreach ($allAbility as $allAbilityRow){
			$hotAbilityToFront[$hotAbilityToFrontCnt] = $allAbilityRow["name"];
			$hotAbilityToFrontCnt++;
		}
		
		$this->ajaxReturn($hotAbilityToFront);
	}
	
	//点击“领域”，将对应的“方向”、“能力”显示在屏幕上
	public function getSelectedDirectionAndAbility(){
		//记录所选field名称
		$selectedFieldName = I("get.selectedFieldName");
		
		if (!S("SearchField_$selectedFieldName")) {
			$field = M('ecnu_mind.field');
			$direction = M('ecnu_mind.direction');
			$ability = M('ecnu_mind.ability');
			
			$condition1['name'] = $selectedFieldName;
			
			$selectedFieldID = $field->where($condition1)
												  ->field('id')
												  ->find();
			$condition2['Field_id'] = $selectedFieldID['id'];
			//找出field下所包含direction名称
			$selectedDirection = $direction->where($condition2)
			->field('name,id')
			->select();
			$selectedDirectioncnt = 0;
			$selectedAbilitycnt = 0;
			foreach ($selectedDirection as $eachSelectedDirection){
				$selectedToFront[0][$selectedDirectioncnt] = $eachSelectedDirection['name'];
				$condition3['Direction_id'] = $eachSelectedDirection['id'];
				$selectedAbility = $ability->where($condition3)
				->field('name')
				->select();
				foreach ($selectedAbility as $eachSelectedAbility){
					$selectedToFront[1][$selectedAbilitycnt] = $eachSelectedAbility['name'];
					$selectedAbilitycnt++;
				}
				$selectedDirectioncnt++;
			}
			S("SearchField_$selectedFieldName", $selectedToFront);
		}
		
		$this->ajaxReturn(S("SearchField_$selectedFieldName"));
	}
	
	//点击“方向”，将对应的“能力”显示在屏幕上
	public function getSelectedAbility(){
		//记录所选field名称
		$selectedDirectionName = I("get.selectedDirectionName");
		
		if (!S("SearchDirection_$selectedDirectionName")) {
			$direction = M('ecnu_mind.direction');
			$ability = M('ecnu_mind.ability');
			
			
			$conditon1['name'] = $selectedDirectionName;
			$selectedDirectionID = $direction->where($conditon1)
			->field('id')
			->find();
			$condition2['Direction_id'] = $selectedDirectionID['id'];
			$selectedAbility = $ability->where($condition2)
			->field("name")
			->select();
			$selectedAbilityCnt = 0;
			foreach($selectedAbility as $eachSelectedAbility){
				$selectedAbilityToFront[$selectedAbilityCnt] = $eachSelectedAbility['name'];
				$selectedAbilityCnt++;
			}
			S("SearchDirection_$selectedDirectionName", $selectedAbilityToFront);
		}
		
		$this->ajaxReturn(S("SearchDirection_$selectedDirectionName"));
	}
	
	
	//通过缓存（生成缓存）显示所有学院
	public function getAllAcademy(){
		//如果不存在所有学院的缓存，则生成缓存
		if (!S("allAcademy")){
			$allAcademyModel = M("ecnu_mind.academy",null);
			$allAcademy = $allAcademyModel->select();
			$academyToFrontCnt = 0;
			foreach ($allAcademy as $allAcademyRow){
				$academyToFront[$academyToFrontCnt] = $allAcademyRow["name"];
				$academyToFrontCnt++;
			}
			//添加缓存，缓存生存时间，1小时
			S("allAcademy", $academyToFront, array('type'=>'file','expire'=>3600));
		}
	
		$this->ajaxReturn(S("allAcademy"));
	}
	
	//输入academy,生成缓存，显示所有department
	public function getDepartment(){
		$aimedAcademyName = I("get.aimedAcademy");
		
		//如果不存在search_department_$aimedAcademyName的缓存，则生成缓存
		if(!S("search_department_".$aimedAcademyName)){
			$allAcademyModel = M("ecnu_mind.academy",null);
			$allDepartmentModel = M("ecnu_mind.department",null);
			
			//取出name=$aimedAcademyName的academy行
			$aimedAcademyRow = $allAcademyModel->where("name='$aimedAcademyName'")->find();
			
			//取出对应name=$aimedAcademyName的ID
			$aimedAcademyId = $aimedAcademyRow['academy_id'];
			
			//取出属于$aimedAcademyName的department
			$aimedDepartment = $allDepartmentModel
								->where("academy_id=".$aimedAcademyId)
								->select();
			
			$aimedDepartmentToFrontCnt = 0;
			foreach ($aimedDepartment as $aimedDepartmentRow){
				$aimedDepartmentToFront[$aimedDepartmentToFrontCnt] = $aimedDepartmentRow["name"];
				$aimedDepartmentToFrontCnt++;
			}
			//添加缓存，缓存生存时间，1小时
			S("search_department_".$aimedAcademyName,$aimedDepartmentToFront,array('type'=>'file','expire'=>3600));
			
		}
		$this->ajaxReturn(S("search_department_".$aimedAcademyName));
	}
	
	
	//输入department,生成缓存，显示所有major
	public function getMajor(){
		$aimedDepartmentName = I("get.aimedDepartment");
	
		//如果不存在search_department_$aimedAcademyName的缓存，则生成缓存
		if(!S("search_major_".$aimedDepartmentName)){
			$allDepartmentModel = M("ecnu_mind.department",null);
			$allMajorModel = M("ecnu_mind.major",null);
				
			//取出name=$aimedDepartmentName的department行
			$aimedDepartmentRow = $allDepartmentModel->where("name='$aimedDepartmentName'")->find();
				
			//取出对应name=$aimedDepartmentName的ID
			$aimedDepartmentId = $aimedDepartmentRow['department_id'];
				
			//取出属于$aimedDepartmentName的major
			$aimedMajor = $allMajorModel
			->where("department_id=".$aimedDepartmentId)
			->select();
				
			$aimedMajortToFrontCnt = 0;
			foreach ($aimedMajor as $aimedMajorRow){
				$aimedMajorToFront[$aimedMajorToFrontCnt] = $aimedMajorRow["name"];
				$aimedMajorToFrontCnt++;
			}
			//添加缓存，缓存生存时间，1小时
			S("search_major_".$aimedDepartmentName,$aimedMajorToFront,array('type'=>'file','expire'=>3600));
				
		}
		$this->ajaxReturn(S("search_major_".$aimedDepartmentName));
	}
	
	
	/**
	 * 多维数组排序
	 * $multi_array:多维数组名称
	 * $sort_key:二维数组的键名
	 * $sort:排序常量	SORT_ASC || SORT_DESC
	 */
	private function multi_array_sort(&$multi_array,$sort_key,$sort=SORT_DESC){
		if(is_array($multi_array)){
			foreach ($multi_array as $row_array){
				if(is_array($row_array)){
					//把要排序的字段放入一个数组中，
					$key_array[] = $row_array[$sort_key];
				}else{
					return false;
				}
			}
		}else{
			return false;
		}
		//对多个数组或多维数组进行排序
		array_multisort($key_array,$sort,$multi_array);
		return true;
	}
	
	
	public function searchByCondition(){

		$result = $this->searchNow();
		foreach ($result as $key => $user) {
			if ($user['student_id'] == session('student_id')) {
				// 将自己从返回结果中去除
				unset($result[$key]);
				continue;
			}
			
			if (!is_dir("Public/img/photo/".$user['user_id'])) {
				$result[$key]['photo_path'] = "default";
			} else {
				$result[$key]['photo_path'] = $user['user_id'];
			}
		}
		$result = $this->getUserAbility($result);
		
		if ($result!=null) 
			$this->ajaxReturn(json_encode($result));
		else 
			$this->ajaxReturn(null);
	}
	
	private function searchNow() {
		$abilities = I("get.abilities",'');
		$directions = I("get.directions",'');
		$academys = I("get.academies",'');
		$offset = I("get.offset", '');

		if ($abilities == '') $abilities = array();
		if ($directions == '') $directions = array();
		if ($academys == '') $academys = array();
		
		// 获取能力、方向、学院信息，并将其拆分为数组，在string两端加上单引号以供sql检索
		$abilities = explode(",", $abilities);
		$abilities = sqlPreHandle($abilities);
		
		$directions = explode(",", $directions);
		$directions = sqlPreHandle($directions);
		
		$academys = explode(",", $academys);
		
		// 计算有几个能力、方向
		$abilityCount = count($abilities);
		$directionCount = count($directions);
		$academyCount = count($academys);
		
		//将预处理过的子串数组转化为string
		$abilities = implode(",", $abilities);
		$directions = implode(",", $directions);
		
		// 初始化模型
		$user_has_ability_info = M("ecnu_mind.user_has_ability");
		$user_custom = M("ecnu_mind.user_custom");
		
		// 下面sql要求direction和ability条件的数量皆大于0
		
		if ($abilityCount > 0 && $directionCount > 0) {
			// 嵌套查询：
			// 1, 查询user_has_ability表中包含能力条件的行。
			// 2, 将其以user_id分组，将相同user_id的行合并为一行，算出满足条件的能力个数：（user_id, abilityCount）.
			// 3, 嵌套查询，在分组结果中判断能力个数是否与输入的能力个数相等，如果相等则表示符合条件。
			$user_ids = $user_has_ability_info->query("select tmp1.user_id
														from(
															select user_id, count(distinct Direction_name) as cnt1
															from ecnu_mind.user_has_ability
															where Direction_name IN ($directions)
															group by user_id
												 		) as tmp1
														inner join (
															select user_id, count(distinct Ability_name) as cnt2
															from ecnu_mind.user_has_ability
															where Ability_name IN ($abilities)
															group by user_id
														) as tmp2
														on tmp1.user_id = tmp2.user_id and tmp1.cnt1 = $directionCount and tmp2.cnt2 = $abilityCount");
		} 
		// 无direction条件
		else if ($abilityCount > 0) {
			$user_ids = $user_has_ability_info->query("  select user_id
															from(
																select user_id, count(distinct Ability_name) as cnt
																from ecnu_mind.user_has_ability
																where Ability_name IN ($abilities)
																group by user_id ) as tmp
															where cnt = $abilityCount");
		}
		// 无ability条件
		else if ($directionCount > 0) {
			$user_ids = $user_has_ability_info->query("  select user_id
															from(
																select user_id, count(distinct Direction_name) as cnt
																from ecnu_mind.user_has_ability
																where Direction_name IN ($directions)
																group by user_id ) as tmp
															where cnt = $directionCount");
		} 
		// 只有学院条件
		else if ($academyCount > 0) {
			$condition['academy'] = array("in", $academys, "OR");
			// 根据条件查询
			$result = M("user_custom")->where($condition)->field("unreadmsg_admin_num,complete_steps",true)->limit($offset,5)->select();
			if (count($result) == 0) return null;
			// 直接返回用户信息
			return $result;
		} 
		// 无条件
		else {
			return null;
		}
			
		// 如果不存在符合条件的用户
		if (count($user_ids) == 0) return null;
		
		// 将二维数组转化为一维数组
		foreach ($user_ids as $key=>$val) {
			$user_ids[$key] = $val["user_id"];
		}
		
		// 构造用户id筛选条件		
		$condition['user_id'] = array('in', $user_ids, "OR");	
		if ($academyCount > 0) {
			$condition['academy'] = array('in', $academys, "OR");
			$condition['_logic'] = "AND";
		}
				
		// 取出个人信息：
		$users = $user_custom->where($condition)->field("unreadmsg_admin_num,complete_steps",true)->limit($offset,5)->select();
		return  $users;
	}
	
	private function searchByOtherCondition($users) {		
		// 如果没有任何检索条件，直接返回空
		if (I("get.abilities") == "" && I("get.academys") == "" && I("get.directions") == "") return null;
		
		$academys = I("get.academys","");
		
		//  将符合搜索结果的user的能力加入返回前台的数据当中
		//$users = $this->getUserAbility($users);
		
		//  如果不包含其他检索条件。则只返回由能力检索出来的结果
		if ($academys == "") 	return $this->getUserAbility($users);
			
		// 不为空，将其分割位数组
		$academys = explode(",", $academys);
		
		// 如果存在能力筛选出来的用户
		if ($users != null) {
			// 判断条件，如果不存在符合的学院，则不返回这一条数据
			foreach ($users as $key=>$val) {
				if (in_array($val["academy"], $academys)) 
					$result[] = $users[$key];
			}
		} else {
			$condition['academy'] = array("in", $academys, "OR");
			// 根据条件查询
			$result = M("user_custom")->where($condition)->select();
			if (count($result) == 0) return null;
		}
		return $this->getUserAbility($result);
	}

	//搜索数据库将检索到的符合条件的用户的能力置入users['field']中，若该用户还未设置能力，则置users['no_ability']
	//为true，否则为false
	 private function getUserAbility($users){
	 	$user_has_ability = M('ecnu_mind.user_has_ability');
	 	foreach($users as $key=>$val){
	 		$userId = $users[$key]['user_id'];
	 		// 获取当前用户的领域和能力信息
	 		$Model = new \Think\Model();
	 		$list = $Model->query("SELECT selfComment, field.name AS field_name, ability.name AS ability_name
					   FROM user_has_ability JOIN ability JOIN  direction JOIN field
					   ON user_has_ability.Ability_id = ability.id AND
							 	 ability.Direction_id = direction.id AND
							       direction.Field_id = field.id
					   WHERE user_has_ability.User_id ='".$userId."'");
	 		
	 		// 判断用户是否不具备能力
	 		if (empty($list)) {
	 			$users[$key][$no_ability] = "true";
	 			break;
	 		}
	 		
	 		$colorTable = array();
	 		$index = 0;
	 		foreach ($list as $val) {
	 			$rowName = $val['field_name'];
	 			if ($colorTable[$rowName] == null)
	 				$index = 0;
	 			$colorTable[$rowName][$index]['abilityName'] = $val['ability_name'];
	 			$colorTable[$rowName][$index]['selfComment'] = $val['selfcomment'];
	 			$index++;
	 		}
	 		$users[$key]["field"] = $colorTable;
	 		$users[$key]["no_ability"] = "false";
	 	}
	 	return $users;
	} 
	
	/**
	 * 构造多维的返回数组$return[用户ID][用户属性]([能力序号])=用户属性值（或者能力名）
	 * eg. $return['14']['name'] == 'a' -->id为14的用户名字叫做a.
	 *  或者$return['14']['abilities'][2] == 'javascript' -->id为14的用户拥有的第三个符合搜索条件的能力是javascript
	 * @param Array $userHasAbility 用于构建返回数组
	 * @param Array $return 用于判断一个用户是否有多个能力，如果有将这个用户合并为一行，并用数组形式展现其拥有的能力
	 */
	private function constructReturnUser($userHasAbility, $return) {
		$userCustom = M("ecnu_mind.user_custom");
		$col = array();
		foreach ($userHasAbility as $col) {
			// 如果返回数组中不包含某个在userhasAbility中的用户，则通过user_custom表检索出来。
			if (!isset($return[$col['user_id']])) {
				$user = $userCustom->field("id,unreadmsg_admin_num,complete_steps",true)->find($col['user_id']);
				$return[$col['user_id']] = $user;
			}
			// 向该用户的abilities数组加入他拥有的所有能力
			$return[$col['user_id']]['abilities'][] = $col['ability_name'];
		}
		
		return $return;
	}
	
}