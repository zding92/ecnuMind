<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Common\Controller\CommonController;

class HistoryItemController extends CommonController {
    public function Historyitem(){
    	$this->display();
  	}
  	
  	public function showAllHistoryItem(){
  		$compItemModel = M('ecnu_mind.competition_main', null);
		$compInfoModel = M('ecnu_mind.competition_info', null);
		
		//allHistoryItem为competition_main 表格中的所有行，取"comp_item_id","comp_type_id"列的二维数组
		$allHistoryItem = $compItemModel -> field("comp_item_id","comp_type_id") -> select();
		
		//遍历$allHistoryItem的每一行，每一行成为一个一维数组$eachHistoryItem
		foreach ($allHistoryItem as $eachHistoryItem){
			
			// 获得该项竞赛的基本信息,在competition_info表中，找到对应的comp_type_id的行，取出其conp_name和comp_template
			$compinfo =	$compItemModel
			->where('comp_id='.$eachHistoryItem['comp_type_id'])
			->field("comp_name, comp_template")
			->find();
			
			// 根据模板名称和竞赛报名ID获得详细信息
			$compDetailModel = M('ecnu_mind.'.$compinfo['comp_template'].'_info',null);
		}
  	}
}
