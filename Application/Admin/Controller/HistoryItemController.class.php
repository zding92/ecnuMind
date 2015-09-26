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
	  	$compItemModel = M('ecnu_mind.competition_main', null);
		$compInfoModel = M('ecnu_mind.competition_info', null);
		
		//建立作者user_custom表的model
		$userDetailModel = M('ecnu_mind.user_custom', null);
		
		// 检索条件
		$condition['comp_state'] = '已结束';
		
		// 如果符合条件的竞赛报名总数量，则查询并存入session.
		if (null === session('comp_count')){
			$compCount = $compItemModel
									->where($condition)
									->Count();
			session('comp_count', $compCount);
			$returnToFront['total'] = session('comp_count');
		}	
		else
			$returnToFront['total'] = session('comp_count');
		
		// 如果前台检索条件不存在，即不进行模糊搜索(模糊搜索为针对题目名或人名的相似查询)。
		$search = I('get.search');
		if ($search != '') {
			$searchCondition['author1_name'] = array('like', '%'.$search.'%');
			$searchCondition['comp_item_name'] = array('like', '%'.$search.'%');
			$searchCondition['_logic'] = 'or';
			$condition['_complex'] = $searchCondition;
		}		
			
			
		
		// $allCompItem为competition_main 表格中的所有行，取"comp_item_id,comp_type_id,apply_date,comp_state,comp_prize"列的二维数组
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
								->field("comp_name,comp_template")
								->find();
					
			// 竞赛模板名+_info为数据库表名。
			$compModelName = $compinfo['comp_template'].'_info';
			
			// 将所有竞赛报名信息表实例化成数组,如果数组中包含该表对象，则跳过实例化。
			if (!isset($compModels[$compModelName])) {
				$compModels[$compModelName] = M($compModelName);
			}
			
			// 根据表名获取其表对象。
			$compDetailModel = $compModels[$compModelName];			
			
			//$returnItemInfo为在对应的竞赛细节表中找到的对应的item_id的行
			//提取项目名称、第一作者
			$compDetailItem = $compDetailModel 
								-> where($eachCompItem)
								-> field("comp_item_name,author1_id")
								-> find();
			
			//获取第一作者的姓名和学院
			$author1DetailInfo = $userDetailModel
									-> where('student_id='.$compDetailItem['author1_id'])
									-> field('name,academy')  
									-> find();
						
			//$returnToFront为返回到前台的二维数组变量
			$returnItemInfo['comp_name'] = $compinfo['comp_name'];
			$returnItemInfo['comp_prize'] = $eachCompItem['comp_prize'];
			$returnItemInfo['comp_item_name'] = $compDetailItem['comp_item_name'];
			$returnItemInfo['comp_date'] = substr($eachCompItem['apply_date'],0,4).'年';
			$returnItemInfo['comp_author1'] = $author1DetailInfo['name'];
			$returnItemInfo['apply_department'] = $author1DetailInfo['academy'];
			
			$returnToFront['rows'][$i] = $returnItemInfo;
			
			$i++;
		}
		$this->ajaxReturn(json_encode($returnToFront),'EVAL');
  	}
}
