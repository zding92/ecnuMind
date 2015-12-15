<?php
namespace Custom\Controller;
use Custom\Common\Controller\CommonController;

class HomeController extends UserinfoController {
	/**
	 * 显示home界面
	 */
	public function home(){
		$name = $this->getBaseinfo("name")['name'];
		$this->assign('name', $name);
		$this->display();
	}	
}