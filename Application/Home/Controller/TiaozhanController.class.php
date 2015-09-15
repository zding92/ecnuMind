<?php
namespace Home\Controller;
use Home\Controller\CompController;
class TiaozhanController extends CompController {
    public function Tiaozhan($compId) {
    	$initData['comp_id'] = $compId;
    	$initData['submit_mode'] = U('home/Tiaozhan/TiaozhanAddData','','');
    	$this->assign($initData);
		//显示__app__/home/Tiaozhan/Tiaozhan页面
		$this->display();
	}
	
	public function Tiaozhan_modify($compItemId) {
 		$tiaozhanData = $this->getTiaozhanData($compItemId);
 		$tiaozhanData['submit_mode'] = U('home/Tiaozhan/TiaozhanUpdate','','');
 		$this->assign($tiaozhanData);
// 		显示__app__/home/Tiaozhan/Tiaozhan_origin_table页面
 		$this->display('Tiaozhan/tiaozhan');
	}
	
	public function Tiaozhan_origin($compItemId) {
		$tiaozhanData = $this->getTiaozhanData($compItemId);
		$this->assign($tiaozhanData);
		
		$CTable='';//C表当前国内外课题研究水平 内容
		if ($tiaozhanData[type_selector] == 'B1')
		{
			$B1Type = substr($tiaozhanData[detailed_type],2,1);
			$B2Type = ' ';
			$B3Type = ' ';
			$CTable = $tiaozhanData[b1_9];
		}
		else if ($tiaozhanData[type_selector] == 'B2')
		{
			$B1Type = ' ';
			$B2Type = substr($tiaozhanData[detailed_type],2,1);
			$B3Type = ' ';
			$CTable = $tiaozhanData[b2_8];
		}
		else if ($tiaozhanData[type_selector] == 'B3'){
			$B1Type = ' ';
			$B2Type = ' ';
			$B3Type = substr($tiaozhanData[detailed_type],2,1);
			$CTable = $tiaozhanData[b3_10];
		}
		
		$this ->assign('B1Type',$B1Type);
		$this ->assign('B2Type',$B2Type);
		$this ->assign('B3Type',$B3Type);
		$this ->assign('CTable',$CTable);
		//显示__app__/home/Tiaozhan/Tiaozhan_origin_table页面
		$this->display('Tiaozhan/tiaozhanView');
	}
	
	public function tiaozhanView() {
		//显示__app__/home/Tiaozhan/tiaozhanView页面
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
	
	/**
	 * 更新已有的表单
	 */
	public function TiaozhanUpdate(){
		// emID = $this->getUpdateTarget();
	
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
		$refereeData['teacher_name'] = I('post.referee_name');
		$refereeData['teacher_gender'] = I('post.referee_gender');
		$refereeData['teacher_age'] = I('post.referee_age');
		$refereeData['teacher_job'] = I('post.referee_job');
		$refereeData['teacher_add'] = I('post.referee_add');
		$refereeData['teacher_zipcode'] = I('post.referee_zipcode');
		$refereeData['teacher_workphone'] = I('post.referee_workphone');
		$refereeData['teacher_homephone'] = I('post.referee_homephone');
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
	
	private function getTiaozhanData($compItemId) {
		$tiaozhanModel = M('ecnu_mind.tiaozhan_info', null);
		$tiaozhanData = $tiaozhanModel->find($compItemId);
		
		// 如果学生id为null转为空字符返回
		$tiaozhanData = $this->replaceNullOfId($tiaozhanData);
		
		// 获取各个子表外键,并删除两个teacher外键（不需要返回前台的值全部清空）。
		$refereeId = $tiaozhanData['referee_id'];
		unset($tiaozhanData['referee_id']);
		$teacherId = $tiaozhanData['teacher_id'];
		unset($tiaozhanData['teacher_id']);
		$bn = $tiaozhanData['type_selector'];
		
		// 获取子表内容
		$bnModel = M('ecnu_mind.tiaozhan_'.strtolower($bn),null);
		$bnData = $bnModel->field('comp_item_id',true)->find($compItemId);
		
		$teacherModel = M('ecnu_mind.tiaozhan_teacher', null);
		$refereeData = $teacherModel->field('teacher_id',true)->find($refereeId);
		// 将表头的teacher置换为referee.
		$refereeData = $this->changeTeacherToReferee($refereeData);
		$teacherData = $teacherModel->field('teacher_id',true)->find($teacherId);

		// 将子表内容合并入tiaozhanData 并返回。
		$tiaozhanData = array_merge($tiaozhanData, $bnData);
		$tiaozhanData = array_merge($tiaozhanData, $refereeData);
		$tiaozhanData = array_merge($tiaozhanData, $teacherData);
		
		unset($tiaozhanData['comp_item_id']);
		return $tiaozhanData;
	}
	
	private function changeTeacherToReferee($refereeData) {
		foreach ($refereeData as $key => $val) {
			$newKey = str_replace('teacher', 'referee', $key);
			$refereeData[$newKey] = $val;
			unset($refereeData[$key]);
		}
		return $refereeData;
	}
	
	private function replaceNullOfId($tiaozhanData) {
		foreach ($tiaozhanData as $key => $val) {
			$newValue= str_replace('null', '', $val);
			$tiaozhanData[$key] = $newValue;
		}
		return $tiaozhanData;
	}
}
