<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Common\Controller\CommonController;

class CompsinfoController extends CommonController {
	
	/**
	 *  检索条件: 由权限和竞赛状态决定。
	 *	 权限：校级，院级
	 *  竞赛状态：已结束/待审批/审批通过/审批未通过/正在进行中
	 */
	protected function getCompsByCondition($condition){
	  	$compItemModel = M('ecnu_mind.competition_main');
		$compInfoModel = M('ecnu_mind.competition_info');
		
		
		// $allCompItem为competition_main 表格中的所有行，
		// 取"comp_item_id,comp_item_name,author1_name,owner_academy,comp_type_id,apply_date,comp_state,comp_prize"列的二维数组
		$allCompItem = $compItemModel->where($condition)->field('comp_participant_id',true)->select();
		
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
			$returnItemInfo['comp_author1'] = $eachCompItem['author1_name'];
			$returnItemInfo['apply_academy'] = $eachCompItem['apply_academy'];
			// 已经结束的竞赛仅显示年份，未结束的显示具体时间并且返回未结束的状态
			if ($condition['comp_state'] == '已结束')
				$returnItemInfo['comp_date'] = substr($eachCompItem['apply_date'],0,4).'年';
			else {
				$returnItemInfo['comp_date'] = $eachCompItem['apply_date'];
				$returnItemInfo['comp_state'] = $eachCompItem['comp_state'];
			}
			
			
			$returnItemInfo['comp_item_id'] = $eachCompItem['comp_item_id'];
			$returnItemInfo['comp_type_id'] = $eachCompItem['comp_type_id'];
			
			$comp_item_id = $eachCompItem['comp_item_id'];

	        $comp_item_name = $eachCompItem['comp_item_name'];
			//$returnItemInfo['comp_item_name'] = "<a href='".U("Custom/$comp_template/$comp_template"."Origin","compItemId=$comp_item_id","")."' target='_blank'>$comp_item_name</a>";
			$returnItemInfo['comp_item_name'] = "<a href='".U("Admin/ItemView/ItemView","comp_item_id=$comp_item_id","")."' target='_blank'>$comp_item_name</a>";
				
			$returnToFront[$i] = $returnItemInfo;
			$i++;
		}	
		return $returnToFront;
  	}
}