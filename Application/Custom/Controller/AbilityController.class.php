<?php
namespace Custom\Controller;
use Custom\Common\Controller\CommonController;
class AbilityController extends CommonController{
	
	public function ability() {
		$this->display();
	}
	
	/**
	 * 查询领域
	 */
	public function genField() {
		$fieldTable = M('ecnu_mind.field', null);
		$field = $fieldTable->field('name,description')->select();
		$this->ajaxReturn(json_encode($field));
	}
	/**
	 * 生成数据库内的三级能力的json格式数据
	 */
	public function genDB() {
		// 如果能力表缓存不存在。重新从数据库读取并建立新缓存。
// 		if (!S('ability_table')) {
			// 获取第一级能力设置
			$model_f = M('ecnu_mind.field', null);
			$field = $model_f->field('id,name')->select();
			
			$list1 = array();
			foreach ($field as $f) {
				// 获取第二级能力设置
				$model_d = M('ecnu_mind.direction', null);
				$condition['Field_id'] = $f['id'];
				$direction = $model_d->field('id,name')->where($condition)->select();
				
				$list2 = array();
				foreach ($direction as $d) {
					// 获取第三级能力设置
					$model_a = M('ecnu_mind.ability', null);
					$condition_2['Direction_id'] = $d['id'];
// 					$condition_2['state'] = 'y';
					$condition_2['state'] = array('in', array('y', session('user_id')));
					$condition_2['_logic'] = 'AND';
					$temp = $model_a->field('name')->where($condition_2)->select();
					// urlencode 与 urldecode解决中文编码的问题
					foreach ($temp as $k => $t) {
						$t['name'] = urlencode($t['name']);
						$temp[$k] = $t;
					}
					$list2[urlencode($d['name'])] = $temp;
				}
				
				$list1[urlencode($f['name'])] = $list2;
			}
			// 缓存文件10分钟
// 			S('ability_table',urldecode(json_encode($list1)),array('type'=>'file','expire'=>600));
// 		}
// 		return $this->ajaxReturn(S('ability_table'), "EVAL");
		return $this->ajaxReturn(urldecode(json_encode($list1)), "EVAL");
	}
	
	/**
	 * 根据给定的领域名称，生成对应的方向与能力数据
	 */
	public function getFieldDetail() {
		$fieldName = I('field');
		$fieldModel = M('ecnu_mind.field', null);
		$directionModel = M('ecnu_mind.direction', null);
		$abilityModel = M('ecnu_mind.ability', null);
		$condition['name'] = $fieldName;
		$fieldID = $fieldModel->where($condition)->getField('id');
		$directionTable = $directionModel->where("Field_id=".$fieldID)->select();
		
		$dataToFront = array();
		$cnt = 0;
		foreach ($directionTable as $directionRow) {
			$dataToFrontRow['name'] = $directionRow['name'];
			$abilityTable = $abilityModel->where("Direction_id=".$directionRow['id'])->select();
			$abilityNameArray = array();
			$idx = 0;
			foreach ($abilityTable as $abilityRow) {
				$abilityNameArray[$idx] = $abilityRow['name'];
				$idx++;
			}
			$dataToFrontRow['ability_name'] = $abilityNameArray;
			$dataToFront[$cnt] = $dataToFrontRow;
			$cnt++;
		}
		
		$this->ajaxReturn(json_encode($dataToFront),'EVAL');
	}
	                                        
	public function getAbility() {
		$userAbility = M('ecnu_mind.user_has_ability', null);
		$result = $userAbility->field('Ability_name')->where('User_id='.session('user_id'))->select();
		return $this->ajaxReturn(json_encode($result),"EVAL");
	}
	
	/*
	 * 返回能力编辑界面的内容
	 */
	public function getAbilityEditInfo() {
		$abilityName = I('abilityName');
		$userAbility = M('ecnu_mind.user_has_ability', null);
		$abilityTable = M('ecnu_mind.ability', null);
		
		$abilityInfo = $abilityTable->where("name='".$abilityName."'")->find();
		if (isset($abilityInfo)) {
			// 查询该能力的标签
			$abilityTag = "var abilityTag = '".$abilityInfo['tags']."';";
			
			// 查询拥有该能力的用户的数量
			$peopleCount = $userAbility->where("Ability_id = ".$abilityInfo['id'])->count();
			$peopleCount = "var peopleCount = ".$peopleCount.";";
			
			// 查询用户的自评价
			$queryData['User_id'] = session('user_id');
			$queryData['Ability_id'] = $abilityInfo['id'];
			$userAbility->where($queryData)->find();
			$selfComment = "var selfComment = '".$userAbility->selfcomment."';";
			
			// 返回给前台
			$this->ajaxReturn($abilityTag.$peopleCount.$selfComment, "EVAL");
		}
		// 防止用户通过非法手段注入数据，以及防止数据传输过程中失真。
		else
			$this->ajaxReturn("fail","EVAL");
	}
	
