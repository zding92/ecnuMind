<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Common\Controller\CommonController;
class AbilityControlController extends CommonController{
	public function AbilityControl(){
		$this->display();
	}
	
	public function showAllAbility(){
		$abilityModel = M('ecnu_mind.ability', null);
		$directionModel = M('ecnu_mind.direction', null);
		$fieldModel = M('ecnu_mind.field', null);
		
		// dataToFront表用于返回给前台能力数据
		$cnt = 0;
		$dataToFront = array();
		
		$abilityTable = $abilityModel->select();
		foreach ($abilityTable as $abilityTableRow) {
			// 当前能力的id
			$dataToFrontRow['ability_id'] = $abilityTableRow['id'];
			// 当前能力的名称
			$dataToFrontRow['ability_name'] = $abilityTableRow['name'];
			// 当前能力的审核状态
			if ($abilityTableRow['state'] == 'y')
				$dataToFrontRow['ability_status'] = '通过';
			else if ($abilityTableRow['state'] == 'n')
				$dataToFrontRow['ability_status'] = '未通过';
			else
				$dataToFrontRow['ability_status'] = '未审批';
			
			$dataToFrontRow['ori_ability_status'] = $abilityTableRow['state'];
			
			// 当前能力所属方向的名称			
			$directionTableRow = $directionModel
								->where("id=".$abilityTableRow['direction_id'])
								->find();
			$dataToFrontRow['direction_name'] = $directionTableRow['name'];
			
			// 当前能力所属领域的名称			
			$fieldTableRow = $fieldModel
								->where('id='.$directionTableRow['field_id'])
								->find();
			$dataToFrontRow['field_name'] = $fieldTableRow['name'];
			
			// 当前能力加入总的能力列表
			$dataToFront[$cnt] = $dataToFrontRow;
			
			$cnt++;
		}
		
		$this->ajaxReturn(json_encode($dataToFront),'EVAL');
	}
	
	public function abilityJudge(){
		// 获取前台勾选的能力列表
		$rowChoosedId = I('post.checkedItemID');
		// 后去前台的审核意见
		$approved  = I('post.judgeAction');
		// 将能力列表转化成数组的形式
		$choosedId = explode(',', $rowChoosedId);

		if($approved =='approved'){
			// legal表示此次审批是否合法
			$legal = true;
			$approved = 'y';
		}
		else if ($approved =='disapproved'){
			$approved = 'n';
			$legal = true;
		}
		else
			$legal = false;
		if($legal){
			if(count($choosedId)==0)
				$this->ajaxReturn('no_selected',"EVAL");
			else{
				$ability = M('ecnu_mind.ability');
				for($i=0;$i<count($choosedId);$i++){
					$state['state'] = $approved;
					// 更改数据库ability表中能力的审核状态
					$ability->where('id='.$choosedId[$i])->save($state);
				}
				$this->ajaxReturn('success',"EVAL");
			}
		}
		else
			$this->ajaxReturn('illegal',"EVAL");
	}
}
?>