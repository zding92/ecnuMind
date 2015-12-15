<?php
namespace Home\Model;
use Think\Model;
class UserbaseModel extends Model {
	protected $trueTableName = 'user_base';
	
	protected $_validate = array(
			array('username','','username_exist',0,'unique',1),
			array("username","checkUsername",'username_error',0,'function'),
			array('password',"repassword",'repassword_error',0,'confirm'),
			array("password","checkPwd",'password_error',0,'function'),
	);
	
	protected $_auto = array(
			array('password', 'md5', 3, 'function'),
			array('register_date','date',1,'function',array('Y-m-d')),
	);
}
?>
