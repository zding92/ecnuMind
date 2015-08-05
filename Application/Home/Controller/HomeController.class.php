<?php
namespace Home\Controller;
use Think\Controller;
class HomeController extends Controller {
	/**
	 * 显示home界面
	 */
	public function home(){
		$this->display();
	}
	
	/**
	 * 载入个人主页时提交Ajax数据的Target
	 */
	public function loadPage($action) {
		switch ($action) {
			case "btn_main" : 
				$this->showMain();						
				break;
			case "btn_base_info" :
				$this->showBaseInfo();
				break;
			default : break;
		}
	}
	
	/**
	 * 返回主界面初始化所需要的数据。
	 */
	private function showMain() {
		$initJs = $this->returnBaseinfo();
		$chartData = $this->returnChartData();
		$this->ajaxReturn($initJs.$chartData, "EVAL");
	}
	
	/**
	 * 载入mysql中的数据。并以json返回给前台。
	 */ 
	private function returnBaseinfo() {
		// 初始化M对象（相较于D对象效率高，此处仅用于基本查询）。
		$model = M('info');
	    // 获取登录时存放的session。
		$username = session("username");
		// sql语句：SELECT nickname,email,phone,address,name,department,academy,
		//					major,grade,gender,brief,hiddenname FROM user_info where username='username';
		$condition['username'] = $username;
		$model->field("nickname,email,phone,address,name,department,academy,major,grade,gender,brief,hiddenname,message")->
		where($condition)->find();
		// 构造json，并返回数据
		return "init_js = ".json_encode($model->data()).";";
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
	private function showBaseInfo() {
		// 刷新个人信息Json数据。并返回
		$initJs = $this->returnBaseinfo();
		$this->ajaxReturn($initJs,"EVAL");
	}
}