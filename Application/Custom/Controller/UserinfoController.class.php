<?php
namespace Custom\Controller;
use Custom\Common\Controller\CommonController;

class UserinfoController extends CommonController {
		protected function getJson() {
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