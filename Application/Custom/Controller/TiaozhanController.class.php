<?php
namespace Custom\Controller;
use Custom\Controller\CompController;
class TiaozhanController extends CompController {
	private $tiaozhanModel;

	private function createModel() {
		$this->tiaozhanModel = D('TiaozhanInfo');
	}
	
    public function Tiaozhan($compId) {
    	$initData['comp_id'] = $compId;
    	$initData['submit_mode'] = U('Custom/Tiaozhan/TiaozhanAddData','','');
    	$this->assign($initData);
		//显示__app__/home/Tiaozhan/Tiaozhan页面
		$this->display();
	}
	
	public function Tiaozhan_modify($compItemId) {
		$this->createModel();
		$this->checkValid($compItemId);		
 		$tiaozhanData = $this->getTiaozhanData($compItemId);
 		$tiaozhanData['submit_mode'] = U('Custom/Tiaozhan/TiaozhanUpdate','','');
 		$tiaozhanData['comp_item_id'] = $compItemId;
 		$this->assign($tiaozhanData);
// 		显示__app__/home/Tiaozhan/Tiaozhan_origin_table页面
 		$this->display('Tiaozhan/tiaozhan');
	}
		
	public function Tiaozhan_origin($compItemId) {
		$this->createModel();
		$this->checkValid($compItemId);
		
		$tiaozhanData = $this->getTiaozhanData($compItemId, true);	
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
		
		$this->checkAccess(I('post.'),'not_in_author');
		
		$this->createModel();			
	
		// 通过post构造并验证挑战杯报名信息
		if(!$this->tiaozhanModel->create()) {
			$this->ajaxReturn($this->tiaozhanModel->getError(), 'EVAL');
		}
		
		$participentId = $this->getParticipantId();
		// 向竞赛主表添加竞赛信息，并返回唯一竞赛item的ID
		$compItemID = $this->registerComp($participentId);
		
		$tiaozhanData = $this->tiaozhanModel->data();
		$tiaozhanData['comp_item_id'] = $compItemID;
		$tiaozhanData = $this->clearBTable($tiaozhanData);
		
		$this->tiaozhanModel->data($tiaozhanData)->filter('strip_tags')->add();
		
		// 返回comp_item_id用于表单更新。
		$result['operation_info'] = 'added';
		$result['comp_item_id'] = $compItemID;
		$result['submit_mode'] = U('Custom/Tiaozhan/TiaozhanUpdate','','');
		
		// 返回添加成功的comp_item_id
		$this->ajaxReturn(json_encode($result), 'EVAL');
	}
	
	/**
	 * 更新已有的表单
	 */
	public function TiaozhanUpdate(){
		$this->createModel();
		$this->checkValid(I('post.comp_item_id'));
		
		if(!$this->tiaozhanModel->create()) {
			$this->ajaxReturn($this->tiaozhanModel->getError(), 'EVAL');
		}
		
		$participentId = $this->getParticipantId();
		$this->updateCompParticipant($participentId);
		
		$this->tiaozhanModel->filter('strip_tags')->save();
		
		$this->ajaxReturn('updated', 'EVAL');
	}
	
	public function TiaozhanRemove($compItemId) {
		$this->createModel();
		$this->checkValid($compItemId);
		
		$this->tiaozhanModel->delete($compItemId);
		$this->deleteComp($compItemId);
		
		$this->ajaxReturn('deleted', 'EVAL');
	}

	/**
	 * 返回用户该项竞赛的详细信息。
	 * @param string $compItemId 竞赛报名表单id。 
	 * @param boolean $returnAuthorDetail 是否返回参与者详细信息。
	 */
	private function getTiaozhanData($compItemId, $returnAuthorDetail=FALSE) {
		$tiaozhanData = $this->tiaozhanModel->find($compItemId);
		
		// 检测是否需要返回用户详细信息。
		if ($returnAuthorDetail) {
			foreach ($tiaozhanData as $key => $val) {
				if (preg_match('/author[1-6]_id$/',$key) && isset($val)) {
					$custom = M('user_custom');
					$key = str_replace('id', 'info', $key);
					$tiaozhanData[$key] = 
						$custom->where("student_id=$val")->field("brief,user_id,complete_steps", true)->find(); 
				}
			}
		}
		
		// 将所有null转为空字符返回
		$tiaozhanData = $this->replaceNullOfId($tiaozhanData);

		// 返回指定B表的内容
		$tiaozhanData = $this->clearBTable($tiaozhanData);
		
		return $tiaozhanData;
	}
		
	private function replaceNullOfId($tiaozhanData) {
		foreach ($tiaozhanData as $key => $val) {
			$newValue= str_replace('null', '', $val);
			$tiaozhanData[$key] = $newValue;
		}
		return $tiaozhanData;
	}
	
	private function clearBTable($tiaozhanData) {
		$typeSelector = strtolower($tiaozhanData['type_selector']);
		foreach ($tiaozhanData as $key => $val) {
			// 如果是选择器选中的b表，留下，如果不是选择器选中的b表过滤掉。
			if (preg_match('/^'.$typeSelector.'/', $key)) continue;
			if (preg_match('/^b[1-3]_/', $key)) unset($tiaozhanData[$key]);
		}	
		return $tiaozhanData;
	}
	
	private function checkValid($compItemId) {
		$tiaozhanInfo = $this->checkExist($compItemId);
		$this->checkAccess($tiaozhanInfo, 'access_denied');
		//如果有权限则没有ajax返回。
	}
	
	/**
	 * 检查是否存在表单，如果存在返回找到的数据
	 */ 
	private function checkExist($compItemId) {
		$tiaozhanInfo = $this->tiaozhanModel->
						field('author1_id,author2_id,author3_id,author4_id,author5_id,author6_id')->
						find($compItemId);
		if (!isset($tiaozhanInfo)) {
			$this->ajaxReturn('not_found','EVAL');
		}
		return $tiaozhanInfo;
	}
	
	/**
	 * 检查用户权限。
	 */
	private function checkAccess($checkData, $errorInfo) {
		$studentId = session('student_id');
		$key = array_search($studentId, $checkData);
		if (!preg_match('/author[1-6]_id$/',$key)) {
			$this->ajaxReturn($errorInfo, 'EVAL');
		}
	}
	
	/**
	 * 将存在的author_id变为整体数组返回
	 */
	private function getParticipantId() {
		$data = $this->tiaozhanModel->data();
		$return = array();
		foreach ($data as $key=>$val) {
			if (preg_match('/^author[1-6]_id$/',$key)) {
				if(isset($val)) {
					$return[] = $val;
				}
			}	
		}
		return $return;
	}
}
