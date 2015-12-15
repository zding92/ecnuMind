<?php
function checkPwd($pwd) {
	if (preg_match('/^.{6,20}$/',$pwd)) return true;
	return false;
}

function checkUsername($username) {
	if (preg_match('/^([a-zA-Z0-9]){4,20}$/',$username)) return true;
	return false;
}
