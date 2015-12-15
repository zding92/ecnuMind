<?php
namespace Custom\Controller;

class PersonalmainController extends UserinfoController {
	/**
	 * 显示home界面
	 */
	public function personalmain(){
		//$personalMainInfo = $this->getBaseinfo("academy,department,major,name,brief");
		$personalMainInfo = $this->getBaseinfo("complete_steps,unreadmsg_admin_num",true);
		
		// 如果不存在该用户的头像文件夹，使用默认头像
		if (!is_dir("Public/img/photo/".$personalMainInfo['user_id'])) {
			$personalMainInfo['user_id'] = "default";
		} else {
			// 添加时间戳防止浏览器缓存头像图片导致修改完头像后无法立刻显示
			$personalMainInfo["time"] = time();
		}
		
		$this->assign($personalMainInfo);
		$this->display();
	}	
	
	
	/**
	 * 载入个人主页读取用户站内信的方法
	 * 一次性加载3条消息，若未读消息数目大于3条，则全部加载
	 */
	public function loadMessageFromUser(){
		$NotificationForUser = M("user_notification");
		$User = M("user_custom");
		$user_id = session("user_id");
		$offset = I("get.offset");
		$unReadMsgFromUser = $User
						   ->where("user_id = $user_id")
						   ->field("unreadmsg_user_num")
						   ->find();
		$unReadMsgFromUserLength = $unReadMsgFromUser['unreadmsg_user_num'];
		if($unReadMsgFromUserLength > 3){
			$noteSelected = $NotificationForUser
						  ->where("recipient_id = $user_id")
			              ->limit("$offset,$unReadMsgFromUserLength")
					  	  ->order('note_id desc')
						  ->select();
		}
		else{
			$noteSelected = $NotificationForUser
						  ->where("recipient_id = $user_id")
						  ->limit("$offset,3")
						  ->order('note_id desc')
						  ->select();
		}
		
		if(count($noteSelected) == 0) {
			$return[0] = "finished";
			$this->ajaxReturn(json_encode($return),'EVAL');
		}
		
		//判断未读消息数目是否大于limit并对数据库进行修改
		$unReadMsgFromUser['unreadmsg_user_num'] = 0;
		$User->where("user_id = $user_id")->save($unReadMsgFromUser);
		
		//二维数组的行数
		$i = 0;
		//遍历limitedNote:存放指定数目的note
		foreach($noteSelected as $eachNote) {
			//returnToFront为返回至前台的数组
				$temp = $eachNote['sender_id'];
			$result['note_time'] = $eachNote['note_time'];
			$result['note_content'] = $eachNote['note_content'];
			$result['note_sender'] = $User->where("user_id = $temp")
											  ->field('name')
											  ->find()['name'];
		    if (!is_dir("Public/img/photo/".$temp)) {
		   	  $result['photo_path'] = "default";
		    } else {
		  	  $result['photo_path'] = $temp;
		    }
			$result['offset'] = count($noteSelected);//此次加载的消息数目offset
			$result['unReadMsgUserNum'] = $unReadMsgFromUserLength; //距离上次登录的未读消息数目unreadnum
			
			$returnToFront[$i] = $result;
			$i++;
		}
		
		$this->ajaxReturn(json_encode($returnToFront),'EVAL');
	}
	
