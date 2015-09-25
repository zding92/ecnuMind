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
    	$this->checkUser();
    	
    	// 验证通过，开始登录操作。    	
    	
    	// 分别对不同权限的用户（普通用户custom和管理员amdmin做不同操作）
    	if (session('user_access') == 'custom') {
    		$this->loginCustom();
    	} else {
    		$this->loginAdmin();
    	};		
    }
    
    /**
     * 注册按钮Ajax提交Target
     */
    public function registerCustom() {
    	// 在userbase中注册用户，存入用户名，分配用户权限，自动添加注册日期，存放md5编码的密码等操作。
    	$this->registerUser();
    	
    	// 在custom表中注册用户。
    	$custom = M('ecnu_mind.user_custom');
    	
    	// 初始情况下只有user_id
    	$data['user_id'] = session('user_id');
    	
    	$custom->add($data);

    	$this->ajaxReturn("success", "EVAL");
    }   
    
    public function registerUser() {
    	// 利用Model类，快速设置约束条件，并创建D对象
    	$user = D('Userbase');
    	// 自动利用表单构建D对象
    	if ($user->create()) {
    		// 操作数据库->添加数据，并获取主键
    		$id = $user->add();
    		session('user_id', $id);
    	} else {
    		// 根据模型自动验证，如果存在相同用户名返回'exist'。
    		$this->ajaxReturn($user->getError(), "EVAL");
    	}
    }
    
    /**
     * 验证用户密码和权限，并将用户id和权限写入session方便后续验证。
     */
    private function checkUser() {
    	// 构造用户数据基础模型
    	$user = M('ecnu_mind.user_base');
    	
    	// 启动session。
    	session_start();
    	 
    	// 获取post方式传来的username和password
    	$username = I('post.username');
    	$password = I('post.password');
    	 
    	// sql查询： SELECT password,username FROM user_custom where username='username';
    	$condition['username'] = $username;
    	 
    	$result = $user->where($condition)->field('password, user_id, user_access')->find();
    	 
    	// 如果查询失败，代表user不存在，返回下列not_exist。
    	if ($result == null){
    		$this->ajaxReturn( "user_noexist", "EVAL");
    	}
    	
    	// 如果查询成功，且密码正确。
    	if ($result['password'] === md5($password)) {
    		// 将userid放入session，作为后台识别用户操作身份句柄。
    		$userId = $user->user_id;
    		session('user_id', $userId);
    			
    		// 设置登录权限，作为后台校验用户权限的依据。
    		session('user_access', $user->user_access);
    		
    		// 设置登录日期
    		$data['last_login_date'] = date('Y-m-d');
    		$user->where("user_id=$userId")->save($data);
    		
    	} else {
    		// 否则代表存在用户，但是密码错误，返回下列js变量，利用eval脚本解析器获取变量
    		$this->ajaxReturn("password_error", "EVAL");
    	}
    }
    
    private function loginCustom() {
    	$custom = M('ecnu_mind.user_custom');
    	$result = $custom->field('student_id,complete_steps')->find(session('user_id'));
    	
    	// 判断用户信息是否完善， 如果不完善要求用户补全
    	if ($result['complete_steps'] < 11) {
    		$this->ajaxReturn("user_custom_incomplete", "EVAL");
    	}
    	
    	// 如果用户信息完整，则返回成功信息，并将student_id存入会话。
    	session('student_id', $result['student_id']);
    	
    	$this->ajaxReturn("custom_login", "EVAL");
    }
    
    private function loginAdmin() {
    	$admin = M('ecnu_mind.user_admin');
    	$result = $admin->find(session('user_id'));
    	
    	// 获取管理员权限存入session
    	// access_id 对应院系id表示该管理员权限为哪一级
    	session('access_id', $result['access_id']);
    	$this->ajaxReturn("admin_login", "EVAL");
    }
}