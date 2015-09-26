<?php
namespace Custom\Controller;
use Custom\Common\Controller\CommonController;
class CompController extends CommonController {
	public function Comp(){
		//显示__app__/home/comp/comp页面
		$this->display();
	}
	
	public function myComp(){
		//显示__app__/home/comp/myComp页面
		$this->display();
	}
	
	public function checkValidUser($student_id) {
		$userModel = M('ecnu_mind.user_custom');
		$user = $userModel->where("student_id=$student_id")->field('id,$student_id,username,brief,password',true)->find();
		if (isset($user)) {
			$this->ajaxReturn(json_encode($user),'EVAL');
		}
		else{
		$this->ajaxReturn('0','EVAL');}
	}
	
	public function getCompInfo() {
		$compModel = M('ecnu_mind.competition_info', null);
		$allComp = $compModel->select();
			
		$allComp = $this->assignTemplate($allComp);
		$allComp = $this->checkDate($allComp);	
		$this->ajaxReturn(json_encode($allComp), "EVAL");
	}
	
	/**
	 * 获取个人竞赛信息（不包含具体内容，仅返回竞赛名称等最基本信息）
	 */
	public function getCompItem() {
		$compItemModel = M('ecnu_mind.competition_main', null);
		$compInfoModel = M('ecnu_mind.competition_info', null);
		
		// 设置查询条件
		$map['comp_participant_id'] = array('like', '%'.session('user_studentid').'%') ;
		
		$userCompIds = $compItemModel
		               ->where($map)
					   ->field('comp_type_id, comp_item_id')
		               ->select();
		
		foreach ($userCompIds as $compId) {
			// 获得该项竞赛的基本信息
			$compinfo =	$compInfoModel
						->where('comp_id='.$compId['comp_type_id'])
						->field("comp_name, comp_template")
						->find();
			
			// 根据模板名称和竞赛报名ID获得详细信息
			$compDetailModel = M('ecnu_mind.'.$compinfo['comp_template'].'_info',null);
			$returnItem = $compDetailModel
			              ->where("comp_item_id=".$compId['comp_item_id'])
			              ->field("comp_item_name, apply_date")
			              ->find();
			$returnItem['comp_name'] = $compinfo['comp_name'];
			
			// 装配template的url
			$compTmp = $compinfo['comp_template'];			
			$returnItem['comp_template'] = 
				U("Custom/$compTmp/$compTmp"."_modify","compItemId=".$compId['comp_item_id'],"");
			
			$returnItem['comp_view'] = 
				U("Custom/$compTmp/$compTmp"."_origin","compItemId=".$compId['comp_item_id'],"");
			
			$returnItem['comp_remove'] =
			U("Custom/$compTmp/$compTmp"."Remove","compItemId=".$compId['comp_item_id'],"");
			
			$returnItem['comp_item_id'] = $compId['comp_item_id'];
			
			$result[] = $returnItem; 
		}
		
		$this->ajaxReturn(json_encode($result), "EVAL");
		
	}
	
	protected function registerComp($participant) {
		$compItemModel = M('ecnu_mind.competition_main', null);
		$regValue = I('post.');
		$participantStr = implode(',', $participant);
		foreach ($participant as $key => $val) {
			$participant[$key] = '%'.$val.'%';
		}
		
		// 构造竞赛报名主表所需要的两个外键
		$compItemInfo['comp_type_id'] = $regValue['comp_id'];
		// 构造模糊插叙条件
		$compItemInfo['comp_participant_id'] = array('like', $participant, 'OR');
		
		// 检查该用户是否已经注册过该竞赛
		// Ps.通过主表检测，子表中应该检查所有的参与者是否参加该项竞赛，如果有应该不允许重复注册。
		$checkResult = $compItemModel->where($compItemInfo)->select();
		
		if (!isset($checkResult)) $this->ajaxReturn("您已报名过该项竞赛，请勿重复提交","EVAL");
		
		// 将用户学号数组转化为字符串存入
		$compItemInfo['comp_participant_id'] = $participantStr;
		
		// 获取全站唯一的用户个人报名ID
		$compId = $compItemModel->data($compItemInfo)->filter('strip_tags')->add();
		
		// 返回给单项竞赛报名页面后台这个唯一的ID
		return $compId;
	}

	
	private function assignTemplate($allComp) {
		foreach ($allComp as $comp) {
			
			$compId = $comp['comp_id'];
			
			// 用完以后删除该项，防止传到前台。
			unset($comp['comp_id']);
			
			$compTmp = $comp['comp_template'];
			$comp['comp_template'] = '<a href="'.U("Custom/$compTmp/$compTmp","compId=$compId","").'" target="_blank">点此报名</a>';
			
			$result[] = $comp;
		}
		return $result;
	}
	
	private function checkDate($allComp) {
		$today = date('Y-m-d', time());
		$today = strtotime($today);
		$result = array();
		
		foreach ($allComp as $comp) {
			$compStartDay = strtotime($comp['comp_apply_start_date']);
			$compEndDay = strtotime($comp['comp_apply_end_date']);
			
			if ($today < $compStartDay) {
				$comp['apply_state'] = '未开始';
				$comp['comp_template'] = "<a style='color:#aaa;margin:0px auto;'>报名未开始</a>";
				
			} elseif ($today > $compStartDay && $today < $compEndDay) {
				$comp['apply_state'] = '正在报名';
				
			} else {
				$comp['apply_state'] = '报名结束';
				$comp['comp_template'] = "<a style='color:#aaa;margin:0px auto;'>报名已经结束</a>";
			}
			
			$comp['apply_date'] = $comp['comp_apply_start_date'].' ~ '.$comp['comp_apply_end_date'];
			$result[] = $comp;
		}
		return $result;
	}
	
	protected function deleteComp($compItemId) {
		$compModel = M('ecnu_mind.competition_main');
		$compModel->delete($compItemId);
	}
	
	protected function updateCompParticipant($participant) {
		$compItemModel = M('ecnu_mind.competition_main', null);
		$compItemModel->create();
		$compItemModel->comp_participant_id = implode(',', $participant);
		$compItemModel->filter('strip_tags')->save();
	}
}