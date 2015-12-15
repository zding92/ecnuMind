<?php
namespace Custom\Controller;
use Custom\Common\MyFunc\CheckForm;

class PersonalinfoController extends UserinfoController {
	/**
	 * 显示home界面
	 */
	public function personalinfo(){
		$this->display();
	}	
	
	public function getPersonalInfo() {
		$schoolJson = $this->getSchoolJson();
		$personalinfo = $this->getBaseinfo('student_id,complete_steps',true);
		$return[0] = $schoolJson;
		$return[1] = $personalinfo;
		$this->ajaxReturn(json_encode($return),"EVAL");
	}
	
	/**
	 * 管理员界面根据user_id获取用户信息
	 */
	public function adminGetPersonInfo($userID){
		// 初始化M对象（相较于D对象效率高，此处仅用于基本查询）。
		$model = M('user_custom');
		
		// except决定是排除查询还是选择查询。如果是排除查询是查询除了指定field外的所有域。
		$result = $model->field('complete_steps,unreadmsg_admin_num',true)->find($userID);
						
		if (!is_dir("/Public/img/photo/".$result['user_id'])) {
			$result['photo_path'] = "default";
		} else {
			$result['photo_path'] = $result['user_id'];
		}
		
		// 构造json，并返回数据
		$this->ajaxReturn(json_encode($result),"EVAL");
	}
	
	/**
	 * 个人信息维护后台验证。
	 */
	public function  checkForm() {
		$action = I('action');
		$value = I('value');
		$checkForm = new \Custom\Common\MyFunc\CheckForm();
		$checkForm->checkOne($action, $value);
		
		// 根据验证结果返回Js变量。
		if ($checkForm->isRepeat()) $this->ajaxReturn('repeat', "EVAL");
		else if($checkForm->isIllegal() && $checkForm->illegalInfo == "") 
			$this->ajaxReturn("illegal", "EVAL");
		else if($checkForm->illegalInfo != "") 
			$this->ajaxReturn($checkForm->illegalInfo, "EVAL");
		else $this->ajaxReturn('legal', "EVAL");
	}
	
	/**
	 * 个人信息维护修改提交。
	 */
	public function  submitModify() {
		$action = I('action');
		$value = I('value');
		$checkForm = new \Custom\Common\MyFunc\CheckForm();
		$allData = I('get.');
		if (isset($_SESSION['user_id'])) {
			// 如果存在会话，才开始校验，否则直接退出。
			$allData['user_id'] = session('user_id');
			if ($checkForm->checkAll($allData)) {
				if ($this->updateInfo($allData)) {
					// 写入数据库成功
					$this->ajaxReturn(json_encode($allData), "EVAL");
				} else {
					// 写入数据库失败
					$this->ajaxReturn('failed', "EVAL");
				}
			} else {
				// 后台校验不通过，暂时都通过compelete变量回馈。
				// 日后应当细分错误信息。
				$this->ajaxReturn('failed', "EVAL");
			}
		} else {
			$this->ajaxReturn('failed', "EVAL");
		}
	}
	
	/**
	 * 更新数据库
	 */
	private function updateInfo($allData) {
		// sql查询: update user_table set name = 'name',
		// ID = 'id',email = 'email', address = 'address', phone = 'phone', gender = 'gender',
		// academy = 'academy', department = 'department', major = 'major', brief = 'brief',
		// where username = 'username';
		$user_id = array_pop($allData);
		$model = M('user_custom');
		$return = $model->where("user_id=$user_id")->filter('strip_tags')->save($allData);
		if ($return === false) return false;
		return true;
	}
}