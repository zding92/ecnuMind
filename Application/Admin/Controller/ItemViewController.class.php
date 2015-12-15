<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Common\Controller\CommonController;
class ItemViewController extends CommonController{
	public function ItemView(){
		$compItemId = I('get.comp_item_id');
		$compItemInfo = $this->getCompItemInfo($compItemId);
		$this->assign("comp_item_id",$compItemId);
		$this->assign("comp_item_name",$compItemInfo['comp_item_name']);
		$this->assign("comp_item_brief",str_ireplace("\r\n","<br>",$compItemInfo['comp_item_brief']));
		
		//$this->assign("comp_item_brief",$compItemInfo['comp_item_brief']);
		if ($compItemInfo['comp_item_filename']==".."){
			$this->assign("comp_item_filename","无附件文件");
		}else {
			$this->assign("comp_item_filename",$compItemInfo['comp_item_filename']);
		}		
		//获取所有参与此比赛的参赛者信息
		$participantInfo = $this->getCompItemApplicants($compItemId);
		$this->assign("participantInfo",$participantInfo);
		
		$this->display();
	}
	
	public function getCompItemInfo($compItemId) {
		$return['comp_item_filename'] = "";
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
		return $return;
		//$this->ajaxReturn(json_encode($return), 'eval');
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
					$fileNames=iconv("gb2312","UTF-8",$fileNames);
				}
				closedir($dh);
			}
		}
		return $fileNames;
	}
	
	/***
	 * 根据$compItemId，获取所有参与$compItemId项目的用户
	 * @param unknown $compItemId
	 */
	public function getCompItemApplicants($compItemId){
		$compItemInfo = M('ecnu_mind.competition_main')->find($compItemId);
		$userInfo = M('ecnu_mind.user_custom');
		// 加载所有报名者学号
		$participantArr = explode(',', $compItemInfo['comp_participant_id']);
		$returnCnt = 0;
		foreach($participantArr as $compApplicant){
			//根据学号，获取其姓名、学院，并加入返回数组
			$return[$returnCnt]['participantName'] = $userInfo->where("student_id=$compApplicant")->find()['name'];
			$return[$returnCnt]['participantAcademy'] = $userInfo->where("student_id=$compApplicant")->find()['academy'];
			$return[$returnCnt]['student_id'] = $compApplicant;
			$returnCnt++;
		}
		return $return;
	}

}
?>