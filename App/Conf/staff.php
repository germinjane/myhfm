<?php
//员工信息管理功能配置参数

return array(
	//员工信息
	'STAFF_EXCEL_FORMAT' =>array(
		'A'	=>	'所属团队',
		'B'	=>	'姓名',
		'C'	=>	'性别',
		'D'	=>	'身份证号码',
		'E'	=>	'联系方式',
		'F'	=>	'入职时间',
		'G'	=>	'在岗/离职',
		'H'	=>	'离职时间',
		'I'	=>	'备注'
	),
	'PREG_MATCH_REGULAR' =>array(
		'DATE'	=>	'/^([0-9]{4})(-|\/)([0-9]{1,2})(-|\/)([0-9]{1,2})$/',
		'PHONE'	=>	'/^[0-9]{11}$/',
		'ID_CARD'=>	'/^[0-9]{17}[0-9X]{1}$/',

	)

);