	/**
	 * 载入个人主页读取管理员通知的方法
	 */
	public function loadMessageFromAdmin() {
		$Custom = M("ecnu_mind.user_custom");	// 构造用户数据基础模型
		$Note = M("ecnu_mind.notification");
		$Academy = M("ecnu_mind.academy");

		$offset = I("get.offset");
		$username = session("user_id");//读取当前用户ID
		$condition['user_id'] = $username;
		//根据user_id找到对应的academy_id

		$noteSelected = $Custom
					  ->where($condition)
		              ->field('academy,unreadmsg_admin_num')
		              ->find();
		$conditionForAcademySelected['name'] = $noteSelected['academy'];
		$academySelected = $Academy
						 ->where($conditionForAcademySelected)
						 ->field('academy_id')
						 ->find();
		
		$map['academy_id'] = array('like',array('%!0!%','%!'.$academySelected['academy_id'].'!%'),'OR');
		//根据academy_id找到对应的行
		$unReadMsgFromAdminLength = $noteSelected['unreadmsg_admin_num'];
		//加载时未读消息数目
		if($unReadMsgFromAdminLength > 3){
			$limitedNote = $Note
						 ->where($map)
						 ->limit("$offset,$unReadMsgFromAdminLength")
						 ->order('note_id desc')
						 ->select();
		}
		else{
			$limitedNote = $Note
						 ->where($map)
						 ->limit("$offset,3")
						 ->order('note_id desc')
						 ->select();
		}
		
		if(count($limitedNote) == 0) {
			$return[0] = "finished";
			$this->ajaxReturn(json_encode($return),'EVAL');
		}
			
			
		//判断未读消息数目是否大于limit并对数据库进行修改
		$noteSelected['unreadmsg_admin_num'] = 0;
		$Custom->where($condition)->save($noteSelected);
		
		//二维数组的行数
		$i = 0;
		//遍历limitedNote:存放指定数目的note
		foreach($limitedNote as $eachNote) {
			//returnToFront为返回至前台的数组
			if(strpos($eachNote['academy_id'], '!0!') > 0 || $eachNote['academy_id'] == '!0!')
				$temp = 0;
			else $temp = $academySelected['academy_id'];	
			$result['note_time'] = $eachNote['note_time'];
			$result['note_detail'] = $eachNote['note_detail'];
			$result['note_academy'] = $Academy->where("academy_id = $temp")
											  ->field('name')
											  ->find()['name'];
			$result['offset'] = count($limitedNote);//此次加载的消息数目offset
			$result['unReadMsgAdminNum'] = $unReadMsgFromAdminLength; //距离上次登录的未读消息数目unreadnum
			$returnToFront[$i] = $result;
			$i++;
		}

		$this->ajaxReturn(json_encode($returnToFront),'EVAL');
		
	}
	public function updateUnreadMsg(){
		$Data = M("ecnu_mind.user_custom",null);	// 构造用户数据基础模型
		$condition['user_id'] = session('user_id');
		$data['unreadmsg_admin_num'] = 0;
		$Data->where($condition)
			 ->save($data);
	}
	
	/**
	 * 返回主界面初始化所需要的数据。
	 */
	public function getMainData() {
		$flag = I('get.flag');
		$chartData = $this->returnChartData($flag);
// 		$this->ajaxReturn($initJs.$chartData, "EVAL");
		$this->ajaxReturn($chartData, "EVAL");
	}
	
	private function returnChartData($flag) {
		// 获取用户id
		if ($flag == "user")
			$userId = session('user_id');
		else
			$userId = $flag;
					
		// 定义饼图各分块的颜色和对应的高亮颜色
		$color     = array('#e74c3c', '#f1c40f', '#2ecc71', '#e67e22', '#3498db', '#1abc9c', '#9b59b6', '#ecf0f1', '#34495e', '#95a5a6');
		$highlight = array('#c0392b', '#f39c12', '#27ae60', '#d35400', '#2980b9', '#16a085', '#8e44ad', '#bdc3c7', '#2c3e50', '#7f8c8d');
	
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
			$no_ability = "no_ability = true;";
			return $no_ability;
		}
	
		// 生成用于构造doughnutData的原始数据
		$rowDoughnutData = array();
		$rowDoughnutData[$list[0]['field_name']] = 1; // 第一个元素
		$len = count($list);
		for ($i = 1; $i < $len; ++$i) {
			$now = $list[$i]['field_name'];
			if ($now != $list[$i - 1]['field_name']) {
				$rowDoughnutData[$now] = 1;
			}
			else {
				$rowDoughnutData[$now]++;
			}
		}
	
		// 生成tab的数据
		$tabs_script = array();
		foreach ($list as $val) {
			$rowName = $val['field_name'].'(项)';
			if ($tabs_script[$rowName] == null)
				//加入tooltip的class，以调用tooltip插件
				$tabs_script[$rowName] = "<p class='tooltip' title='".$val['selfcomment']."'>".$val['ability_name']."</p>";
			else
				$tabs_script[$rowName] = $tabs_script[$rowName]."<p class='tooltip' title='".$val['selfcomment']."'>".$val['ability_name']."</p>";
		}
		$tabs_script = json_encode($tabs_script);
		$tabs_script = 'var tabs = '.$tabs_script.';';
	
		// 生成json数据作为图表内容
		$DoughnutData="var doughnutData = [";
		$idx = 0;
		$len = count($rowDoughnutData);
		foreach ($rowDoughnutData as $key=>$val) {
			$curData = "{value:".$val.",";
			$curData = $curData."color:'".$color[$idx % 10]."',";
			$curData = $curData."highlight:'".$highlight[$idx % 10]."',";
			$curData = $curData."label:'".$key."(项)'}";
			$DoughnutData = $DoughnutData.$curData;
			if ($idx == $len - 1)
				$DoughnutData = $DoughnutData."];";
			else
				$DoughnutData = $DoughnutData.",";
			$idx++;
		}
	
		return $DoughnutData.$tabs_script."no_ability = false;";
	}
	
	
}