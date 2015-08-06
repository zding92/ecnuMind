<?php
namespace Home\Common\MyFunc;
class CheckForm {
	
	private $action, $value, $queryResult;
    private  $repeat, $illegal;
	public $illegalInfo;
	/**
	 * 验证当前单个输入。
	 */
	public function checkOne($action, $value) {
		
		$this->action = $action;
		$this->value = $value;
		
		$model = M('info');
		if($this->action=='nickname' || $this->action=='ID'||
				$this->action=='Email' || $this->action=='phone') {
			// sql查询： SELECT actionName from user_info where actionName = actionValue;		
			$this->queryResult = $model->field($this->action)->where($this->action."='".$this->value."'")->find();	
		}
		
		switch($this->action)
		{
			case 'nickname':
				$this->CheckNickFromDB();
				break;
			case 'name':
				$this->CheckNameFromDB();
				break;
			case 'ID':
				$this->CheckIDFromDB();
				break;
			case 'Email':
				$this->CheckEmailFromDB();
				break;
			case 'address':
				$this->CheckAddressFromDB();
				break;
			case 'phone':
				$this->CheckPhoneFromDB();
				break;
			case 'combobox':
				$this->CheckCombobox();
				break;
			case 'brief':
				$this->CheckBriefFromDB();
				break;
			default:break;
		}
	}
	
	/**
	 * 验证多个输入
	 */
	public function checkAll($allData) {
		
	}
	
	private function CheckNickFromDB(){
		if($this->queryResult != "")
		{
			$this->repeat = true;
			$this->repeat = true;
		} else{
			if(preg_match('/[ .,]+?/',$this->value))
			{
				
				$this->illegal = true;
			}else{
	
				$this->illegal = false;
			}
			$this->repeat = false;
		}
	}
	
	private function CheckNameFromDB(){
		if(!preg_match("/^[\x{4e00}-\x{9fa5}]{2,4}$/u",$this->value))
		{
			$this->illegal = true;
		}else{
			$this->illegal = false;
		}
	}
	
	private function CheckIDFromDB(){
		if($this->queryResult != "")
		{
			$this->repeat = true;
		} else{
			if(!preg_match('/^101[0-9]{8}?/',$this->value))
			{
				$this->illegal = true;
			}else{
				$this->illegal = false;
			}
			$this->repeat = false;
		}
	}
	
	private function CheckEmailFromDB(){
		if($this->queryResult != "")
		{
			$this->repeat = true;
		} else{
			if(!preg_match('/^.+@[0-9a-zA-Z]+\.[a-zA-Z\.]+$/',$this->value))
			{
				$this->illegal = true;
			}else{
				$this->illegal = false;
			}
			$this->repeat = false;
		}
	}
	
	private function CheckAddressFromDB(){
		if(strlen($this->value)>30)
		{
			$this->illegal = true;
		}else{
			$this->illegal = false;
		}
	}
	
	private function CheckPhoneFromDB(){
		global $value,$row;
		if($this->queryResult != "")
		{
			$this->repeat = true;
		} else{
			if(!preg_match('/^1[0-9]{10}$/',$this->value))
			{
				$this->illegal = true;
			}else{
				$this->illegal = false;
			}
			$this->repeat = false;
		}
	}
	
	private function CheckCombobox()
	{
		// 拆分value为三个值。
		$token=strtok($this->value,"|");
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
		else 	$this->illegal = false;
	}
	
	private function CheckBriefFromDB(){
		if(!preg_match('/^.{0,300}$/',$this->value))
		{
			$this->illegal = true;
		}
		else $this->illegal = false;
	}
	
	// 临时获取，以后应当从配置文件或者数据库中获取
	private function getJson() {
		require 'ComboxData.php';
		$json_obj = json_decode($json_string,TRUE);
		if(!is_array($json_obj)) return false;
		return $json_obj;
	}
	
	public function isRepeat() {
		return $this->repeat;
	}
	
	public function isIllegal() {
		return $this->illegal;
	}
}
?>