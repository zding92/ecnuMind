<?php
namespace Custom\Controller;
use Custom\Common\MyFunc\CheckForm;

class HomeController extends UserinfoController {
	/**
	 * 显示home界面
	 */
	public function home(){
		$this->display();
	}	
	
	//加载修改密码界面
	public function Safe(){
		$this->display();
	}
	
	/**
	 * 载入个人主页时提交Ajax数据的Target
	 */
	public function loadPage() {
		$action = I('action');
		switch ($action) {
			case "getUserJson" :
				$this->returnBaseinfo();
				break;
			case "btn_main" : 
				$this->getMainData();						
				break;
			case "btn_base_info" :
				$this->getBaseInfoData();
				break;
			default : break;
		}
	}
	
	/**
	 * 载入个人主页读取通知的方法
	 */
	public function loadMessage() {
		$Data = M("ecnu_mind.user_custom");	// 构造用户数据基础模型
		$Note = M("ecnu_mind.notification");

		$username = session("user_id");//读取当前用户ID
		$condition['user_id'] = $username;
		//根据user_id找到对应的academy_id

		$noteSeleted = $Data
					  ->where($condition)
		              ->field('academy')
		              ->find();

		//根据academy_id找到对应的行
		$limitedNote = $Note
				  ->where("academy_id = $noteSeleted[academy]")
				  ->select();
		//二维数组的行数

		$i = 0;
		//遍历limitedNote:存放指定数目的note

		foreach($limitedNote as $eachNote) {
			//returnToFront为返回至前台的数组
			$result['note_time'] = $eachNote['note_time'];
			$result['note_detail'] = $eachNote['note_detail'];
			$result['note_academy'] = $eachNote['academy_id'];
			$returnToFront[$i] = $result;
			$i++;
		}
		$this->ajaxReturn(json_encode($returnToFront),'EVAL');
		
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
	
	/**
	 * 返回主界面初始化所需要的数据。
	 */
	private function getMainData() {
		$chartData = $this->returnChartData();
		$this->ajaxReturn($initJs.$chartData, "EVAL");
	}
	
	/**
	 * 载入mysql中的数据。并以json返回给前台。
	 */ 
	private function returnBaseinfo() {
		// 初始化M对象（相较于D对象效率高，此处仅用于基本查询）。
		$model = M('user_custom');
		
		$model->field("user_id, complete_steps",true)->find(session('user_id'));
		$model->data($this->translateToName($model->data()));
		// 构造json，并返回数据
		$this->ajaxReturn(json_encode($model->data()), "EVAL");

	}
	
	private function returnChartData() {
		// 临时使用这四项tab作为测试。
		$tabs_script="var tabs='";
		$tabs_test=array('PHP','嵌入式系统','SQL','C/C++','JavaScript');
		for($i=0; $i<5;$i++)
		{
			$tabs_script=$tabs_script.'<p>'.$tabs_test[$i].'</p>';
		}
		$tabs_script=$tabs_script."'";
		
		// 临时使用以下json数据作为图表内容，以后应该从数据库载入，然后编码为json格式再返回
		$IT_Value=12;
		$Design_Value=3;
		$BM_Value=0;
		$Art_Value=2;
		$DoughnutData='var doughnutData = [
				    {
					    value: '.$IT_Value.',
					    color:"#F7464A",
					    highlight: "#FF5A5E",
					    label: "信息技术(项)"
				    },
				    {
					    value: '.$Design_Value.',
					    color: "#46BFBD",
					    highlight: "#5AD3D1",
					    label: "设计(项)"
				    },
				    {
					    value: '.$BM_Value.',
					    color: "#FDB45C",
					    highlight: "#FFC870",
					    label: "生物医药(项)"
				    },
				    {
					    value: '.$Art_Value.',
					    color: "#949FB1",
					    highlight: "#A8B3C5",
					    label: "艺术(项)"
				    }
			    ];';
		return $DoughnutData.$tabs_script;
	}
	
	/**
	 * 显示个人信息界面
	 */
	private function getBaseInfoData() {
		// 刷新个人信息Json数据。并返回
		$initJs = $this->returnBaseinfo();
		$this->ajaxReturn($initJs,"EVAL");
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