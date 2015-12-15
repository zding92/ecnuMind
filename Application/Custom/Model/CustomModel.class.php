<?php
namespace Custom\Model;
use Think\Model;
class CustomModel extends Model {
	protected $trueTableName = 'user_custom';
	
	protected $_validate = array(
			array('name','checkName','name_error',2,'function'),
			array('email','','email_exist',2,'unique'),
			array('email','email','email_error',2),
			array('phone','','phone_exist',2,'unique'),
			array('phone','checkPhone','phone_error',2,'function'),
			array('gender','checkGender','gender_error',2,'function'),
			array('student_id','','student_id_exist',2,'unique'),
			array('student_id','checkStudentId','student_id_error',2,'function'),
	);
}
?>
