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
  	
  	$DataToSql = I("post.");
  	unset($DataToSql['compDate']); //删除$DataToSql中比赛起始时间项
  	
  }
}