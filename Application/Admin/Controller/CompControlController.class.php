<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Common\Controller\CommonController;
class CompControlController extends CommonController {
	
  public function CompControl(){
    $this->display();
  }
  
  public function addComp(){
  	$compInfoModel = M('ecnu_mind.competition_info',null);
  	
  	$compDate = I("post.compDate");
  	$compApplyDate = I("post.compApplyDate");
  	$compTemplate = I("post.comp_template");
  	
  	$DataToSql = I("post.");
  	//删除$DataToSql中比赛起始时间项
  	unset($DataToSql['compDate']); 
  	//删除$DataToSql中比赛报名起始时间项
  	unset($DataToSql['compApplyDate']);
  	//删除$DataToSql中比赛模板项
  	unset($DataToSql['comp_template']);
  	
  	switch ($compTemplate){
  		case '挑战杯' : $DataToSql['comp_template'] = 'Tiaozhan';
  		break;
  		default:break;
  	}
  	
  	
  	
  	//将I函数拿到的比赛时间整体拆分成数组，中间以-分隔
  	$compDateArray = explode('-', $compDate);
  	//将生成的$compDateArray数组中对应项组成新的comp_start_date和comp_end_date字符串
  	$DataToSql['comp_start_date'] = $compDateArray[0].'-'.$compDateArray[1].'-'.$compDateArray[2];
  	$DataToSql['comp_end_date'] = $compDateArray[3].'-'.$compDateArray[4].'-'.$compDateArray[5];
  	
  	//将I函数拿到的比赛报名时间整体拆分成数组，中间以-分隔
  	$compApplyDateArray = explode('-', $compApplyDate);
  	//将生成的$compDateArray数组中对应项组成新的comp_apply_start_date和comp_apply_end_date字符串
  	$DataToSql['comp_apply_start_date'] = $compApplyDateArray[0].'-'.$compApplyDateArray[1].'-'.$compApplyDateArray[2];
  	$DataToSql['comp_apply_end_date'] = $compApplyDateArray[3].'-'.$compApplyDateArray[4].'-'.$compApplyDateArray[5];
  	
  	//添加此比赛数据进数据库
  	$compInfoModel->data($DataToSql)->add();
  	// 返回添加成功
  	$this->ajaxReturn('success', 'EVAL');	
  }
}