<?php
namespace Home\Common\Controller;
use Think\Controller;

class CommonController extends Controller{
	public function _initialize(){
		// 自动运行方法
		if( null === session("username")){
			// 跳转回网站根目录（/）
			$this->error("对不起，您还未登! 请先登录再使用本系统", U('/'));
		}
	}
}
?>