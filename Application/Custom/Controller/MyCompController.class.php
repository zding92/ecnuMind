<?php
namespace Custom\Controller;
use Custom\Common\Controller\CommonController;

class MyCompController extends CommonController {

	private $status;
	
	public function myComp(){
		$this->assign("submitFinalSuccess", "false");
		//显示__app__/home/comp/myComp页面
		$this->display();
	}
	
	/**
	 * 获取个人竞赛信息（不包含具体内容，仅返回竞赛名称等最基本信息）
	 */
	public function getCompItem() {
		$compItemModel = M('ecnu_mind.competition_main');
		$compInfoModel = M('ecnu_mind.competition_info');
	
		// 设置查询条件
		$map['comp_participant_id'] = array('like', '%'.session('student_id').'%') ;
		
		// 获取报名的基本信息
		$compBaseInfo = $compItemModel->where($map)->select();
				
		foreach ($compBaseInfo as $compBase) {
			// 获得该项竞赛的基本信息
			$compinfo =	$compInfoModel
						->where('comp_id='.$compBase['comp_type_id'])
						->field("comp_name")
						->find();
						
			/// 添加其他竞赛信息			
			// 返回竞赛名和竞赛报名日期和报名当前状态。
			$returnItem['comp_name'] = $compinfo['comp_name'];
			$returnItem['comp_prize'] = $compBase['comp_prize'];
			$returnItem['apply_date'] = $compBase['apply_date'];
			$returnItem['comp_state'] = $compBase['comp_state'];
			if ($compBase['comp_item_name'] == '') 
				$returnItem['comp_item_name'] = '无题';
			else 
				$returnItem['comp_item_name'] = $compBase['comp_item_name'];
			
			$returnItem['comp_template'] = 
				U("Custom/CompApply/showUpdateView","compItemId=".$compBase['comp_item_id'],"");
						
			$returnItem['comp_remove'] =
				U("Custom/CompApply/removeApply","compItemId=".$compBase['comp_item_id'],"");
			
			$returnItem['comp_item_id'] = $compBase['comp_item_id'];
			
			$result[] = $returnItem; 
		}
		
		$this->ajaxReturn(json_encode($result), "EVAL");
		
	}
	
	public function finalSubmit() {
		$compItemID = I('post.comp_item_id');
		if ($this->checkFinalSubmit($compItemID)) {
			$fileName = $_FILES['finalFiles']['name'];
			$fileName = explode('.', $fileName)[0];
			
			if ($fileName != '') 
				uploadFile('./Public/CompItemFinal',"/$compItemID/","$fileName");
			else 
				$this->status = 'empty';
		}
		
		$this->assign("submitFinalSuccess", $this->status);
		$this->display("myComp");
	}
	
	public function getFinalFile() {
		$compItemId = I('post.compItemId');
		$fileName = $this->getFileNameFromDir("./Public/CompItemFinal/".$compItemId);
		$this->ajaxReturn($fileName);
	}
	
	private function checkFinalSubmit($compItemID) {
		$compInfo = M("ecnu_mind.competition_main")->field("comp_type_id,comp_state")->find($compItemID);
		
		if ('审批通过' != $compInfo['comp_state']) {
			$this->status = "not_agree";
			return false;
		}

		// 监测时间，如果超过竞赛时间则不允许修改
		$compDate = M("ecnu_mind.competition_info")->field("comp_end_date,comp_start_date")->find($compInfo['comp_type_id']);
		$today = date('Y-m-d', time());
		$today = strtotime($today);
	
		$compEndTime = strtotime($compDate['comp_end_date']);
		$compStartTime = strtotime($compDate['comp_start_date']);
		if ($compEndTime < $today || $compStartTime > $today) {
			$this->status = "not_in_date";
			return false;
		}
		
		// 检测操作者是否是该报名的参与者。
		if (!$this->isParticipant($compInfo['comp_type_id'])) {
			$this->status = "not_access";
			return false;
		}
		
		$this->status = 'success';
		return true;
	}
	
	private function isParticipant($compItemId) {
		$participantIDStr = M('ecnu_mind.competition_main')->field('comp_participant_id')->find($compItemId)['comp_participant_id'];
		$participantIDArr = explode(',', $participantIDStr);
		$key = array_search(session('student_id'), $participantIDArr);
		if (!key) {
			return false;
		}
		return true;
	}
	
	public function getFileNameFromDir($dir){
		$fileNames = "empty";
		$fileNamesCnt = 0;
		$dir = iconv("UTF-8","gb2312",$dir);
		//如果dir是文件夹
		if (is_dir($dir))
		{
			$dh = opendir($dir);
			if ($dh)
			{
				while (($file = readdir($dh)) !== false)
				{
					//echo "filename: $file : filetype: " . filetype($dir . $file) . "\n";
					$fileNames = $file;
					$fileNames=iconv("gb2312","UTF-8",$fileNames);
				}
				closedir($dh);
			}
		}
		return $fileNames;
	}
}