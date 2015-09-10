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
			
		$allComp = $this->assignTemplate($allComp);
		$allComp = $this->checkDate($allComp);
		$this->ajaxReturn(json_encode($allComp), "EVAL");
	}
	
	protected function registerComp() {
		$compItemModel = M('ecnu_mind.competition_main',null);
		$regValue = I('post.');
		
		// 构造竞赛报名主表所需要的两个外键
		$compItemInfo['comp_type_id'] = $regValue['comp_id'];
		$compItemInfo['comp_user_id'] = session('userid');
		
		// 获取全站唯一的用户个人报名ID
		$compId = $compItemModel->data($compItemInfo)->add();
		
		// 返回给单项竞赛报名页面后台这个唯一的ID
		return $compId;
	}
	
	private function assignTemplate($allComp) {
		foreach ($allComp as $comp) {
			
			$compId = $comp['comp_id'];
			
			// 用完以后删除该项，防止传到前台。
			unset($comp['comp_id']);
			
			$compTmp = $comp['comp_template'];
			$comp['comp_template'] = '<a href="'.U("Home/$compTmp/$compTmp","compId=$compId","").'" target="_blank">点此报名</a>';
			
			$result[] =$comp;
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
}