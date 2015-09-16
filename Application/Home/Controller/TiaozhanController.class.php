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
 		$tiaozhanData['comp_item_id'] = $compItemId;
 		$this->assign($tiaozhanData);
// 		显示__app__/home/Tiaozhan/Tiaozhan_origin_table页面
 		$this->display('Tiaozhan/tiaozhan');
	}
		
	public function Tiaozhan_origin($compItemId) {
		$tiaozhanData = $this->getTiaozhanData($compItemId);	
		
		//C表当前国内外课题研究水平 内容
		$CTable='';
		if ($tiaozhanData[type_selector] == 'B1')
		{
			$B1Type = substr($tiaozhanData[detailed_type],2,1);
			$B2Type = ' ';
			$B3Type = ' ';
			$CTable = $tiaozhanData['b1_9'];
		}
		else if ($tiaozhanData[type_selector] == 'B2')
		{
			$B1Type = ' ';
			$B2Type = substr($tiaozhanData[detailed_type],2,1);
			$B3Type = ' ';
			$CTable = $tiaozhanData['b2_8'];
		}
		else if ($tiaozhanData[type_selector] == 'B3'){
			$B1Type = ' ';
			$B2Type = ' ';
			$B3Type = substr($tiaozhanData[detailed_type],2,1);
			$CTable = $tiaozhanData['b3_10'];
		}
		
		$this ->assign($tiaozhanData);
		$this ->assign('B1Type',$B1Type);
		$this ->assign('B2Type',$B2Type);
		$this ->assign('B3Type',$B3Type);
		$this ->assign('CTable',$CTable);
		
		//显示__app__/home/Tiaozhan/Tiaozhan_origin_table页面
		$this->display('Tiaozhan/tiaozhanView');
	}
	
	/**
	 * 将挑战杯的数据录入数据库
	 */
	public function TiaozhanAddData(){
		// 向竞赛主表添加竞赛信息，并返回唯一竞赛item的ID
		$compItemID = $this->registerComp();
		
		// 添加教师信息。
		if (I('post.teacher_name') !='') { 
			$teacherId = $this->addTeacherInfo();
			$result['teacher_id'] = $teacherId;
		}
		
		// 添加推荐人信息。
		if (I('post.referee_name') !='') {
			$refereeId = $this->addRefereeInfo();
			$result['referee_id'] = $refereeId;
		}
				
		// 添加基本信息
		$this->addBasicInfo($compItemID, $teacherId, $refereeId);
		
		// 添加表格说明（长文本）
		$this->addTableInfo($compItemID, I('post.type_selector'));	
		
		// 返回comp_item_id用于表单更新。
		$result['comp_item_id'] = $compItemID;
		
		$result['submit_mode'] = U('home/Tiaozhan/TiaozhanUpdate','','');
		// 返回添加成功的comp_item_id，teacher_id和referee_id
		$this->ajaxReturn(json_encode($result), 'EVAL');
	}
	
	/**
	 * 更新已有的表单
	 */
	public function TiaozhanUpdate($compItemId){
		$this->checkValid($compItemId);
		
		$result['needUpdateJs'] = 'false';
		//更新表单
		// 更新教师信息。
		if (I('post.teacher_id') != '') {
			$this->updateTeacherInfo();
		} else if (I('post.teacher_name') != '') {
			$_POST['teacher_id'] = $this->addTeacherInfo();
			$result['needUpdateJs'] = 'true';
			$result['teacher_id'] = I('post.teacher_id'); 
		}
			
		// 更新推荐人信息，如果之前不存在则新填加一个推荐人。
		if (I('post.referee_id') != '') {
			$this->updateRefereeInfo();
		} else if (I('post.referee_name') != '') {
			$_POST['referee_id'] = $this->addRefereeInfo();
			$result['needUpdateJs'] = 'true';
			$result['referee_id'] = I('post.referee_id');
		}
		
		
		// 更新基本信息
		$this->updateBasicInfo($compItemId, I('post.teacher_id'), I('post.referee_id'));
		
		// 更新表格说明（长文本）
		$this->updateTableInfo($compItemId, I('post.type_selector'));
		
		// 返回成功信息
		$this->ajaxReturn(json_encode($result), 'EVAL');
		
	}
	
	public function TiaozhanRemove($compItemId) {
		$this->checkValid($compItemId);
		
		
	}
	
	private function addTeacherInfo() {
		$TeacherModel = M('ecnu_mind.tiaozhan_teacher',null);
		// 根据表单提交的POST数据创建数据对象
		$TeacherModel->create();
		// 添加到teacher表并返回主键。
		return $TeacherModel->add();
	}
	
	private function updateTeacherInfo() {
		$TeacherModel = M('ecnu_mind.tiaozhan_teacher',null);
		// 根据表单提交的POST数据创建数据对象
		$TeacherModel->create();
		// 更新teacher。
		$TeacherModel->save();
	}
	
	private function addRefereeInfo() {
		$refereeModel = M('ecnu_mind.tiaozhan_referee',null);
		// 根据表单提交的POST数据创建数据对象
		$refereeModel->create();
		// 添加到teacher表并返回主键。
		return $refereeModel->add();
	}
	
	private function updateRefereeInfo() {
		$refereeModel = M('ecnu_mind.tiaozhan_referee',null);
		// 根据表单提交的POST数据创建数据对象
		$refereeModel->create();
		// 更新teacher表。
		$refereeModel->save();
	}
	
	private function deleteRefereeInfo($compItemId) {
		$TeacherModel = M('ecnu_mind.tiaozhan_teacher',null);
		$TeacherModel->delete($compItemId);
	}
	
	private function addBasicInfo($compItemID, $TeacherId, $RefereeId) {
		$BasicModel = M('ecnu_mind.tiaozhan_info',null);
		
		// 自动校验author2~6的id是否为空，如果为空，赋值为'null'
		// 另外自动添加报名日期
		$auto = array (
				array('author2_id','checkCharNull',1,'function'),
				array('author3_id','checkCharNull',1,'function'),
				array('author4_id','checkCharNull',1,'function'),
				array('author5_id','checkCharNull',1,'function'),
				array('author6_id','checkCharNull',1,'function'),
				array('referee_id','checkIntNull',1,'function'),
				array('teacher_id','checkIntNull',1,'function'),
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
	
	private function updateBasicInfo($compItemID, $TeacherId, $RefereeId) {
		$BasicModel = M('ecnu_mind.tiaozhan_info',null);
	
		// 自动校验author2~6的id是否为空，如果为空，赋值为'null'
		// 另外自动添加报名日期
		$auto = array (
				array('author2_id','checkCharNull',1,'function'),
				array('author3_id','checkCharNull',1,'function'),
				array('author4_id','checkCharNull',1,'function'),
				array('author5_id','checkCharNull',1,'function'),
				array('author6_id','checkCharNull',1,'function'),
				array('referee_id','checkIntNull',1,'function'),
				array('teacher_id','checkIntNull',1,'function'),
				array('apply_date','date',3,'function',array('Y-m-d'))
		);
	
		// 根据表单提交的POST数据创建数据对象
		$BasicModel->auto($auto)->create();
		// 		$BasicModel->create();
		$BasicData = $BasicModel->data();
	
		// 将竞赛项ID，导师ID和推荐人ID三个外键加入数组
		$BasicData['comp_item_id'] = $compItemID;
	
		$BasicModel->data($BasicData)->save();
	}
	
	/**
	 * 删除基本信息
	 * 
	 */
	private function deleteBasicInfo($compItemID) {
		$BasicModel = M('ecnu_mind.tiaozhan_info',null);
		$BasicModel->delete($compItemID);
	}
	
	private function addTableInfo($compItemID, $bn) {
		$bn = strtolower($bn);
		$TableModel = M('ecnu_mind.tiaozhan_'.$bn,null);
		$auto = array (
				array('ip1_date','checkCharNull',1,'function'),
				array('ip2_date','checkCharNull',1,'function'),
		);
		$TableModel->create();
		$TableData = $TableModel->data();
		$TableData['comp_item_id'] = $compItemID;
		
		$TableModel->data($TableData)->add();
	}
	
	private function updateTableInfo($compItemID, $bn) {
		$bn = strtolower($bn);
		$TableModel = M('ecnu_mind.tiaozhan_'.$bn,null);
		$TableModel->create();
		$TableInfo = $TableModel->data();
		
		$checkExist = $TableModel->where('comp_item_id='.$compItemID)->find();
		if (!isset($checkExist)) {
			$this->addTableInfo($compItemID, $bn);
		}
	
		$TableModel->where('comp_item_id='.$compItemID)->save($TableInfo);
	}
	
	private function deleteTableInfo($compItemID) {
		$BasicModel = M('ecnu_mind.tiaozhan_info',null);
		$BasicModel->delete($compItemID);
	}
	
	private function getTiaozhanData($compItemId) {
		$tiaozhanModel = M('ecnu_mind.tiaozhan_info', null);
		$tiaozhanData = $tiaozhanModel->find($compItemId);
		
		// 如果学生id为null转为空字符返回
		$tiaozhanData = $this->replaceNullOfId($tiaozhanData);
		
		// 获取各个子表外键。
		$refereeId = $tiaozhanData['referee_id'];
		$teacherId = $tiaozhanData['teacher_id'];
		$bn = $tiaozhanData['type_selector'];
		
		// 获取子表内容
		$bnModel = M('ecnu_mind.tiaozhan_'.strtolower($bn),null);
		$bnData = $bnModel->field('comp_item_id',true)->find($compItemId);
		
		$teacherModel = M('ecnu_mind.tiaozhan_referee', null);
		$refereeData = $teacherModel->field('referee_id',true)->find($refereeId);
		if ($refereeData == null) $refereeData = array();
		// 将表头的teacher置换为referee.
		
		$teacherData = $teacherModel->field('teacher_id',true)->find($teacherId);
		if ($teacherData == null) $teacherData = array();
			
		$tiaozhanData = array_merge($tiaozhanData, $bnData);
		$tiaozhanData = array_merge($tiaozhanData, $refereeData);
		$tiaozhanData = array_merge($tiaozhanData, $teacherData);
		
		unset($tiaozhanData['comp_item_id']);
		return $tiaozhanData;
	}
		
	private function replaceNullOfId($tiaozhanData) {
		foreach ($tiaozhanData as $key => $val) {
			$newValue= str_replace('null', '', $val);
			$tiaozhanData[$key] = $newValue;
		}
		return $tiaozhanData;
	}
	
	private function checkValid($compItemId) {
		$tiaozhanModel = M('ecnu_mind.tiaozhan_info', null);
		$tiaozhanInfo = $tiaozhanModel->find($compItemId);
		if (!isset($tiaozhanInfo)) {
			$this->ajaxReturn('表单未找到，无法提交，请联系管理员','EVAL');
		}
		$studentid = session('studentid');
		// 检查用户是否有权限修改该表
		$key = array_search($studentid, $tiaozhanInfo);
		if (!preg_match('/author[1-6]_id$/',$key)) {
			$this->ajaxReturn('您无权修改该表单，如有问题请联系管理员','EVAL');
		}
		
		//如果有权限则没有ajax返回。
	}
}
