<?php
namespace Custom\Controller;
use Custom\Controller\CompController;
class CompApplyController extends CompController {
	
    public function compApply($compId) {
    	$this->$compId = $compId;
    	$val = $this->getTemplateValue($compId, 'add', false);
		
    	//assign all useful data to Front End
    	$this->assign($val);
    	    	
		$this->display();
	}
	
	public function saveBaseInfo() {
		$fromForm=I('post.');
		$this->checkBeforeModify($fromForm);
		
		$participentId = $this->getParticipantId($fromForm);
		
		// 向竞赛主表添加竞赛信息，并返回唯一竞赛item的ID
		$compItemID = $this->registerComp($participentId);

		$return['compItemID'] = $compItemID;
		$return['submitMode'] = 'update';
		$this->ajaxReturn($return);
	}
	
	public function updateBaseInfo() {
		$fromForm=I('post.');
		$this->checkBeforeModify($fromForm);
	
		// 修改竞赛报名者信息
		$participentId = $this->getParticipantId($fromForm);
		$this->updateCompParticipant($participentId);
		
		// 提交简介和名称信息
		$data['comp_item_name'] = $fromForm['comp_item_name'];
		$data['comp_item_brief'] = $fromForm['b'];
		//$data['comp_item_brief'] = str_ireplace("\r\n","<br>",$fromForm['b']);
		$data['comp_item_id'] = $fromForm['comp_item_id'];
		M('ecnu_mind.competition_main')->save($data);
		
		$this->ajaxReturn("updated");
	}

	public function showUpdateView($compItemId) {
		$compId = M('ecnu_mind.competition_main')->find($compItemId)['comp_type_id'];
		
		$return = $this->getTemplateValue($compId, 'update', false);
		$return['comp_item_id'] = $compItemId;
		
		$this->assign($return);
		$this->display("CompApply");
	}
	
	public function removeApply($compItemId) {
		$compMain = M("ecnu_mind.competition_main");
		// 如果已经通过审批，则无法删除
		$compState = $compMain->field("comp_state")->find($compItemId)["comp_state"];
		
		if ($compState == "待审批") {
			$success = $compMain->delete($compItemId);
			if ($success) $this->ajaxReturn("deleted");
			else $this->ajaxReturn("remove failed");
		} else {
			$this->ajaxReturn("can_not_remove");
		}
	}
	
	/**
	 * 实际上该函数仅作为上传文件/页面跳转/提交模式变化的功能。
	 * 用户基本信息已经由saveBaseInfo完成了。
	 */
	public function submitForm() {
		$compItemID = I('post.comp_item_id');
		$compId = I('post.comp_id');
		$fileName = $_FILES['compApplyFile']['name'];
		$fileName = explode('.', $fileName)[0];
		// 检测操作者是否是该报名的参与者。
		$this->isParticipant($compItemID);
		
		$status = $this->getTemplateValue($compId, 'update', true);
		$status['comp_item_id'] = $compItemID;
		
		//将上传的文件放置在./Public/CompItemApply目录下的$compItemID目录下，如果fileName为空，不调用此函数。 
		if ($fileName != '') {
			//$fileName = iconv("UTF-8","gb2312",$fileName);
			uploadFile('./Public/CompItemApply',"/$compItemID/","$fileName");
		}

		$this->assign($status);
		$this->display("CompApply");
	}
	
	public function getCompItemInfo() {
		$compItemId = I('get.comp_item_id');
		$compItemInfo = M('ecnu_mind.competition_main')->find($compItemId);
		
		// 获取报名简介和竞赛名称
		$return['comp_item_name'] = $compItemInfo['comp_item_name'];
		$return['comp_item_brief'] = $compItemInfo['comp_item_brief'];
		
		// 获取此comp_item的上传附件的文件名 
		$return['comp_item_filename'] = $this->getFileNameFromDir("./Public/CompItemApply/$compItemId/");
		
		// 加载所有报名者学号
		$participantArr = explode(',', $compItemInfo['comp_participant_id']);
		foreach ($participantArr as $key=>$val) {
			$authorNum = $key + 1;
			$participants["a".$authorNum] = $val;
		}
		
		$return = array_merge($return, $participants);
		$this->ajaxReturn(json_encode($return), 'eval');
	}
	
	public function queryStuID() {
		$condition['student_id'] = I('get.student_id');
		$stuInfo = M('ecnu_mind.user_custom')->where($condition)->field('name, academy')->find();
		$this->ajaxReturn(json_encode($stuInfo));
	}
	
