<?php
namespace Home\Controller;
use Home\Common\Controller\CommonController;
class TiaozhanController extends CommonController {
    public function Tiaozhan() {
		//显示__app__/home/Tiaozhan/Tiaozhan页面
		$this->display();
	}
	
	/**
	 * 将挑战杯的数据录入数据库
	 */
	public function TiaozhanAddData(){
		// 添加教师信息。
		$TeacherId = $this->addTeacherInfo();
		
		// 添加推荐人信息。
		$RefereeId = $this->addRefereeInfo();
		
		// 添加基本信息
		$BasicReturnArray = $this->addBasicInfo($TeacherId, $RefereeId);
		
		// 添加表格说明（长文本）
		$this->addTableInfo($BasicReturnArray['prj_id'], $BasicReturnArray['bn']);
		
	}
	
	private function addTeacherInfo() {
		$TeacherModel = M('ecnu_mind.tiaozhan_teacher',null);
		// 根据表单提交的POST数据创建数据对象
		$TeacherModel->create();
		// 添加到teacher表并返回主键。
		return $TeacherModel->filter('strip_tags')->add();
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
		return $TeacherModel->data($refereeData)->filter('strip_tags')->add();
	}
	
	private function addBasicInfo($TeacherId, $RefereeId) {
		$BasicModel = M('ecnu_mind.tiaozhan_basic_info',null);
		
		$auto = array (
				array('author2_id','checkNull',1,'function'),
				array('author3_id','checkNull',1,'function'),
				array('author4_id','checkNull',1,'function'),
				array('author5_id','checkNull',1,'function'),
				array('author6_id','checkNull',1,'function'),
				array('prj_date','date',3,'function',array('Y-m-d'))
		);
		// 根据表单提交的POST数据创建数据对象
 		$BasicModel->auto($auto)->create();
// 		$BasicModel->create();
		$BasicData = $BasicModel->data();
		$BasicData['teacher_id'] = $TeacherId;
		$BasicData['referee_id'] = $RefereeId;
		
		// 获取具体表格b1,b2 or b3
		$bn = strtolower($BasicModel->type_selector);
		
		// 入库并返回project id.
		$prj_id = $BasicModel->data($BasicData)->filter('strip_tags')->add();
	
		$returnArray['bn'] = $bn;
		$returnArray['prj_id'] = $prj_id;
		return $returnArray;
	}
	
	private function addTableInfo($prj_id, $bn) {
		$TableModel = M('ecnu_mind.tiaozhan_'.$bn,null);
		$TableModel->create();
		$TableData = $TableModel->data();
		$TableData['prj_id'] = $prj_id;
		$TableModel->data($TableData)->filter('strip_tags')->add();
	}
}
