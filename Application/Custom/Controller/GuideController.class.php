<?php
namespace Custom\Controller;
class GuideController extends UserinfoController {
	public function guide() {
		// 建立user_custom表模型
		$custom = M('ecnu_mind.user_custom');
		// 检查哪些列为空
		$uid = session('user_id');
		$customData = $custom->field('user_id,brief', true)->find($uid);
		$customData = $this->translateToName($customData);
		// 规定信息补全总步数
		$customData['stepGuideNum'] = 10;	
		$schoolJson = $this->getJson();

		$this->assign($customData);		
		$this->display();
	}
	
	public function submitItem() {
		$custom = D('Custom');
		
		if (!$custom->create()) {
			$this->ajaxReturn($custom->getError(), 'EVAL');
		} else {
			
			// 单独对院/系/专业进行校验。维护数据完整性。
			if (isset($custom->major)) {
				$checkForm = new \Custom\Common\MyFunc\CheckForm();
				$checkData = $custom->academy."|".$custom->department."|".$custom->major;
				$checkForm->checkOne('combobox', $checkData);
				// 返回校验失败的院/系/专业。
				if ($checkForm->isIllegal()) $this->ajaxReturn($checkForm->illegalInfo, 'EVAL');
				
				$custom = $this->translateToid($custom);
			}
			
			// 将学号传入session
			if (isset($custom->student_id)) {
				session('student_id',$custom->student_id);
			}
			unset($custom->password);
			
			// 通过验证，设置完成步骤
			$custom->complete_steps = I('step') + 1;
			
			$custom->where('user_id='.session('user_id'))->filter('strip_tags')->save();
			
			$this->ajaxReturn('success', 'EVAL');
		}
	}
}