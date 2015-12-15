<?php
function checkAllNull($arr) {
	if ($arr == null) return null;
	
	$returnArr = array(array());
	foreach ($arr as $key1=>$arr2) {
		foreach ($arr2 as $key2=>$val) {
			if ($val == '') {
				$returnArr[$key1][$key2] = "无";
			} else {
				$returnArr[$key1][$key2] = $val;
			}
		}
	}
	
	return $returnArr;
}