<?php
	namespace Home\Model;
	use Think\Model;
	class InfoModel extends Model {
		protected $trueTableName = 'user_info';
	
		protected $_auto = array(
				array('password', 'md5', 3, 'function'),
		);
		
		protected $_validate = array(
				array('username','','username_exist',0,'unique',1),
				array('name','checkName','name_error',2,'function'),
				array('email','email','email_error',2),
				array('phone','checkPhone','phone_error',2,'function'),
				array('gender','checkGender','gender_error',2,'function'),
				array('studentid','','studentid_exist',2,'unique'),
				array('studentid','checkStudentId','studentid_error',2,'function'),
		);
	}
?>
