<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Common\Controller\CommonController;
class NotificationController extends CommonController {
    public function notification(){
    	$this->returnAdminAccess();
    	$this->display();
  	}
  	
  	public function getNoteInfo() {
  		$noteModel = M("ecnu_mind.notification",null);
  		$User = M("ecnu_mind.user_admin",null);
  		$user_id = session('user_id');
  		$academy_id = session('access_id');
  		if ($academy_id != 0) {
  			$map['academy_id'] = array('like',array('%!0!%','%!'.$academy_id.'!%'),'OR');
  			$allNote = $noteModel->where($map)->select();
  		} else {
  			$allNote = $noteModel->select();
  		}
  		$this->ajaxReturn(json_encode($allNote), "EVAL");
  	}
  	
  	public function showRecipient(){
  		$recipientModal = M("ecnu_mind.academy",null);
  		$where['academy_id'] = array('NEQ',0);
  		$allrecipient = $recipientModal->where($where)->select();
  		$this->ajaxReturn(json_encode($allrecipient),"EVAL");
  	}
  	
  	public function noteRemove(){
  		$noteModel = M("ecnu_mind.notification",null);//实例化数据库模型
  		$removeNoteId = I('post.removeNoteId');//取得前台所传需要删除note_id
  		$note = $noteModel->find($removeNoteId);
  		$accessId = session('access_id');
  		// 如果这条通知仅仅是校级管理员发给该院系的或者该院系自己发出的，该院系有权删除
  		if ($note['academy_id'] == "!$accessId!" || $accessId == '0') {
  			$noteModel->where("note_id = $removeNoteId")->delete();//删除数据
  			$this->ajaxReturn("removeSuccess","EVAL");
  		} else {
  			$this->ajaxReturn('removeFail');
  		}
  	}
  	public function academyNum(){
  		$academyNum = M("ecnu_mind.academy")->count();
  		$this->ajaxReturn(json_encode($academyNum),"EVAL");
  	}
  	
  	public function noteSave(){
  		$Note = M("ecnu_mind.notification",null);//实例化数据库对象
  		$User = M("ecnu_mind.user_admin",null);
  		$Custom = M('ecnu_mind.user_custom');
  		
  		$user_id = session('user_id');
  		//将 收件院系索引处理为"!X!"格式
  		$academy = I('post.note_academy');
  		if(null == $academy) {
  			$academyStr = $User ->where("user_id = $user_id")
							  			->field('access_id')
							  			->find()['access_id'];
			$academyArray[0] = $academyStr;
  			// 更新与当前管理员同院系的学生的未读信息
  			$this->updateUnreadMsgNum($academyArray);
  			
  			$academyStr = "!".$academyStr."!";
  		} else {
  			$academyArray = explode(',', $academy);
  			// 更新与当前管理员同院系的学生的未读信息
  			$this->updateUnreadMsgNum($academyArray);
  			$academyStr = "!".implode('!', $academyArray)."!";
  		}
  			

  		//如果是校级管理员，则对每一个被选中的academy_id都生成一条消息并加入数据库
  		//否则，只生成academy_id为当前管理员academy的消息并加入数据库
  		$data['academy_id'] = $academyStr;
  		$data['note_title'] = I('post.note_title');
  		$data['note_detail'] = I('post.note_detail');
  		$data['note_time'] = date('Y-m-d G:i:s',time());
  		$Note->add($data);
  		$this->ajaxReturn("success","EVAL");
  	}
  	
  	private function updateUnreadMsgNum($target) {
  		if ($target[0] == '0') {
  			$Dao = M();
  			$Dao->execute("UPDATE user_custom SET unreadmsg_admin_num=unreadmsg_admin_num+1");
  		} else {
  			$Custom = M('ecnu_mind.user_custom');
  			$Academy = M('ecnu_mind.academy');
  			$condition['academy_id'] = array('in', $target);
  			$AcademyArr = $Academy->where($condition)->getField("name",true);
  			$UserBelong['academy'] = array('in', $AcademyArr);
  			$Custom->where($UserBelong)->setInc('unreadmsg_admin_num',1);
  		}
  	}
}