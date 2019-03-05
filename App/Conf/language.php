<?php
//项目配置文件
return array(
	
	//员工信息
	'POSITION' =>array(
		'0' =>array('key'=>0, 'value'=>'职位...'),
		'1' =>array('key'=>'店长', 'value'=>'店长'),
		'2' =>array('key'=>'主管', 'value'=>'主管'),
		'3' =>array('key'=>'店员', 'value'=>'店员'),
	),
	
	//支付类型
	'PAY_TYPE' =>array(
		'0' =>array('key'=>0, 'value'=>'支付类型...'),
		'1' =>array('key'=>1, 'value'=>'到付'),
		'2' =>array('key'=>2, 'value'=>'部分付款'),
		'3' =>array('key'=>3, 'value'=>'全额支付'),
	),
	
	//订单状态
	'ORDER_STATUS' =>array(
		'0' =>array('key'=>0, 'value'=>'订单状态...'),
		'1' =>array('key'=>1, 'value'=>'创建订单'),
		'2' =>array('key'=>2, 'value'=>'提交订单'),
		'3' =>array('key'=>3, 'value'=>'汇款记账'),
		'4' =>array('key'=>4, 'value'=>'退回订单'),
		'5' =>array('key'=>5, 'value'=>'批准订单'),
		'6' =>array('key'=>6, 'value'=>'发货'),
		'7' =>array('key'=>7, 'value'=>'退货'),
		'8' =>array('key'=>8, 'value'=>'退款'),
		'9' =>array('key'=>9, 'value'=>'确认收货'),
		'10' =>array('key'=>10, 'value'=>'收到退货'),
		'11' =>array('key'=>11, 'value'=>'到付记账'),
		'12' =>array('key'=>12, 'value'=>'撤回'),
		'20' =>array('key'=>20, 'value'=>'快递丢失'),
	),
	
	//操作类型
	'OPERATOR_TYPE' =>array(
		'1' =>array('key'=>1, 'value'=>'销售备注'),
		'2' =>array('key'=>2, 'value'=>'跟单备注'),
		'3' =>array('key'=>3, 'value'=>'财务备注'),
		'4' =>array('key'=>4, 'value'=>'仓库备注'),
		'5' =>array('key'=>5, 'value'=>'售后备注'),
	),
	
	//时间类型
	'DATE_TYPE' =>array(
		'2' =>array('key'=>'submit_date', 'value'=>'提交时间'),
		'6' =>array('key'=>'deliver_date', 'value'=>'发货时间'),
		'9' =>array('key'=>'sign_date', 'value'=>'收货时间'),
	),
	
);


