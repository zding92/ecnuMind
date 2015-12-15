<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Common\Controller\CommonController;

class CompControlController extends CommonController {
	

  public function CompControl(){
  	$this->assign('addSuccess', 'false');
    $this->display();
  }
  
  public function removeComp(){
  	$compModel = M("ecnu_mind.competition_info",null);//实例化数据库模型
  	$removeCompId = I('post.removeCompId');//取得前台所传需要删除comp_item_id
  	$compModel->where("comp_id = $removeCompId")->delete();//删除数据
  	//delDirAndFile("./Public/CompForm/25");
  	$this->deldir("./Public/CompForm/25");
  	$this->ajaxReturn("removeSuccess","EVAL");
  }
  
  public function deldir($dir) {
  	//先删除目录下的文件：
  	$dh=opendir($dir);
  	while ($file=readdir($dh)) {
  		if($file!="." && $file!="..") {
  			$fullpath=$dir."/".$file;
  			if(!is_dir($fullpath)) {
  				unlink($fullpath);
  			} else {
  				deldir($fullpath);
  			}
  		}
  	}
  
  	closedir($dh);
  	//删除当前文件夹：
  	if(rmdir($dir)) {
  		return true;
  	} else {
  		return false;
  	}
  }
  
  public function addComp(){
  	$compInfoModel = M('ecnu_mind.competition_info',null);
  	
  	$compDate = I("post.compDate");
  	$compApplyDate = I("post.compApplyDate");
  	  	
  	$DataToSql = I("post.");
  	//strtr($DataToSql[comp_brief],"\r\n","<br>");
  	$DataToSql[comp_brief] = str_ireplace("\r\n","<br>",$DataToSql[comp_brief]);
  	
  	//删除$DataToSql中比赛起始时间项
  	unset($DataToSql['compDate']); 
  	//删除$DataToSql中比赛报名起始时间项
  	unset($DataToSql['compApplyDate']);
  	
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

  	$DataToSql['comp_owner'] = session("access_id");
  	
  	if ($DataToSql['comp_id']==''){
  		//添加此比赛数据进数据库，并取回添加之后的主键值为compPK
  		$compPK = $compInfoModel->data($DataToSql)->add();
  		$this->assign('success', 'add');
  	}else{
  		$compPK = $DataToSql['comp_id'];
  		$compInfoModel->save($DataToSql);
  		$this->assign('success', 'update');
  	}

  	
  	//将上传的文件放置在./Public/CompForm目录下的$compPK目录下
  	uploadFile('./Public/CompForm',"/$compPK/",$DataToSql['comp_name']);
  	
  	
  	  	
  	// 重新显示CompControl页面
  	$this->display("CompControl");
	// 返回添加成功
//  $this->ajaxReturn('success', 'EVAL');	
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
  	$condition['comp_owner'] = session('access_id');
  	$allComp = $compModel->where($condition)->select();

  	$allComp = $this->checkDate($allComp);
  	$this->ajaxReturn(json_encode($allComp), "EVAL");
  }
  
  public function  getACompInfo(){
  	$compModel = M('ecnu_mind.competition_info');
  	$aCompInfo = $compModel->find(I('post.getCompId'));
  	$this->ajaxReturn(json_encode($aCompInfo));
  	
  }
  
  private function assignTemplate($allComp) {
  	foreach ($allComp as $comp) {
  			
  		$compId = $comp['comp_id'];
  			
  		// 用完以后删除该项，防止传到前台。
  		unset($comp['comp_id']);
  			
  		$comp['comp_del'] = '<a href="'.U("Custom/$compTmp/$compTmp","compId=$compId","").'" target="_blank">点此报名</a>';
  			
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
  
  		} elseif ($today > $compStartDay && $today < $compEndDay) {
  			$comp['apply_state'] = '正在报名';
  
  		} else {
  			$comp['apply_state'] = '报名结束';
  		}  			
  		$comp['apply_date'] = $comp['comp_apply_start_date'].' ~ '.$comp['comp_apply_end_date'];
  		$result[] = $comp;
  	}
  	return $result;
  }
}