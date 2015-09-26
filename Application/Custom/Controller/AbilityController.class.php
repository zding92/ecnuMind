<?php
namespace Custom\Controller;
use Custom\Common\Controller\CommonController;
class AbilityController extends CommonController{
	
	/**
	 * 生成数据库内的三级能力的json格式数据
	 */
	public function genDB() {
	// 获取第一级能力设置
		$model_f = M('ecnu_mind.field', null);
		$field = $model_f->field('id,name')->select();
		
		$list1 = array();
		foreach ($field as $f) {
			// 获取第二级能力设置
			$model_d = M('ecnu_mind.direction', null);
			$condition['Field_id'] = $f['id'];
			$direction = $model_d->field('id,name')->where($condition)->select();
			
			$list2 = array();
			foreach ($direction as $d) {
				// 获取第三级能力设置
				$model_a = M('ecnu_mind.ability', null);
				$condition_2['Direction_id'] = $d['id'];
				$temp = $model_a->field('name')->where($condition_2)->select();
				// urlencode 与 urldecode解决中文编码的问题
				foreach ($temp as $k => $t) {
					$t['name'] = urlencode($t['name']);
					$temp[$k] = $t;
				}
				$list2[urlencode($d['name'])] = $temp;
			}
			
			$list1[urlencode($f['name'])] = $list2;
		}
		// 调试
		//$str1 = urldecode(json_encode($list1).";");
		// 返回json格式的数据
		return $this->ajaxReturn(urldecode(json_encode($list1)), "EVAL");
	}
	
	public function checkAbility() {
		$abilityName = I('abilityName');
		$selfComment = I('selfComment');
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
				$userAbility->filter('strip_tags')->add();
				$this->ajaxReturn("var update_success = true;","EVAL");
			} else {
				$this->ajaxReturn("var update_success = false;","EVAL");
			}
		} 
		// 防止用户通过非法手段注入数据，以及防止数据传输过程中失真。
		else $this->ajaxReturn("var update_success = false;","EVAL");
	}
	
	public function addAbility() {
		$abilityName = I('abilityName');
		$directionName = I('directionName');

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
				$abilityTable->filter('strip_tags')->add();
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