<?php
namespace Home\Model;
use Think\Model\RelationModel;
class TiaozhanModel extends RelationModel{
	
	// 定义关联模型
	protected $_link = array(
			'competition_main'  =>  array(
					'mapping_type' => self::BELONGS_TO,
					'class_name'    => 'competition_main',
					'foreign_key'   => 'comp_item_id',
			),
			'tiaozhan_teacher'  =>  array(
					'关联属性1' => '定义',
					'关联属性N' => '定义',
			),
			'tiaozhan_teacher'  =>  array(
					'关联属性1' => '定义',
					'关联属性N' => '定义',
			),
			'关联3'  =>  HAS_ONE, // 快捷定义
	);
}