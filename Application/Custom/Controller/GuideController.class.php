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
	
	//通过缓存（生成缓存）显示所有学院
	public function getAllAcademy(){
		//如果不存在所有学院的缓存，则生成缓存
		if (!S("allAcademy")){
			$allAcademyModel = M("ecnu_mind.academy",null);
			$allAcademy = $allAcademyModel->select();
			$academyToFrontCnt = 0;
			foreach ($allAcademy as $allAcademyRow){
				$academyToFront[$academyToFrontCnt] = $allAcademyRow["name"];
				$academyToFrontCnt++;
			}
			//添加缓存，缓存生存时间，1小时
			S("allAcademy", $academyToFront, array('type'=>'file','expire'=>3600));
		}
	
		$this->ajaxReturn(S("allAcademy"));
	}
	
	public function submitItem() {
		$custom = D('Custom');
		
		if (!$custom->create()) {
			$this->ajaxReturn($custom->getError(), 'EVAL');
		} else {
			if (isset($custom->academy)) {
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