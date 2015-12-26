<?php
namespace Admin\Common\Controller;
use Think\Controller;

class CommonController extends Controller{
	public function _initialize(){
		// 自动运行方法
		if( null === session("user_id") || 'admin' !== session("user_access")){
			// 跳转回网站根目录（/）
			$this->error("对不起，您还未登! 请先登录再使用本系统", U('/'));
		}
		
		// 计算时间戳，并判断是否超时。
		// 超时设置：3个小时=10800秒
		$time = time();
		$timeDiffer = $time - (int)session('login_time');
		if ($timeDiffer > 10800) {
			// 清空session
			session(null);
			// 跳转回网站根目录（/）
			$this->error("对不起，登陆超时，请重新登录", U('/'));
		}
		
		$dh=opendir("E:\CompItemApply");
		echo $dh;

	}
	protected function returnAdminAccess() {
		// 如果管理员是最高权限。前台显示院系过滤框。
		if (session('access_id') == 0) $this->assign('admin_access', 'all');
		else $this->assign('admin_access', 'academy');
	}
	
	protected function getNoFileComp(){
		
	}
}
?>