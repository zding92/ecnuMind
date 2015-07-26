<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $Data = M('info');
        $this->display();
    }
    
    public function login() {
    	$Data = M('info');
    	session_start();
    	$user = I('post.username', 0, 'strip_tags,htmlspecialchars,trim');
    	$password = I('post.password', 0, 'strip_tags,htmlspecialchars,trim');
    	$condition['ID'] = $user;
    	$result = $Data->where($condition)->field('PASSWORD,USERNAME')->find();

    	if ($result['password'] == $password) {
	    	echo "var login=true;
	        	  var user_noexist=false;
	        	  var pwd_error=false;";
	     	session('user', $user);
	     	session('nickname', $result['name']);
    	}
    }
    
    public function register() {
    	$Data = D('info');
    	$password = I('post.password', 0, 'strip_tags,htmlspecialchars,trim');
    	if ($Data->create()) {
    		echo "var user_noexist = false;";
//     		$Data->add();
    	} else {
    		echo "var user_noexist = true;";
    	}
    	
    }
    
    
}