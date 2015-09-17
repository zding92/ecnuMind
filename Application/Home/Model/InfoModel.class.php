<?php
	namespace Home\Model;
	use Think\Model;
	class InfoModel extends Model {
		protected $trueTableName = 'user_info';
		protected $fields = array('id', 'username', 'password', 'nickname'); 
		protected $_auto = array(
			array('password', 'md5', 3, 'function'),
		);
		protected $_validate = array(
			array('username','','账号已存在',0,'unique',1),
		);
	}
?>