	public function checkAbility() {
		if (I('hasAbility') == "false")
			$this->deleteAbility();
		else
			$this->updateAbility();
	}
	
	public function judgeAbility() {
		// 获取前台传来的数据
		$fieldName 	   = I('fieldName');
		$directionName = I('directionName');
		$abilityName   = I('abilityName');
		$selfComment   = I('selfComment');
		
		if ($abilityName == '') $this->ajaxReturn("ability_empty", "EVAL");
		
		// 创建表的模型
		$fieldTable = M('ecnu_mind.field', null);
		$directionTable = M('ecnu_mind.direction', null);
		$abilityTable = D('ecnu_mind.ability', null);
		
		$fieldTable->where("name='".$fieldName."'")->find();		

		$directionTable->where("name='".$directionName."' AND Field_id='".$fieldTable->id."'")->find();
		
		$abilityInfo = 
		$abilityTable->where("name='".$abilityName."' AND Direction_id='".$directionTable->id."'")->find();

		// 能力已经存在
		if (isset($abilityInfo))
			$this->ajaxReturn("ability_exist", "EVAL");
		else
			$this->ajaxReturn("ability_normal", "EVAL");
	}
	
	public function addAbility() {
		
		// 获取前台传来的数据
		$fieldName 	   = I('fieldName');
		$directionName = I('directionName');
		$abilityName   = I('abilityName');
		$selfComment   = I('selfComment');
		
		// 创建表的模型
		$fieldTable = M('ecnu_mind.field', null);
		$directionTable = M('ecnu_mind.direction', null);
		$abilityTable = D('ecnu_mind.ability', null);
		$userAbility = M('ecnu_mind.user_has_ability', null);
		
		// 在“领域”表和“方向”表中查询信息，准备数据
		$fieldTable->where("name='".$fieldName."'")->find();
		$directionTable->where("name='".$directionName."' AND Field_id='".$fieldTable->id."'")->find();
		
		// 在ability表中新增
		$abilityInfo['name'] = $abilityName;
		$abilityInfo['Direction_id'] = $directionTable->id;
		$abilityInfo['tags'] = ",".$fieldTable->name.",".$directionTable->name.",".$abilityName.",";
		$abilityInfo['people_count'] = 1;
		$abilityInfo['state'] = session('user_id');
		$abilityInfo['_logic'] = "AND";
		$abilityTable->create($abilityInfo);
		$abilityTable->add();
			
		// 在user_has_ability表中新增
		$insertData['User_id'] = session('user_id');
		$insertData['Ability_name'] = $abilityName;
		// 重新查一遍ability表以获取最新插入的数据的id
		$abilityTable->where("name='".$abilityName."' AND Direction_id='".$directionTable->id."'")->find();
		$insertData['Ability_id'] = $abilityTable->id;
		if ($selfComment !== '')
			$insertData['selfComment'] = $selfComment;
		$userAbility->create($insertData);
		$userAbility->add();
			
		$this->ajaxReturn("add_success", "EVAL");
		
	}

	public function searchFieldDirectionAbilityByText() {
		$searchText = I('get.searchText','','htmlspecialchars,strip_tags');
		if ($searchText == "") $this->ajaxReturn(null);
		
		// 拆分字符串，变为单个字符进行LIKE检索
		$likeText = $this->divideLikeStr($searchText);
		$patternStrs = $this->dividePatternStr($searchText);
		$searchCondition["tags"] = array('like', $likeText, 'OR');
	
		// 获得包含传入搜索关键字的领域/方向/能力的名称
		$result = M("ability")->where($searchCondition)->field("name,tags")->select();
	
		// 创建一个必然要使用的user_has_ability的模型。
		$userHasAbilityTable = M('user_has_ability');
	
		// 如果检索目标是能力，直接通过user_has_ability获取所有的符合条件的目标。
		for ($i = 0; $i < count($result); $i++) {
			// 如果没有检测到多个tag集合的情况如（,xx,yy,zz,）是三个tag，用户输入的是xyz，那么应该不允许
			// 这个搜索结果有效，只有保证xyz全部在
			for ($j = 0; $j < count($patternStrs); $j++) {
				$patternStr = $patternStrs[$j];
				if (preg_match($patternStr, $result[$i]['tags'])) {
					$Ability[] =  $result[$i]['name'];
					break;
				}
			}
		}
		for($k = 0;$k < count($Ability); $k++){
			$Direction = M("ability")->where("name='".$Ability[$k]."'")->find()['direction_id'];
			$Field = M("direction")->where("id='".$Direction."'")->find();
			$DirectionName = $Field['name'];
			$FieldName = M("field")->where("id='".$Field['field_id']."'")->field("name")->find()['name'];
			$return[$FieldName][$DirectionName][$k] = $Ability[$k];
		}
		// 返回结果
		$this->ajaxReturn(json_encode($return),'EVAL');
	}
	
