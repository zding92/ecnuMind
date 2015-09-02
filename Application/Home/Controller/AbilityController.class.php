<?php
namespace Home\Controller;
use Think\Controller;
class AbilityController extends Controller {
	
	public function checkAbility() {
		$abilityName = I('abilityName', 0, 'strip_tags,htmlspecialchars,trim');
		$selfComment = I('selfComment', 0, 'strip_tags,htmlspecialchars,trim');
		$userAbility = M('ecnu_mind.user_has_ability', null);
		$abilityTable = M('ecnu_mind.ability', null);
		
		$abilityInfo = $abilityTable->where("name='".$abilityName."'")->find();
		if (isset($abilityInfo)) {
			$insertData['User_id'] = session('userid');
			$insertData['Ability_name'] = $abilityName;
			$insertData['Ability_id'] = $abilityInfo['id'];
			if ($selfComment !== '')
				$insertData['selfComment'] = $selfComment;
			$insertData['_logic'] = 'AND';
			if ($userAbility->where($insertData)->find() === null) {
				$userAbility->create($insertData);
				$userAbility->add();
				$this->ajaxReturn("var update_success = true;","EVAL");
			} else {
				$this->ajaxReturn("var update_success = false;","EVAL");
			}
		} 
		// 防止用户通过非法手段注入数据，以及防止数据传输过程中失真。
		else $this->ajaxReturn("var update_success = false;","EVAL");
	}
	
	public function addAbility() {
		$abilityName = I('abilityName', 0, 'strip_tags,htmlspecialchars,trim');
		$directionName = I('directionName', 0, 'strip_tags,htmlspecialchars,trim');

		$abilityTable = M('ecnu_mind.ability', null);
		$directionTable = M('ecnu_mind.direction', null);
		$fieldTable = M('ecnu_mind.field', null);
		$abilityInfo = $abilityTable->where("name='".$abilityName."'")->find();
		$directionInfo = $directionTable->where("id='".$abilityInfo->Direction_id."'")->find();
		if (isset($abilityInfo) && isset($directionInfo)) {
			// 如果存在完全一样的能力（包括方向），则不允许添加
			$this->ajaxReturn("var add_success = false;","EVAL");
		} else {
			$directionInfo = $directionTable->where('name='.$directionName)->find();
			if (isset($directionInfo)) {
				$abilityInfo['name'] = $abilityName;
				$abilityInfo['direction_id'] = $directionInfo['id'];
				// 所有ability的tag都包含其name。
				$abilityInfo['tag'] = $abilityName;
				$abilityTable->create();
				$abilityTable->add();
				$this->ajaxReturn("var add_success = true;","EVAL");
			} else {
				$this->ajaxReturn("var add_success = false;","EVAL");
			}
		}
	}
	
	public function addComment($Comment) {
		// 他人评价。
	}
	
	public function findSimilarAbility($AbilityName) {
		// 利用sphinx检索相似的能力
	}
}
?>