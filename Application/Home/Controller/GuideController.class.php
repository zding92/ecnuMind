<?php
namespace Home\Controller;
use Home\Common\Controller\CommonController;
class GuideController extends CommonController {
	public function guide() {
		// 建立user_info表模型
		$infoModel = M('ecnu_mind.user_info');
		// 检查哪些列为空
		$uid = session('userid');
		$infoData = $infoModel->field('id,username,password,brief', true)->find($uid);
		// 规定信息补全总步数
		$infoData['stepGuideNum'] = 10;		
		$this->assign($infoData);
		$this->display();
	}
	
	public function submitItem() {
		$infoModel = D('info');
		
		if (!$infoModel->create()) {
			$this->ajaxReturn($infoModel->getError(), 'EVAL');
		} else {
			// 单独对院/系/专业进行校验。维护数据完整性。
			if (isset($infoModel->major)) {
				$checkForm = new \Home\Common\MyFunc\CheckForm();
				$checkData = $infoModel->academy."|".$infoModel->department."|".$infoModel->major;
				$checkForm->checkOne('combobox', $checkData);
				// 返回校验失败的院/系/专业。
				if ($checkForm->isIllegal()) $this->ajaxReturn($checkForm->illegalInfo, 'EVAL');
			}
			unset($infoModel->password);
			
			// 通过验证，设置完成步骤
			$infoModel->info_complete = I('step') + 1;
			
			$infoModel->where('id='.session('userid'))->save();
			
			$this->ajaxReturn('success', 'EVAL');
		}
	}
}