<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $Data = M('信息');
        $this->display();
    }
    
    public function login() {
    	$Data = M('信息');
    	session_start();
    	$user = I('post.username', 0, 'strip_tags,htmlspecialchars,trim');
    	$password = I('post.password', 0, 'strip_tags,htmlspecialchars,trim');
    	$condition['ID'] = $user;
    	$result = $Data->where($condition)->field('PWD,NAME')->find();

    	if ($result['pwd'] == $password) {
	    	echo "var login=true;
	        	  var user_noexist=false;
	        	  var pwd_error=false;";
	     	session('user', $user);
	     	session('nickname', $result['name']);
    	}
    }
    
    public function  register() {
    	echo "hello";
    }
    
    
}