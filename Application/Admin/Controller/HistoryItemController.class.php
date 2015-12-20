<?php
namespace Admin\Controller;
use Think\Controller;

class HistoryItemController extends CompsinfoController {
    public function Historyitem(){
    	$this->returnAdminAccess();
    	$this->display();
  	}
  	
  	/**
  	 * 分页获取历史记录信息
  	 */
  	public function showAllHistoryItem(){
  		// 如果不存在（或超时--60分钟）该管理员权限能查看范围内的、且已结束竞赛的信息缓存，则重新从数据库载入。
  		if (!S("finish_comps_".session('access_id'))) {
	  		// 根据access_id获取该管理员所属院系，或学校层面管理员。
	  		$condition['comp_state'] = '已结束';
	  		
	  		// 权限设置
	  		if (session('access_id') != 0) {
			    $academyName = M('ecnu_mind.academy')->find(session('access_id'))['name'];
			    $condition['_string'] = "comp_owner = '".session('access_id')."' OR (comp_owner = '0' AND apply_academy = '".$academyName."')";
		    }
	  		
	  		// 根据条件获取返回前台的信息。
	  		$returnToFront = $this->getCompsByCondition($condition);
	  		
	  		// 5分钟更新一次缓存
	  		S("finish_comps_".session('access_id'), json_encode($returnToFront), array('type'=>'file','expire'=>3600));
  		}
  		
  		$this->ajaxReturn(S("finish_comps_".session('access_id')),'EVAL');
  	}
}
