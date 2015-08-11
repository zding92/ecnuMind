<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	/**
	 * 首页入口
	 */
    public function index(){
        $this->display();
    }
    
    /**
     * 登录按钮Ajax提交Target
     */
    public function login() {
    	// 利用Model类，快速设置约束条件，并创建D对象
        $Data = D('info');
        // 启动session。
    	session_start();
    	// 获取post方式传来的username和password
    	$username = I('post.username', 0, 'strip_tags,htmlspecialchars,trim');
    	$password = I('post.password', 0, 'strip_tags,htmlspecialchars,trim');
    	// sql查询： SELECT password,username FROM user_info where username='username';
    	$condition['username'] = $username;
    	$result = $Data->where($condition)->field('PASSWORD,USERNAME')->find();
    	// 如果查询失败，代表user不存在，返回下列js变量，利用eval脚本解析器运行获取变量。
		if ($result == null){
			$this->ajaxReturn( "var user_noexist=true; var login=false;",
					                     "EVAL");
		}
		// 如果查询成功，且密码正确，返回下列js变量，利用eval脚本解析器运行获取变量。
		else if ($result['password'] == md5($password)) {
			// 将username放入session，作为后续用户操作身份句柄
			session('username', $username);
			
			// 返回参数。
	    	$this->ajaxReturn("var login=true;
        		  						  var user_noexist=false;
        	  	                          var pwd_error=false;",
	    								"EVAL");
    	}
    	// 否则代表存在用户，但是密码错误，返回下列js变量，利用eval脚本解析器获取变量
    	else	$this->ajaxReturn("var login=false;
        		     						  var user_noexist=false;
        	  	      						  var pwd_error=true;",
    			                            "EVAL");
    }
    
    /**
     * 注册按钮Ajax提交Target
     */
    public function register() {
    	// 利用Model类，快速设置约束条件，并创建D对象
    	$Data = D('info');
    	// 获取post方式传来的password
    	$password = I('post.password', 0, 'strip_tags,htmlspecialchars,trim');
    	// 自动利用表单构建D对象
    	if ($Data->create()) {
    		// 设置session
    		session('username', $Data->username);
    		// 初始化用户昵称加上前缀"ecnu_"
    		// $Data->nickname = "ecnu_".$Data->username;
            // 初始化用户昵称（nickname）为username
        	$Data->nickname = $Data->username;
    		// 操作数据库->添加数据
     		$Data->add();
     		// 返回操作结果。利用js的eval脚本解析功能读取数据。
     		$this->ajaxReturn("var reg_success=true;","EVAL");
    	} else {
    		$this->ajaxReturn("var reg_success=false;","EVAL");
    	}
    	
    }   
}