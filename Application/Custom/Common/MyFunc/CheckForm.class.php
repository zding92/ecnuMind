<?php
namespace Custom\Common\MyFunc;
class CheckForm {
	
	private $queryResult;
    private $repeat, $illegal;
	public $illegalInfo;
	/**
	 * 验证当前单个输入。
	 */
	public function checkOne($action, $value) {
				
		$model = M('ecnu_mind.user_custom');
		if($action=='student_id'||
				$action=='Email' || $action=='phone') {
			// sql查询： SELECT actionName from user_custom where actionName = actionValue;		
			$this->queryResult = $model->field($action)->where($action."='".$value."'")->find();	
		}
		switch($action)
		{
			case 'name':
				$this->CheckNameFromDB($value);
				break;
			case 'student_id':
				$this->CheckStuIDFromDB($value);
				break;
			case 'Email':
				$this->CheckEmailFromDB($value);
				break;
			case 'address':
				$this->CheckAddressFromDB($value);
				break;
			case 'phone':
				$this->CheckPhoneFromDB($value);
				break;
			case 'academy':
				$this->CheckAcademy($value);
				break;
			case 'department':
				$this->CheckDepartment($value);
				break;
			case 'major':
				$this->CheckCombobox($value);
				break;
			case 'combobox':
				$this->CheckCombobox($value);
				break;
			case 'brief':
				$this->CheckBriefFromDB($value);
				break;
			default:break;
		}
	}
	
	/**
	 * 验证多个输入
	 */
	public function checkAll($allData) {
		// 验证各个变量是否合法，如果存在任何的不合法，
		// 返回false，若全部合法返回true.
		$this->CheckNameFromDB($allData['name']);
		if ($this->isIllegal() || $this->isRepeat()) return false;
		
		$this->CheckEmailFromDB($allData['email']);
		if ($this->isIllegal() || $this->isRepeat()) return false;
		
		$this->CheckAddressFromDB($allData['address']);
		if ($this->isIllegal() || $this->isRepeat()) return false;
		
		$this->CheckPhoneFromDB($allData['phone']);
		if ($this->isIllegal() || $this->isRepeat()) return false;
		
		$this->CheckBriefFromDB($allData['brief']);
		if ($this->isIllegal() || $this->isRepeat()) return false;
		
		$this->CheckAcademy($allData['academy']);
		if ($this->isIllegal() || $this->isRepeat()) return 'academy';
		
		// 全部验证通过，返回true.
		return true;
	}

	private function CheckNameFromDB($value){
		if(!preg_match("/^(?:[\x{4e00}-\x{9fa5}]|[a-zA-Z]){2,20}$/u",$value))
		{
			$this->illegal = true;
		}else{
			$this->illegal = false;
		}
	}
	
	private function CheckStuIDFromDB($value) {
		if($this->queryResult != "")
		{
			$this->repeat = true;
		} else{
			if(!preg_match('/^101[0-9]{8}?/',$value))
			{
				$this->illegal = true;
			}else{
				$this->illegal = false;
			}
			$this->repeat = false;
		}
	}
	
	private function CheckEmailFromDB($value) {
		if($this->queryResult != "")
		{
			$this->repeat = true;
		} else{
			if(!preg_match('/^.+@[0-9a-zA-Z]+\.[a-zA-Z\.]+$/',$value))
			{
				$this->illegal = true;
			}else{
				$this->illegal = false;
			}
			$this->repeat = false;
		}
	}
	
	private function CheckAddressFromDB($value) {
		if(strlen($value)>200)
		{
			$this->illegal = true;
		}else{
			$this->illegal = false;
		}
	}
	
	private function CheckPhoneFromDB($value) {
		if($this->queryResult != "")
		{
			$this->repeat = true;
		} else{
			if(!preg_match('/^[0-9]{1,20}$/',$value))
			{
				$this->illegal = true;
			}else{
				$this->illegal = false;
			}
			$this->repeat = false;
		}
	}
	
	private function CheckAcademy($value) {
		$academyArr = $this->getJson();
		$key = array_search($value, $academyArr);
		if($key == null) {
			$this->illegal = true;
			$this->illegalInfo = 'academy';
		} else $this->illegal = false;
	}
	
	private function CheckDepartment($value) {
		$json_obj = $this->getJson();
		$token=strtok($value,"|");
		$academy=$token;
		$token=strtok("|");
		$department=$token;
		
		if($json_obj[$academy]=="") {
			$this->illegal = true;
			$this->illegalInfo = 'academy';
		}
		elseif($json_obj[$academy][$department]=="") {
			$this->illegal = true;
			$this->illegalInfo = 'department';
		} else $this->illegal = false;
	}
	
	private function CheckCombobox($value) {
		// 拆分value为三个值。
		$token=strtok($value,"|");
		$academy=$token;
		$token=strtok("|");
		$department=$token;
		$token=strtok("|");
		$major=$token;
		
		// 载入json数据(暂时，以后应存为服务器缓存，不能每一次都载入)
		$json_obj = $this->getJson();
		
		
		// 判断是否存在
		if($json_obj[$academy]=="") {
			$this->illegal = true;
			$this->illegalInfo = 'academy';
		}
		elseif($json_obj[$academy][$department]=="") {
			$this->illegal = true;
			$this->illegalInfo = 'department';
		}
		elseif($json_obj[$academy][$department][$major]=="") {
			$this->illegal = true;
			$this->illegalInfo = 'major';
		}
		else $this->illegal = false;
	}
	
	private function CheckBriefFromDB($value) {
		if(!preg_match('/^.{0,400}$/',$value))
		{
			$this->illegal = true;
		}
		else $this->illegal = false;
	}
	
	// 临时获取，以后应当从配置文件或者数据库中获取
	private function getJson() {
		$value = S("allAcademy");
		if($value == false) {
			$this->comparison();
			$value = S("allAcademy");
		}
		return $value;
	}
		
	private function comparison(){
		$aForm = M('ecnu_mind.academy');
		
		$table = $aForm->select();
		for($i=0;$i<=count($table);$i++){
			$academy_name = $table[$i]['name'];
			$arr[] = $academy_name;
		}
		
		S("allAcademy",$arr, array('type'=>'file','expire'=>3600));
	}
	
	public function isRepeat() {
		return $this->repeat;
	}
	
	public function isIllegal() {
		return $this->illegal;
	}
}
?>