	public function getFileNameFromDir($dir){
		$fileNames = "";
		$fileNamesCnt = 0;
		$dir = iconv("UTF-8","gb2312",$dir);
		//如果dir是文件夹
		if (is_dir($dir))
		{
			if ($dh = opendir($dir))
			{
				while (($file = readdir($dh)) !== false)
				{
					//echo "filename: $file : filetype: " . filetype($dir . $file) . "\n";
					$fileNames = $file;
//   					$fileNames = iconv("gb2312","UTF-8",$fileNames);
					$fileNames = iconv("GBK","UTF-8",$fileNames);
				}
				closedir($dh);
			}
		}
		return $fileNames;
	}
	
	private function checkBeforeModify($fromForm) {
		if (isset($fromForm['comp_id'])) {
			$compEndDate = M("ecnu_mind.competition_info")
							->field("comp_apply_end_date")
							->find($fromForm['comp_id'])["comp_apply_end_date"];
		} else if(isset($fromForm['comp_item_id'])) {
			$compId = M("ecnu_mind.competition_main")
						->field("comp_type_id")
						->find($fromForm['comp_item_id'])["comp_type_id"];
			$compEndDate = M("ecnu_mind.competition_info")
							->field("comp_apply_end_date")
							->find($compId)["comp_apply_end_date"];
		}
		// 监测时间，如果超过报名时间则不允许修改
		$today = date('Y-m-d', time());
		$today = strtotime($today);
		
		$compEndTime = strtotime($compEndDate);
		if ($compEndTime < $today) $this->ajaxReturn("date_over");
		
		// 检查用户权限
		$this->checkAccess($fromForm, 'not_in_author');
		
		//检查
		$customModel = M('ecnu_mind.user_custom');
		foreach ($fromForm as $key=>$val) {
			if (!preg_match("/^a[0-9]+$/", $key)) continue;
			if ($val == '') continue;
			$condition['student_id'] = $val;
			$stuInfo = $customModel->where($condition)->field('name, academy')->find();
			if ($stuInfo == null) {
				$this->ajaxReturn("error");
			}
		}
	}
	
	private function getTemplateValue($compId, $submitMethod, $isJustAdd) {
		//get comp by compId
		$thisComp = M('ecnu_mind.competition_info')->find($compId);
		
		$val['compName'] = $thisComp['comp_name'];
		//get the comp_max_people of this comp
		$val['comp_max_people'] = $thisComp['comp_max_people'];
		$val['comp_brief'] = $thisComp['comp_brief'];
		$val['comp_id'] = $compId;
		
		$val['comp_start_date'] = $thisComp['comp_start_date'];
		$val['comp_end_date'] = $thisComp['comp_end_date'];
		$val['comp_apply_start_date'] = $thisComp['comp_apply_start_date'];
		$val['comp_apply_end_date'] = $thisComp['comp_apply_end_date'];
		$val['comp_sponsor'] = $thisComp['comp_sponsor'];
		$val['comp_official_website'] = $thisComp['comp_official_website'];

		if ($submitMethod == 'add') {
			//submit mode
			$val['submitMode'] = 'add';
			//opening this page just now, there is not any operations for adding.
			$val['addSuccess'] = "false";
		} else {
			//submit mode
			$val['submitMode'] = 'update';
			$status['compItemID'] = I('post.comp_item_id');
			if ($isJustAdd) {
				//add a competition just now.
				$val['addSuccess'] = "true";
			} else {
				//openning this page by 'myComp' module.
				$val['addSuccess'] = "false";
			}
		}
		return $val;
	}
	
	/**
	 * 检查用户权限。
	 */
	private function checkAccess($checkData, $errorInfo) {
		// 如果用户是管理员，不检测权限，默认通过。
		if ("admin" == session("user_access")) return;
	
		$studentId = session('student_id');
		$key = array_search($studentId, $checkData);
		
		if (!$key) {
			$this->ajaxReturn($errorInfo, 'EVAL');
		}
	}
	
	/**
	 * 将存在的author_id变为整体数组返回
	 */
	private function getParticipantId($fromForm) {
		$return = array();
		foreach ($fromForm as $key=>$val) {
			if (!preg_match("/^a[0-9]+$/", $key)) continue;
			if ($val == '') continue;
			$return[] = $val;
		}
		return $return;
	}
	
	private function isParticipant($compItemId) {
		$participantIDStr = 
			M('ecnu_mind.competition_main')->field('comp_participant_id')->find($compItemId)['comp_participant_id'];
		$participantIDArr = explode(',', $participantIDStr);
		$key = array_search(session('student_id'), $participantIDArr);
		if (!key) {
			$this->ajaxReturn("not_access");
		}
	}
}
