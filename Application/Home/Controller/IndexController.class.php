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
    	// 构造用户数据基础模型
        $Data = M('ecnu_mind.user_info');
        
        // 启动session。
    	session_start();
    	
    	// 获取post方式传来的username和password
    	$username = I('post.username');
    	$password = I('post.password');
    	
    	// sql查询： SELECT password,username FROM user_info where username='username';
    	$condition['username'] = $username;
    	$result = $Data->where($condition)->field('PASSWORD,USERNAME,ID,studentid,info_complete')->find();
    	
    	// 如果查询失败，代表user不存在，返回下列not_exist。
		if ($result == null){
			$this->ajaxReturn( "user_noexist", "EVAL");
		}
		
		// 如果查询成功，且密码正确。
		if ($result['password'] == md5($password)) {
			// 将username放入session，作为后续用户操作身份句柄
			session('username', $username);
			session('userid', $Data->id);
			
			// 判断用户信息是否完善， 如果不完善要求用户补全
			if ($result['info_complete'] < 11) {
				$this->ajaxReturn("user_info_incomplete", "EVAL");
			} 
			
			// 如果用户信息完整，则返回成功信息，并将studentId存入会话。
			session('studentid', $Data->studentid);
			
			// 返回参数。
			$this->ajaxReturn("success", "EVAL");
    	} else {
    		// 否则代表存在用户，但是密码错误，返回下列js变量，利用eval脚本解析器获取变量
    		$this->ajaxReturn("password_error", "EVAL");
    	}
    }
    
    /**
     * 注册按钮Ajax提交Target
     */
    public function register() {
    	// 利用Model类，快速设置约束条件，并创建D对象
    	$Data = D('info');
    	// 自动利用表单构建D对象
    	if ($Data->create()) {
    		// 设置session
    		session('username', $Data->username);
    		// 操作数据库->添加数据
     		$Data->add();
     		// 返回操作结果。利用js的eval脚本解析功能读取数据。
     		$this->ajaxReturn("success", "EVAL");
    	} else {
    		// 如果错误返回'exist'变量。
    		$this->ajaxReturn($Data->getError(), "EVAL");
    	}
    	
    }   
}