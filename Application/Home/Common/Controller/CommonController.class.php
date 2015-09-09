<?php
namespace Home\Common\Controller;
use Think\Controller;

class CommonController extends Controller{
	public function _initialize(){
		// 自动运行方法
		if( null === session("username")){
			$this->error("请先登录在使用本系统！", "../..");
		}
	}
}
?>