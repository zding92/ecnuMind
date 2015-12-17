<?php
function checkCharNull($id) {
	if ($id == '') {
		return null;
	} else {
		return $id;
	}
}

function checkIntNull($id) {
	if ($id == '') {
		return null;
	} else {
		return $id;
	}
}

// 验证年龄
function checkRange($age) {
	if ($age < 20 || $age > 99) {
		return false;
	} else return true;
}

// 验证名字合法性
function checkName($name) {
	$length = strlen($name);
	if ($length > 20) return false;
	if (!isChineseOrEnglish($name)) return false;
	return true;
}

// 验证电话格式
function checkPhone($phone) {
	$length = strlen($phone);
	if ($length > 20) return false;
	if (!isNumOrConnectchar($phone)) return false;
	return true;
}

function checkGender($gender) {
	if (preg_match('/^(男|女){1}$/', $gender)) return true;
	return false;
}

function checkStudentId($studentId) {
	if (preg_match('/^[0-9]{11}$/', $studentId)) return true;
	return false;
}


function isChineseOrEnglish($value) {
	if (preg_match('/^(?:[\x{4e00}-\x{9fa5}]|[a-zA-Z])+$/u',$value)) return true;
	else return false;
}

function isNumOrConnectchar($value) {
	if (preg_match('/^(?:[0-9\-])+$/',$value)) return true;
	else return false;
}

function checkPwd($pwd) {
	if (preg_match('/^([a-zA-Z0-9._*]){6,20}$/',$pwd)) return true;
	return false;
}

function checkGrade($grade) {
	if (preg_match('/^(大一|大二|大三|大四|研一|研二|研三|博士){1}$/', $grade)) return true;
	return false;
}

function mbstringToArray($str,$charset) {
	$strlen=mb_strlen($str);
	while($strlen){
		$array[]=mb_substr($str,0,1,$charset);
		$str=mb_substr($str,1,$strlen,$charset);
		$strlen=mb_strlen($str);
	}
	return $array;
}

function str_split_utf8($str){
	$split=1;
	$array=array();
	for($i=0;$i<strlen($str);) {
		$value=ord($str[$i]);
		if($value>127){
			if($value>=192&&$value<=223) $split=2;
			elseif($value>=224 && $value<=239) $split=3;
			elseif($value>=240 && $value<=247) $split=4;
		}else{
			$split=1;
		}
		$key=NULL;
		for($j=0;$j<$split;$j++,$i++){
			$key.=$str[$i];
		}
		array_push($array,$key);
	}
	return $array;
}

/**
 * 为数组形式的字符加上单引号
 */
function sqlPreHandle($strArray) {
	foreach ($strArray as $key=>$val) {
		$strArray[$key] = "'$val'";
	}
	return $strArray;
}


