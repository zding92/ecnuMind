<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Common\Controller\CommonController;
class HomeController extends CommonController {
    public function home(){
    	$this->display();
  	}
  	
  	public function Safe(){
  		$this->display();
  	}
  	/**
  	
  	* 更改密码
  	
  	*/
  	public function PasswordChange(){
  		// 构造用户数据基础模型
  	
  		$Data = M("ecnu_mind.user_base",null);
  	
  	
  	
  		// 读取userid
  		$username = session("user_id");
  	
  	
  	
  		//获取post方法传来的password和newpassword\
  		$password = I('post.password');
  		$newpassword1 = I('post.newpassword1');
  		$newpassword2 = I('post.newpassword2');
  	
  	
  		// sql查询： SELECT password,username FROM user_info where username='username';
  		$condition['user_id'] = $username;
  		$result = $Data->where($condition)->field('password')->find();
  	
  		if($result['password'] != md5($password))
  			// 否则代表存在用户，但是原始密码错误，返回下列js变量，利用eval脚本解析器获取变量
  			$this->ajaxReturn("password_error", "EVAL");
  	
  		else {
  			if ($newpassword2 != $newpassword1){
  				// 否则代表存在用户，但是两次输入密码错误，返回下列js变量，利用eval脚本解析器获取变量
  	
  				$this->ajaxReturn("newpassword_error", "EVAL");
  	
  			}
  			else{
  	
  				$result['password'] = md5($newpassword1);
  				$Data->where($condition)->save($result);
  				//$Data -> where('user_id='.$username) -> save($result);
  				$this->ajaxReturn("success", "EVAL");
  			}
  		}
  	}
  	
}