<?php
namespace Admin\Controller;
use Think\Controller;
class CurrentCompController extends CompsinfoController {
    public function CurrentComp() {
    	$this->returnAdminAccess();
    	$this->display();
    }
    
	public function showAllCurrentItem(){
		// 如果不存在（或超时--10分钟）该管理员权限能查看范围内的、且已结束竞赛的信息缓存，则重新从数据库载入。
	  		// 根据access_id获取该管理员所属院系，或学校层面管理员。
	  		$accessName = M('academy')->find(session('access_id'))['name'];
	  		$condition['comp_state'] = array('in','待审批,审批通过,审批未通过,正在进行');
	  		if ($accessName !== "华东师范大学")
	  			$condition['owner_academy'] = $accessName;
	  		
	  		// 根据条件获取返回前台的信息。
	  		$returnToFront = $this->getCompsByCondition($condition);
	  		
	  		// 2分钟更新一次缓存  		
  		$this->ajaxReturn(json_encode($returnToFront),'EVAL');
	}
	
	
	//前台返回，checkedItemID（勾选中的行的comp_item_id的数组），judgeAction审批或获奖动作，judgeActionVal审批或获奖动作的值
	public function judgeItem() {
		//$checkedItemID为前台返回的checked的行的comp_item_id
		$checkedItemID = I('post.checkedItemID');
		//将$checkedItemID字符串（以逗号分隔）变为$checkedItemIDArray数组
		if(null == $checkedItemID) $this->ajaxReturn('unseleceted');
		$checkedItemIDArray = explode(',', $checkedItemID);
		
		//$judgeAction为前台进行的审批动作
		$judgeAction = I('post.judgeAction');
		//$judgeAction为前台进行的审批动作
		$judgeActionVal = I('post.judgeActionVal');
		//根据不同的前台操作给予后台不同的数据库赋值
 		switch ($judgeActionVal){
			case 'approved': 
				$dataToSql[$judgeAction] ='审批通过';
				break;
			case 'disapproved': 
				$dataToSql[$judgeAction] ='审批未通过';
				break;
			case 'country1':
				$dataToSql[$judgeAction] ='全国一等奖';
				break;
			case 'country2':
				$dataToSql[$judgeAction] ='全国二等奖';
				break;
			case 'country3':
				$dataToSql[$judgeAction] ='全国三等奖';
				break;
			case 'city1':
				$dataToSql[$judgeAction] ='省市一等奖';
				break;
			case 'city2':
				$dataToSql[$judgeAction] ='省市二等奖';
				break;				
			case 'city3':
				$dataToSql[$judgeAction] ='省市三等奖';
				break;
			case 'school1':
				$dataToSql[$judgeAction] ='校级一等奖';
				break;
			case 'school2':
				$dataToSql[$judgeAction] ='校级二等奖';
				break;
			case 'school3':
				$dataToSql[$judgeAction] ='校级三等奖';
				break;
			default:
				break;
		}
		
		$compItemModel = M('ecnu_mind.competition_main');
		
		//取出所有选中的compItemID,每一行进行写入数据库操作
		foreach ($checkedItemIDArray as $key=>$val){
			$compItemModel->where("comp_item_id=$val")->save($dataToSql);
		}
		$this->ajaxReturn('success','EVAL');
	}
}