<?php
namespace Custom\Model;
use Think\Model\RelationModel;
class TiaozhanInfoModel extends RelationModel{
	protected $trueTableName = 'tiaozhan_info';
	
	// 自动校验author2~6的id是否为空，如果为空，赋值为'null'
	// 另外自动添加报名日期
	protected $_auto = array(
			array('author2_id','checkCharNull',3,'function'),
			array('author3_id','checkCharNull',3,'function'),
			array('author4_id','checkCharNull',3,'function'),
			array('author5_id','checkCharNull',3,'function'),
			array('author6_id','checkCharNull',3,'function'),
			array('teacher_age','checkIntNull',3,'function'),
			array('referee_age','checkIntNull',3,'function'),
	);
	
	protected $_validate = array(
			array('teacher_age','number','t_not_num',2), //老师年龄为数字
			array('teacher_age','checkRange','t_not_range',2,'function'), //老师年龄在20~99岁之间
			array('referee_age','number','r_not_num',2), //推荐人年龄为数字
			array('referee_age','checkRange','r_not_range',2,'function'), //推荐人年龄在20~99岁之间
	);
}