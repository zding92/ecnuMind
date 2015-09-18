<?php
namespace Home\Controller;
use Home\Common\Controller\CommonController;
class GuideController extends CommonController {
	public function guide() {
		// 建立user_info表模型
		$infoModel = M('ecnu_mind.user_info');
		// 检查哪些列为空
		$uid = session('userid');
		$infoData = $infoModel->field('id,username,password', true)->find($uid);
		$startStep['stepGuideInProgress'] = $infoData['info_complete'];
		$startStep['stepGuideNum'] = count($infoData) - 1;
		$this->assign($startStep);
		$this->display();
	}
}