<?php
namespace Custom\Controller;

class GuideController extends UserinfoController {
	
	public function guide() {
		// 建立user_custom表模型
		$custom = M('ecnu_mind.user_custom');
		
		// 检查哪些列为空
		$uid = session('user_id');
		$customData = $this->getBaseinfo('user_id,brief', true);
		
		// 规定信息补全总步数
		$customData['stepGuideNum'] = 10;	
		$schoolJson = $this->getSchoolJson();
		$customData['schoolJSON'] = json_encode($schoolJson);
		$this->assign($customData);		
		$this->display();
	}
	
	public function submitItem() {
		$custom = D('Custom');
		
		if (!$custom->create()) {
			$this->ajaxReturn($custom->getError(), 'EVAL');
		} else {
			if (isset($custom->major)) {
				$checkForm = new \Custom\Common\MyFunc\CheckForm();
				$checkData = $custom->academy."|".$custom->department."|".$custom->major;
				$checkForm->checkOne('major', $checkData);
				// 返回校验失败的院/系/专业。
				if ($checkForm->isIllegal()) $this->ajaxReturn($checkForm->illegalInfo, 'EVAL');
			} else if(isset($custom->department)) {
				$checkForm = new \Custom\Common\MyFunc\CheckForm();
				$checkData = $custom->academy."|".$custom->department;
				$checkForm->checkOne('department', $checkData);
				if ($checkForm->isIllegal()) $this->ajaxReturn($checkForm->illegalInfo, 'EVAL');
			} else if (isset($custom->academy)) {
				$checkForm = new \Custom\Common\MyFunc\CheckForm();
				$checkForm->checkOne('academy', $custom->academy);
				if ($checkForm->isIllegal()) $this->ajaxReturn($checkForm->illegalInfo, 'EVAL');
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