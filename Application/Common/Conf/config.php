<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE'=>'mysql',// 数据库类型
	'DB_HOST'=>'127.0.0.1',// 服务器地址
	'DB_NAME'=>'ecnu_mind',// 数据库名
	'DB_USER'=>'ecnu_mind_admin',// 用户名
	'DB_PWD'=>'hello world',// 密码
	'DB_PORT'=>3306,// 端口
	'DB_CHARSET'=>'utf8',// 数据库字符集	
	'VAR_FILTERS'=>'stripslashes,strip_tags,trim',
	'URL_ROUTER_ON'   => true,
	'URL_ROUTE_RULES'=>array(
		'/^user$/' => 'Custom/home/home',
		'/^guide$/'=> 'Custom/Guide/guide',
		'/^admin$/'=> 'Admin/home/home',
	),
);