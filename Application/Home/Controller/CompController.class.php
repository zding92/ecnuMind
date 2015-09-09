<?php
namespace Home\Controller;
use Home\Common\Controller\CommonController;
class CompController extends CommonController {
	public function Comp(){
		//显示__app__/home/comp/comp页面
		$this->display();
	}
	
	public function getCompInfo() {
		$compModel = M('ecnu_mind.competition_info', null);
		$allComp = $compModel->select();
		$allComp = $this->checkDate($allComp);
		$this->ajaxReturn(json_encode($allComp), "EVAL");
	}
	
	private function checkDate($allComp) {
		$today = date('Y-m-d', time());
		$today = strtotime($today);
		$result = array();
		foreach ($allComp as $comp) {
			$compStartDay = strtotime($comp['comp_apply_start_date']);
			$compEndDay = strtotime($comp['comp_apply_end_date']);
			if ($today < $compStartDay) {
				$comp['apply_state'] = '未开始(开始时间'.$comp['comp_apply_start_date'].')';
				$comp['comp_template'] = "<a style='color:#aaa;margin:0px auto;'>报名未开始，请耐心等待</a>";
			} elseif ($today > $compStartDay && $today < $compEndDay) {
				$comp['apply_state'] = '正在报名(截止日期：'.$comp['comp_apply_end_date'].')';
			} else {
				$comp['apply_state'] = '报名结束';
				$comp['comp_template'] = "<a style='color:#aaa;margin:0px auto;'>报名已经结束</a>";
			}
			$result[] = $comp;
		}
		return $result;
	}
}