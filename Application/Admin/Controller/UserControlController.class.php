<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Common\Controller\CommonController;
class UserControlController extends CommonController {
	public function index(){
    	$this->display();
  }
  
  	public function showAllUser(){
	  	if (!S("user_".session('access_id'))){
	  		// 根据access_id获取该管理员所属院系，或学校层面管理员。
	  		$accessName = M('academy')->find(session('access_id'))['name'];
	  		
	  		//如果不是全校权限的账户，则建立数据库搜索的条件
	  		if ($accessName !== "华东师范大学")
	  			$condition['academy'] = $accessName;
	  		
	  		// 根据条件获取返回前台的信息。
	  		$returnToFront = $this->getUsersByCondition($condition);
	  		
	  		// 将拿到的二维数组json编码后缓存，5分钟更新一次缓存
	  		S("user_".session('access_id'), json_encode($returnToFront), array('type'=>'file','expire'=>300));
	  	}
	  	$this->ajaxReturn(S("user_".session('access_id')),'EVAL');
  	}
  
	 private function getUsersByCondition($condition){
	 	//建立user_custom的模型
	 	$allUserModel = M('ecnu_mind.user_custom');	
	 	
	 	//取出满足$condition的所有行的name,student_id,academy,major,phone,email字段
	 	$allUser = $allUserModel->where($condition)
	 							->field('user_id,name,student_id,academy,major,phone,email')
	 							->select();	 	
	 	return $allUser; 	
	 }
}