	public function searchAbilityByText() {
		$searchText = I('get.searchText','','htmlspecialchars,strip_tags');
		if ($searchText == "") $this->ajaxReturn(null);
	
		// 拆分字符串，变为单个字符进行LIKE检索
		$likeText = $this->divideLikeStr($searchText);
		$patternStrs = $this->dividePatternStr($searchText);
		$searchCondition["upper(tags)"] = array('like', $likeText, 'OR');
	
		// 获得包含传入搜索关键字的领域/方向/能力的名称
		$result = M("ability")->where($searchCondition)->field("name,tags")->select();
	
		// 创建一个必然要使用的user_has_ability的模型。
		$userHasAbilityTable = M('user_has_ability');
	
		// 如果检索目标是能力，直接通过user_has_ability获取所有的符合条件的目标。
		for ($i = 0; $i < count($result); $i++) {
			// 如果没有检测到多个tag集合的情况如（,xx,yy,zz,）是三个tag，用户输入的是xyz，那么应该不允许
			// 这个搜索结果有效，只有保证xyz全部在
			for ($j = 0; $j < count($patternStrs); $j++) {
				$patternStr = $patternStrs[$j];
				if (preg_match($patternStr, $result[$i]['tags'])) {
					$return[] = $result[$i]['name'];
					break;
				}
			}
		}
		// 返回结果
		$this->ajaxReturn($return);
	}
	
	private function divideLikeStr($str) {
		// 根据str间的空格，来分隔字符串
		$strArray1 = explode(" ", $str);
		foreach ($strArray1 as $str) {
			unset($strArray2);
			$strArray2 = str_split_utf8($str);
			$resultStr = implode("%", $strArray2);
			$result[] = "%,%$resultStr%,%";
		}
	
		return $result;
	}
	
	private function dividePatternStr($str) {
		$strArray1 = explode(" ", $str);
		foreach ($strArray1 as $str) {
			unset($strArray2);
			$strArray2 = str_split_utf8($str);
			$resultStr = implode("[^,]*", $strArray2);
			$result[] =  "/,[^,]*".$resultStr."[^,]*,/i";
		}
	
		return $result;
	}
	
	private function deleteAbility() {
		$abilityName = I('abilityName');
		$userAbility = M('ecnu_mind.user_has_ability', null);
		$abilityTable = M('ecnu_mind.ability', null);
		
		$abilityInfo = $abilityTable->where("name='".$abilityName."'")->find();
		if (isset($abilityInfo)) {
			$deleteData['User_id'] = session('user_id');
			$deleteData['Ability_id'] = $abilityInfo['id'];
			$userAbility->where($deleteData)->delete();
			$this->ajaxReturn("delete_success", "EVAL");
		}
		// 防止用户通过非法手段注入数据，以及防止数据传输过程中失真。
		else
			$this->ajaxReturn("fail","EVAL");
	}
	
	private function updateAbility() {
		$abilityName = I('abilityName');
		$selfComment = I('selfComment');
		$userAbility = M('ecnu_mind.user_has_ability', null);
		$abilityTable = M('ecnu_mind.ability', null);
		
		$abilityInfo = $abilityTable->where("name='".$abilityName."'")->find();
		if (isset($abilityInfo)) {
			$insertData['User_id'] = session('user_id');
			$insertData['Ability_name'] = $abilityName;
			$insertData['Ability_id'] = $abilityInfo['id'];
			if ($userAbility->where($insertData)->find() === null) {
				if ($selfComment !== '')
					$insertData['selfComment'] = $selfComment;
				$insertData['_logic'] = 'AND';
				$userAbility->create($insertData);
				$userAbility->add();//插入已有数据
				$this->ajaxReturn("insert_success","EVAL");
			} else {
				$updateData['selfComment'] = $selfComment;
				$userAbility->where($insertData)->save($updateData);//更新已有数据
				$this->ajaxReturn("update_success","EVAL");
			}
		}
		// 防止用户通过非法手段注入数据，以及防止数据传输过程中失真。
		else $this->ajaxReturn("fail","EVAL");
	}
}
?>