<?php
namespace Home\Controller;
use Home\Controller\CompController;
class TiaozhanController extends CompController {
    public function Tiaozhan($compId) {
    	$this->assign('compId',$compId);
		//显示__app__/home/Tiaozhan/Tiaozhan页面
		$this->display();
	}
	
	/**
	 * 将挑战杯的数据录入数据库
	 */
	public function TiaozhanAddData(){
		// 向竞赛主表添加竞赛信息，并返回唯一竞赛item的ID
		$compItemID = $this->registerComp();
		
		// 添加教师信息。
		$TeacherId = $this->addTeacherInfo();
		
		// 添加推荐人信息。
		$RefereeId = $this->addRefereeInfo();
		
		// 添加基本信息
		$this->addBasicInfo($compItemID, $TeacherId, $RefereeId);
		
		// 添加表格说明（长文本）
		$this->addTableInfo($compItemID, I('post.type_selector'));
		
	}
	
	private function addTeacherInfo() {
		$TeacherModel = M('ecnu_mind.tiaozhan_teacher',null);
		// 根据表单提交的POST数据创建数据对象
		$TeacherModel->create();
		// 添加到teacher表并返回主键。
		return $TeacherModel->add();
	}
	
	private function addRefereeInfo() {
		$TeacherModel = M('ecnu_mind.tiaozhan_teacher',null);
		// 根据表单提交的POST数据创建数据对象
		$TeacherModel->create();
		// 载入所有referee的属性。
		$refereeData['referee_id'] = $TeacherModel->referee_id;
		$refereeData['referee_name'] = $TeacherModel->referee_name;
		$refereeData['referee_gender'] = $TeacherModel->referee_gender;
		$refereeData['referee_age'] = $TeacherModel->referee_age;
		$refereeData['referee_job'] = $TeacherModel->referee_job;
		$refereeData['referee_add'] = $TeacherModel->referee_add;
		$refereeData['referee_zipcode'] = $TeacherModel->referee_zipcode;
		$refereeData['referee_workphone'] = $TeacherModel->referee_workphone;
		$refereeData['referee_homephone'] = $TeacherModel->referee_homephone;
		// 添加到teacher表并返回主键。
		return $TeacherModel->data($refereeData)->add();
	}
	
	private function addBasicInfo($compItemID, $TeacherId, $RefereeId) {
		$BasicModel = M('ecnu_mind.tiaozhan_info',null);
		
		// 自动校验author2~6的id是否为空，如果为空，赋值为'null'
		// 另外自动添加报名日期
		$auto = array (
				array('author2_id','checkNull',1,'function'),
				array('author3_id','checkNull',1,'function'),
				array('author4_id','checkNull',1,'function'),
				array('author5_id','checkNull',1,'function'),
				array('author6_id','checkNull',1,'function'),
				array('apply_date','date',3,'function',array('Y-m-d'))
		);
		
		// 根据表单提交的POST数据创建数据对象
 		$BasicModel->auto($auto)->create();
// 		$BasicModel->create();
		$BasicData = $BasicModel->data();
		
		// 将竞赛项ID，导师ID和推荐人ID三个外键加入数组
		$BasicData['comp_item_id'] = $compItemID;
		$BasicData['teacher_id'] = $TeacherId;
		$BasicData['referee_id'] = $RefereeId;
		
		$BasicModel->data($BasicData)->add();
	}
	
	private function addTableInfo($compItemID, $bn) {
		$bn = strtolower($bn);
		$TableModel = M('ecnu_mind.tiaozhan_'.$bn,null);
		$TableModel->create();
		$TableData = $TableModel->data();
		$TableData['comp_item_id'] = $compItemID;
		$TableModel->data($TableData)->add();
	}
}
