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
  		// 如果不存在（或超时--10分钟）该管理员权限能查看范围内的、且已结束竞赛的信息缓存，则重新从数据库载入。
  		if (!S("finish_comps_".session('access_id'))) {
	  		// 根据access_id获取该管理员所属院系，或学校层面管理员。
	  		$accessName = M('academy')->find(session('access_id'))['name'];
	  		$condition['comp_state'] = '已结束';
	  		if ($accessName !== "华东师范大学")
	  			$condition['owner_academy'] = $accessName;
	  		
	  		// 根据条件获取返回前台的信息。
	  		$returnToFront = $this->getCompsByCondition($condition);
	  		
	  		// 5分钟更新一次缓存
	  		S("finish_comps_".session('access_id'), json_encode($returnToFront), array('type'=>'file','expire'=>300));
  		}
  		
  		$this->ajaxReturn(S("finish_comps_".session('access_id')),'EVAL');
  	}
}
