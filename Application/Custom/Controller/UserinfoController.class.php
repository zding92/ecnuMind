<?php
namespace Custom\Controller;
use Custom\Common\Controller\CommonController;

class UserinfoController extends CommonController {
	
	/**
	 * 载入mysql中的数据。并以json返回给前台。
	 */
	protected function getBaseinfo($field, $except=FALSE) {
		// 初始化M对象（相较于D对象效率高，此处仅用于基本查询）。
		$model = M('user_custom');
	
		// except决定是排除查询还是选择查询。如果是排除查询是查询除了指定field外的所有域。
		$model->field($field, $except)->find(session('user_id'));
		
		// 构造json，并返回数据
		return $model->data();
	}
	
	protected function getSchoolJson() {
		$value = S('comparison_table');
		if($value == false) {
			$this->comparison();
			$value = S('comparison_table');
		}
		$json_obj = json_decode($value,TRUE);
		if(!is_array($json_obj)) return false;
		return $json_obj;
	}
	
	private function comparison(){
		$major = M('ecnu_mind.major');
		$department = M('ecnu_mind.department');
		$academy = M('ecnu_mind.academy');
		$majors = $major->select();
		for($major_id = 0; $major_id < count($majors); $major_id++){
			
			$majorData = $major->where("major_id='".$majors[$major_id]['major_id']."'")->field('department_id, name')->find();

			$departmentData = $department->where("department_id='".$majorData["department_id"]."'")->field('academy_id, name')->find();

			$academy_name = $academy->where("academy_id='".$departmentData["academy_id"]."'")->field('name')->find()['name'];
			$arr[$academy_name][$departmentData['name']][$majorData['name']] = $majorData['name'];
		}
		$comparison_table =json_encode($arr);
		S('comparison_table',$comparison_table);
	}

}