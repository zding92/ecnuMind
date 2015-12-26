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
		$userModel = M('ecnu_mind.user_custom');
		
		
		// $allCompItem为competition_main 表格中的所有行，
		// 取"comp_item_id,comp_item_name,author1_name,owner_academy,comp_type_id,apply_date,comp_state,comp_prize"列的二维数组
		$allCompItem = $compItemModel->where($condition)->select();
		
		//返回二维数组的行数
		$i = 0;		
		
		//遍历$allHistoryItem的每一行，每一行成为一个一维数组$eachHistoryItem
		foreach ($allCompItem as $eachCompItem) {
			
			
			
			// 获得该项竞赛的基本信息,在competition_info表中，找到对应的comp_type_id的行，取出其conp_name和comp_template
			$compinfo =	$compInfoModel
						->where('comp_id='.$eachCompItem['comp_type_id'])
						->field("comp_name")
						->find();
			
			
 			//第一作者学号
 			$firstAuthorNum = explode(",",$eachCompItem['comp_participant_id'])[0];
 			//获取第一作者的手机
 			$firstAuthorPhone = $userModel->where('student_id='.$firstAuthorNum)->find()["phone"];	
 			$returnItemInfo['comp_authorphone'] = $firstAuthorPhone;
 			
 			//获取附件文件
 			$applyFile = $this->getFileNameFromDir("./Public/CompItemApply/".$eachCompItem["comp_item_id"]."/");
			$finalFile = $this->getFileNameFromDir("./Public/CompItemFinal/".$eachCompItem["comp_item_id"]."/");
			//判断是否存在报名表
 			if(($applyFile==null)||($applyFile=="..")){
 				$returnItemInfo['apply_state'] = "X";
 			}else{
 				$returnItemInfo['apply_state'] = "√";
 			}
 			//判断是否存在作品
 			if(($finalFile==null)||($finalFile=="..")){
 				$returnItemInfo['final_state'] = "X";
 			}else{
 				$returnItemInfo['final_state'] = "√";
 			}

						
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
  	public function getFileNameFromDir($dir){
  		$fileNames = "";
  		$fileNamesCnt = 0;
  		$dir = iconv("UTF-8","gb2312",$dir);
  		//如果dir是文件夹
  		if (is_dir($dir))
  		{
  			if ($dh = opendir($dir))
  			{
  				while (($file = readdir($dh)) !== false)
  				{
  					//echo "filename: $file : filetype: " . filetype($dir . $file) . "\n";
  					$fileNames = $file;
  					$fileNames=iconv("gb2312","UTF-8",$fileNames);
  				}
  				closedir($dh);
  			}
  		}
  		return $fileNames;
  	}
}


