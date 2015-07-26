<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $Data = M('info');
        $this->display();
    }
    
    public function login() {
        $Data = D('info');
    	session_start();
    	$user = I('post.username', 0, 'strip_tags,htmlspecialchars,trim');
    	$password = I('post.password', 0, 'strip_tags,htmlspecialchars,trim');
    	$condition['username'] = $user;
    	$result = $Data->where($condition)->field('PASSWORD,USERNAME')->find();
		if ($result == null){
			echo 'var user_noexist=true;
				  var login=false;';
		}
		else if ($result['password'] == md5($password)) {
	    	echo "var login=true;
        		  var user_noexist=false;
        	  	  var pwd_error=false;";
     		session('user', $user);
     		session('nickname', $result['name']);
    	}
    	else	echo "var login=false;
        		      var user_noexist=false;
        	  	      var pwd_error=true;";
    }
    
    public function register() {
    	$Data = D('info');
    	$password = I('post.password', 0, 'strip_tags,htmlspecialchars,trim');
    	if ($Data->create()) {
     		$Data->add();
     		echo 'var reg_success=true;';
    	} else {
    		echo 'var reg_success=false;';
    	}
    	
    }   
}