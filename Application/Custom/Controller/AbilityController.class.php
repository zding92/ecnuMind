<?php
namespace Custom\Controller;
use Custom\Common\Controller\CommonController;
class AbilityController extends CommonController{
	
	/**
	 * 生成数据库内的三级能力的json格式数据
	 */
	public function genDB() {
		// 如果能力表缓存不存在。重新从数据库读取并建立新缓存。
		if (!S('ability_table')) {
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
			// 缓存文件10分钟
			S('ability_table',urldecode(json_encode($list1)),array('type'=>'file','expire'=>600));
		}
		
		// 调试
		//$str1 = urldecode(json_encode($list1).";");
		// 返回json格式的数据
		return $this->ajaxReturn(S('ability_table'), "EVAL");
	}
	
public function getAbility() {
		$userAbility = M('ecnu_mind.user_has_ability', null);
		$result = $userAbility->field('Ability_name')->select(session('user_id'));
		return $this->ajaxReturn(json_encode($result),"EVAL");
	}
	
	public function getSelfComment() {
		$abilityName = I('abilityName');
		$userAbility = M('ecnu_mind.user_has_ability', null);
		$abilityTable = M('ecnu_mind.ability', null);
		
		$abilityInfo = $abilityTable->where("name='".$abilityName."'")->find();
		if (isset($abilityInfo)) {
			$queryData['User_id'] = session('user_id');
			$queryData['Ability_id'] = $abilityInfo['id'];
			$userAbility->where($queryData)->find();
			$this->ajaxReturn($userAbility->selfcomment, "EVAL");
		}
		// 防止用户通过非法手段注入数据，以及防止数据传输过程中失真。
		else
			$this->ajaxReturn("fail","EVAL");
	}
	
	public function checkAbility() {
		if (I('hasAbility') == "false")
			$this->deleteAbility();
		else
			$this->updateAbility();
	}
	
	public function addAbility() {

		// 获取前台传来的数据
		$fieldName 	   = I('fieldName');
		$directionName = I('directionName');
		$abilityName   = I('abilityName');
		$selfComment   = I('selfComment');
		
		// 创建表的模型
		$fieldTable = M('ecnu_mind.field', null);
		$directionTable = M('ecnu_mind.direction', null);
		$abilityTable = D('ecnu_mind.ability', null);
		
		$fieldTable->where("name='".$fieldName."'")->find();		

		$directionTable->where("name='".$directionName."' AND Field_id='".$fieldTable->id."'")->find();
		
		$abilityInfo = 
		$abilityTable->where("name='".$abilityName."' AND Direction_id='".$directionTable->id."'")->find();

		// 能力已经存在
		if (isset($abilityInfo)) {
			$this->ajaxReturn("ability_exist", "EVAL");
		}
		// 新增一个能力
		else {
			// 在ability表中新增
			$abilityInfo['name'] = $abilityName;
			$abilityInfo['Direction_id'] = $directionTable->id;
			$abilityInfo['tags'] = $abilityName;
			$abilityInfo['people_count'] = 1;
			$abilityInfo['state'] = "u";
			$abilityInfo['_logic'] = "AND";
			$abilityTable->create($abilityInfo);
			$abilityTable->add();
			
			// 在user_has_ability表中新增
			$insertData['User_id'] = session('user_id');
			$insertData['Ability_name'] = $abilityName;
			// 重新查一遍ability表以获取最新插入的数据的id
			$abilityTable->where("name='".$abilityName."' AND Direction_id='".$directionTable->id."'")->find();
			$insertData['Ability_id'] = $abilityTable->id;
			if ($selfComment !== '')
				$insertData['selfComment'] = $selfComment;
			$userAbility = M('ecnu_mind.user_has_ability', null);
			$userAbility->create($insertData);
			$userAbility->add();
			
			$this->ajaxReturn("add_success", "EVAL");
		}
		
	}
	
	public function addComment($Comment) {
		// 他人评价。
	}
	
	public function findSimilarAbility($AbilityName) {
		// 利用sphinx检索相似的能力
	}
	
	private function deleteAbility() {
		$abilityName = I('abilityName');
		$userAbility = M('ecnu_mind.user_has_ability', null);
		$abilityTable = M('ecnu_mind.ability', null);
		
		$abilityInfo = $abilityTable->where("name='".$abilityName."'")->find();
		if (isset($abilityInfo)) {
			$deleteData['User_id'] = session('user_id');
			$deleteData['Ability_id'] = $abilityInfo['id'];
			$userAbility->where($deleteData)->delete();
			$this->ajaxReturn("delete_success", "EVAL");
		}
		// 防止用户通过非法手段注入数据，以及防止数据传输过程中失真。
		else
			$this->ajaxReturn("fail","EVAL");
	}
	
	private function updateAbility() {
		$abilityName = I('abilityName');
		$selfComment = I('selfComment');
		$userAbility = M('ecnu_mind.user_has_ability', null);
		$abilityTable = M('ecnu_mind.ability', null);
		
		$abilityInfo = $abilityTable->where("name='".$abilityName."'")->find();
		if (isset($abilityInfo)) {
			$insertData['User_id'] = session('user_id');
			$insertData['Ability_name'] = $abilityName;
			$insertData['Ability_id'] = $abilityInfo['id'];
			if ($userAbility->where($insertData)->find() === null) {
				if ($selfComment !== '')
					$insertData['selfComment'] = $selfComment;
				$insertData['_logic'] = 'AND';
				$userAbility->create($insertData);
				$userAbility->add();//插入已有数据
				$this->ajaxReturn("insert_success","EVAL");
			} else {
				$updateData['selfComment'] = $selfComment;
				$userAbility->where($insertData)->save($updateData);//更新已有数据
				$this->ajaxReturn("update_success","EVAL");
			}
		}
		// 防止用户通过非法手段注入数据，以及防止数据传输过程中失真。
		else $this->ajaxReturn("fail","EVAL");
	}
}
?>