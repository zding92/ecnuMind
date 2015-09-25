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

// 验证名字长度
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
