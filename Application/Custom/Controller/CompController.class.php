<?php
namespace Custom\Controller;
use Custom\Common\Controller\CommonController;
class CompController extends CommonController {
	public function Comp(){
		//显示__app__/home/comp/comp页面
		$this->display();
	}
	
	public function checkValidUser($student_id) {
		$userModel = M('ecnu_mind.user_custom');
		$user = $userModel->where("student_id=$student_id")->field('id,$student_id,username,brief,password',true)->find();
		if (isset($user)) {
			$this->ajaxReturn(json_encode($user),'EVAL');
		}
		else{
		$this->ajaxReturn('0','EVAL');}
	}
	
	public function getCompInfo() {
		$compModel = M('ecnu_mind.competition_info');
		$allComp = $compModel->select();
			
		$allComp = $this->assignTemplate($allComp);
		$allComp = $this->checkDate($allComp);	
		$allComp = $this->getCompFile($allComp);
		$this->ajaxReturn(json_encode($allComp), "EVAL");
	}
	
	
	/***
	 * 获取$dir文件夹内的文件名
	 * @param unknown $dir
	 */
	public function getFileNameFromDir($dir){
		//$dir = I("post.dir");
		$fileNames = "empty";
		$fileNamesCnt = 0;
		$dir = iconv("UTF-8","gb2312",$dir);
		//如果dir是文件夹
		if (is_dir($dir))
		{
			if ($dh = opendir($dir))
			{
				while (($file = readdir($dh)) !== false)
				{
					$fileNames = $file;
					$fileNames=iconv("gb2312","UTF-8",$fileNames);
				}
				closedir($dh);
			}
		}
		return($fileNames);
	}
	
	protected function registerComp($participant) {
		$compItemModel = M('ecnu_mind.competition_main');
		$regValue = I('post.','','stripslashes,strip_tags,trim');
		
		// 将学号数组转化为学号字串
		$participantStr = implode(',', $participant);
		
		// 加载竞赛所属院系
		$compItemInfo['comp_owner'] = M('ecnu_mind.competition_info')->find($regValue['comp_id'])['comp_owner'];
		
		// 构造竞赛报名主表所需要的两个外键
		$compItemInfo['comp_type_id'] = $regValue['comp_id'];
		
		// 将用户学号数组转化为字符串存入
		$compItemInfo['comp_participant_id'] = $participantStr;
		
		// 将当前日期设置为竞赛报名日期
		$compItemInfo['apply_date'] = date('Y-m-d', time());
	
		// 获取第一作者姓名和所属学院
		$author1Info = $this->getAuthor1Info($participant[0]);
		
		// 添加第一作者姓名和所属学院
		$compItemInfo['author1_name'] = $author1Info['name'];
		$compItemInfo['apply_academy'] = $author1Info['academy'];
		
		// 添加竞赛项目名称
		$compItemInfo['comp_item_name'] = $regValue['comp_item_name'];		
		
		// 添加竞赛项目简介
		$compItemInfo['comp_item_brief'] = $regValue['b'];
		//$compItemInfo['comp_item_brief'] = str_ireplace("\r\n","<br>",$regValue['b']);
		
		// 获取全站唯一的用户个人报名ID
		$compItemId = $compItemModel->data($compItemInfo)->add();
		
		// 返回给单项竞赛报名页面后台这个唯一的ID
		return $compItemId;
	}

	
	private function assignTemplate($allComp) {
		foreach ($allComp as $comp) {
			
			$compId = $comp['comp_id'];
					
			$comp['comp_template'] = '<a href="'.U("Custom/CompApply/compApply","compId=$compId","").'" target="_blank">点此报名</a>';
			
			$result[] = $comp;
		}
		return $result;
	}
	
	private function checkDate($allComp) {
		$today = date('Y-m-d', time());
		$today = strtotime($today);
		$result = array();
		
		foreach ($allComp as $comp) {
			$compStartDay = strtotime($comp['comp_apply_start_date']);
			$compEndDay = strtotime($comp['comp_apply_end_date']);
			
			if ($today < $compStartDay) {
				$comp['apply_state'] = '未开始';
				$comp['comp_template'] = "<a style='color:#aaa;margin:0px auto;'>报名未开始</a>";
				
			} elseif ($today > $compStartDay && $today < $compEndDay) {
				$comp['apply_state'] = '正在报名';
				
			} else {
				$comp['apply_state'] = '报名结束';
				$comp['comp_template'] = "<a style='color:#aaa;margin:0px auto;'>报名已经结束</a>";
			}
			
			$comp['apply_date'] = $comp['comp_apply_start_date'].' ~ '.$comp['comp_apply_end_date'];
			$result[] = $comp;
		}
		return $result;
	}
	
	/***
	 * 获取所有比赛数组，添加一个comp_file属性，表明此比赛的附件文件名
	 * @param unknown $allComp
	 */
	private function getCompFile($allComp){
		//返回的数组
		$result = array();
		//查找文件的根目录
		$fileRoot = "./Public/CompForm/";
		foreach ($allComp as $comp){	
			//$searchDir为查找文件的目录，为根目录加上$comp['comp_id']
			$searchDir = $fileRoot.$comp['comp_id'];
			//添加comp_file项，并查找文件
			$comp['comp_file'] = $this->getFileNameFromDir($searchDir);
			$result[] = $comp;
		}
		return $result;
	}
	
	protected function deleteComp($compItemId) {
		$compModel = M('ecnu_mind.competition_main');
		$compModel->delete($compItemId);
	}
	
	protected function updateCompParticipant($participant) {
		
		$compItemModel = M('ecnu_mind.competition_main', null);
		
		$compItemModel->create();
		
		$compItemModel->comp_participant_id = implode(',', $participant);
		
		// 获取第一作者姓名和所属学院
		$author1Info = $this->getAuthor1Info($participant[0]);
		
		// 添加第一作者姓名和所属学院
		$compItemModel->author1_name = $author1Info['name'];
		
		$compItemModel->apply_academy = $author1Info['academy'];
		
		$compItemModel->filter('strip_tags')->save();
	}
	
	private function getAuthor1Info($author1Id) {
		$custom = M('user_custom');
		$author1Info = $custom->where("student_id=$author1Id")->field('name,academy')->find();
		return $author1Info;
	}
}