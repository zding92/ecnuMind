<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Common\Controller\CommonController;
class CompControlController extends CommonController {
    public function index(){
    	$this->display();
  }
   public function Comp(){
  	//显示__app__/home/comp/comp页面
  	$this->display();
  }
  
   public function myComp(){
  	//显示__app__/home/comp/myComp页面
  	$this->display();
  }
  
  public function checkValidUser($student_id) {
  	$userModel = M('ecnu_mind.user_admin');
  	$user = $userModel->where("user_id=$student_id")->field('access_id',true)->find();
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
  	$this->ajaxReturn(json_encode($allComp), "EVAL");
  }
  
  private function assignTemplate($allComp) {
  	foreach ($allComp as $comp) {
  			
  		$compId = $comp['comp_id'];
  			
  		// 用完以后删除该项，防止传到前台。
  		unset($comp['comp_id']);
  			
  		$compTmp = $comp['comp_template'];
  		$comp['comp_template'] = '<a href="'.U("Custom/$compTmp/$compTmp","compId=$compId","").'" target="_blank">点此报名</a>';
  			
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
}