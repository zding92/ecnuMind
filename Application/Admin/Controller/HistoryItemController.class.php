<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Common\Controller\CommonController;

class HistoryItemController extends CommonController {
    public function Historyitem(){
    	$this->display();
  	}
  	
  	/**
  	 * 分页获取历史记录信息
  	 */
  	public function showAllHistoryItem(){
	  	$compItemModel = M('ecnu_mind.competition_main');
		$compInfoModel = M('ecnu_mind.competition_info');
		
		//建立作者user_custom表的model
		$userDetailModel = M('ecnu_mind.user_custom');
		
		// 如果不存在（或超时--10分钟）该管理员权限能查看范围内的、且已结束竞赛的信息缓存，则重新从数据库载入。
		if (!S("finish_comps_".session('access_id'))) {
			// 根据access_id获取该管理员所属院系，或学校层面管理员。
			$accessName = M('academy')->find(session('access_id'))['name'];
			
			// 检索条件
			$condition['comp_state'] = '已结束';
			if ($accessName !== "华东师范大学")
				$condition['owner_academy'] = $accessName;
			
			// $allCompItem为competition_main 表格中的所有行，
			// 取"comp_item_id,comp_item_name,author1_name,owner_academy,comp_type_id,apply_date,comp_state,comp_prize"列的二维数组
			// 并且由前台分页工具决定载入的数量。
			$allCompItem = $compItemModel
						   ->where($condition)
						   ->limit("'".I('get.offset').",".I('get.limit')."'")
						   ->field('comp_participant_id',true)
						   ->select();
			
			//返回二维数组的行数
			$i = 0;		
			
			//遍历$allHistoryItem的每一行，每一行成为一个一维数组$eachHistoryItem
			foreach ($allCompItem as $eachCompItem) {
				
				// 获得该项竞赛的基本信息,在competition_info表中，找到对应的comp_type_id的行，取出其conp_name和comp_template
				$compinfo =	$compInfoModel
							->where('comp_id='.$eachCompItem['comp_type_id'])
							->field("comp_name")
							->find();
							
				//$returnToFront为返回到前台的二维数组变量
				$returnItemInfo['comp_name'] = $compinfo['comp_name'];
				$returnItemInfo['comp_prize'] = $eachCompItem['comp_prize'];
				$returnItemInfo['comp_item_name'] = $eachCompItem['comp_item_name'];
				$returnItemInfo['comp_date'] = substr($eachCompItem['apply_date'],0,4).'年';
				$returnItemInfo['comp_author1'] = $eachCompItem['author1_name'];
				$returnItemInfo['apply_department'] = $eachCompItem['owner_academy'];
				
				$returnToFront[$i] = $returnItemInfo;
				
				$i++;
			}
			S("finish_comps_".session('access_id'), json_encode($returnToFront), array('type'=>'file','expire'=>600));
		} 
		
		$this->ajaxReturn(S("finish_comps_".session('access_id')),'EVAL');
  	}
}
