<?php
/**
 * 公共函数集合
 *
 * @author zhudaijin
 * @date 2015-01-28
 */

/**
 * 获取分页信息
 *
 * @param int $count 总数
 * @param int $size 每页数
 * @param string $url url
 * @author zhudaijin 2015-01-28
 */
function get_page_info($count,$size,$url,$type){
	if($count<=$size) return array('limit'=>'','show_page'=>'');
	import('Class.Page',APP_PATH); //引入自定义分页类
	$page = new Page($count,$size,$url,$type);
	return array('limit'=>$page->limit,'show_page'=>$page->fpage(array(4,5,6)));	
}

/**
 * 导出excel
*/
function exportExcel($data, $savefile = null, $title = null, $sheetname = 'sheet1') {
	import("ORG.Util.PHPExcel");
	//若没有指定文件名则为当前时间戳
	if (is_null($savefile)) {
		$savefile = time();
	}
	//若指字了excel表头，则把表单追加到正文内容前面去
	if (is_array($title)) {
		array_unshift($data, $title);
	}
	$objPHPExcel = new \PHPExcel();
	//Excel内容
	$head_num = count($data);

	foreach ($data as $k => $v) {
		$obj = $objPHPExcel->setActiveSheetIndex(0);
		$row = $k + 1; //行
		$nn = 0;

		foreach ($v as $vv) {
			$col = chr(65 + $nn); //列
			$obj->setCellValue($col . $row, $vv); //列,行,值
			$nn++;
		}
	}
	/*//设置列头标题
	for ($i = 0; $i < $head_num - 1; $i++) {
		$alpha = chr(65 + $i);
		$objPHPExcel->getActiveSheet()->getColumnDimension($alpha)->setAutoSize(true); //单元宽度自适应
		$objPHPExcel->getActiveSheet()->getStyle($alpha . '1')->getFont()->setName("Candara");  //设置字体
		$objPHPExcel->getActiveSheet()->getStyle($alpha . '1')->getFont()->setSize(12);  //设置大小
		$objPHPExcel->getActiveSheet()->getStyle($alpha . '1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK); //设置颜色
		$objPHPExcel->getActiveSheet()->getStyle($alpha . '1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); //水平居中
		$objPHPExcel->getActiveSheet()->getStyle($alpha . '1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER); //垂直居中
		$objPHPExcel->getActiveSheet()->getStyle($alpha . '1')->getFont()->setBold(true); //加粗
	}*/

	$objPHPExcel->getActiveSheet()->setTitle($sheetname); //题目
	$objPHPExcel->setActiveSheetIndex(0); //设置当前的sheet
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="' . $savefile . '.xls"'); //文件名称
	header('Cache-Control: max-age=0');
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); //Excel5 Excel2007
	$objWriter->save('php://output');
}

/*
	 * curl post 模拟提交数据函数
	 */
function vpost($url,$data)
{
    $curl = curl_init(); // 启动一个CURL会话
    curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); // 从证书中检查SSL加密算法是否存在
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
    curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包
    curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
    curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
    $tmpInfo = curl_exec($curl); // 执行操作
    if (curl_errno($curl)) {
        echo 'Errno：'.curl_error($curl);//捕抓异常
    }
    curl_close($curl); // 关闭CURL会话
    return $tmpInfo; // 返回数据
}

/*
 * curl get 模拟提交数据函数
 */

function get_res($url){
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    $res = curl_exec($ch);
    curl_close($ch);
    return $res;
}

// 以POST方式提交数据
function post_data($url, $param, $is_file = false, $return_array = true) {
    if (! $is_file && is_array ( $param )) {
        $param = JSON ( $param );
    }
    if ($is_file) {
        $header [] = "content-type: multipart/form-data; charset=UTF-8";
    } else {
        $header [] = "content-type: application/json; charset=UTF-8";
    }
    
    $ch = curl_init ();
    curl_setopt ( $ch, CURLOPT_URL, $url );
    curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, "POST" );
    curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );
    curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, FALSE );
    curl_setopt ( $ch, CURLOPT_HTTPHEADER, $header );
    curl_setopt ( $ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)' );
    curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, 1 );
    curl_setopt ( $ch, CURLOPT_AUTOREFERER, 1 );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, $param );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
    $res = curl_exec ( $ch );
    
    $flat = curl_errno ( $ch );
    if ($flat) {
        $data = curl_error ( $ch );
        addWeixinLog ( $flat, 'post_data flat' );
        addWeixinLog ( $data, 'post_data msg' );
    }
    
    curl_close ( $ch );
    
    $return_array && $res = json_decode ( $res, true );
    
    return $res;
}

/**
 * ************************************************************
 *
 * 将数组转换为JSON字符串（兼容中文）
 *
 * @param array $array
 *        	要转换的数组
 * @return string 转换得到的json字符串
 * @access public
 *        
 *         ***********************************************************
 */
function JSON($array) {
	arrayRecursive ( $array, 'urlencode', true );
	$json = json_encode ( $array );
	return urldecode ( $json );
}

/**
 * ************************************************************
 *
 * 使用特定function对数组中所有元素做处理
 *
 * @param
 *        	string &$array 要处理的字符串
 * @param string $function
 *        	要执行的函数
 * @return boolean $apply_to_keys_also 是否也应用到key上
 * @access public
 *        
 *         ***********************************************************
 */
function arrayRecursive(&$array, $function, $apply_to_keys_also = false) {
	static $recursive_counter = 0;
	if (++ $recursive_counter > 1000) {
		die ( 'possible deep recursion attack' );
	}
	foreach ( $array as $key => $value ) {
		if (is_array ( $value )) {
			arrayRecursive ( $array [$key], $function, $apply_to_keys_also );
		} else {
			$array [$key] = $function ( $value );
		}
		
		if ($apply_to_keys_also && is_string ( $key )) {
			$new_key = $function ( $key );
			if ($new_key != $key) {
				$array [$new_key] = $array [$key];
				unset ( $array [$key] );
			}
		}
	}
	$recursive_counter --;
}

//随机产生4位字母
function get_rand_letter(){
	$str = '';
	for($i =1; $i <5; $i++){
		$str .= chr(rand(97,122));
	}
	return $str;
}

//获取菜单
function getMenu(){
	return	array(	
		'system'=>array('name'=>'系统','child'=>array(
					array('name' => '设置','child' => array(
					array('name' => '网站设置', 'act'=>'websetting', 'op'=>'system'),
					array('name' => '支付方式', 'act'=>'pay_list', 'op'=>'system'),
					array('name' => '短信模版', 'act'=>'sms_list', 'op'=>'Sms'),
					)),
					array('name' => '文章','child' => array(
					array('name' => '文章列表', 'act'=>'articleList', 'op'=>'Article'),
					array('name' => '文章分类', 'act'=>'categoryList', 'op'=>'Article'),
					)),
					array('name' => '权限','child'=>array(
							array('name' => '用户管理', 'act'=>'user_list', 'op'=>'system'),
							array('name' => '角色管理', 'act'=>'role_list', 'op'=>'system'),
							array('name' => '节点管理', 'act'=>'auth_list', 'op'=>'system'),
					)),
					array('name' => '日志','child'=>array(
							array('name' => '操作日志	', 'act'=>'log_list', 'op'=>'system'),
					)),	
		)),
		
		'shop'=>array('name'=>'门店','child'=>array(
					array('name' => '设置','child' => array(
							array('name'=>'门店列表','act'=>'shop_list', 'op'=>'shop'),
							array('name'=>'门店预约','act'=>'shop_yuyue_list', 'op'=>'shop'),
							
					)),
					array('name' => '员工','child'=>array(
							array('name'=>'员工列表','act'=>'employee_list', 'op'=>'shop'),
							array('name'=>'员工订单','act'=>'order_list', 'op'=>'shop'),

					)),
					array('name' => '统计','child'=>array(
							array('name' => '门店销售报表', 'act'=>'shop_sale_report', 'op'=>'report'),
							array('name' => '员工销售报表', 'act'=>'emp_sale_report', 'op'=>'report'),
					))
		)),
			
		'mall'=>array('name'=>'商城','child'=>array(
				array('name' => '商品','child' => array(
						array('name' => '商品分类', 'act'=>'category_list', 'op'=>'goods'),
						array('name' => '商品列表', 'act'=>'index', 'op'=>'goods'),
						array('name' => '供货商', 'act'=>'supplier_list', 'op'=>'goods'),
						array('name' => '评论列表', 'act'=>'comment_list', 'op'=>'goods'),				
				)),
				array('name' => '客户','child' => array(
						array('name' => '客户列表', 'act'=>'index', 'op'=>'customer'),
						array('name' => '客户消费', 'act'=>'purchase_list', 'op'=>'customer'),
				)),
				array('name' => '订单','child'=>array(
						array('name' => '订单列表', 'act'=>'index', 'op'=>'order'),
						array('name' => '退回订单', 'act'=>'back_list', 'op'=>'order'),
						array('name' => '未支付订单', 'act'=>'unpay_list', 'op'=>'order'),
						array('name' => '添加订单', 'act'=>'add_order', 'op'=>'order'),
				)),
				array('name' => '广告','child' => array(
						array('name'=>'广告列表','act'=>'adver_list','op'=>'Mall'),
				)),
				array('name' => '统计','child' => array(
						array('name' => '销售报表', 'act'=>'index', 'op'=>'report'),
						array('name' => '订单报表', 'act'=>'order_list', 'op'=>'report'),
						array('name' => '销售订单报表', 'act'=>'sale_order_list', 'op'=>'report'),
						array('name' => '业绩报表', 'act'=>'amount_list', 'op'=>'report'),
						array('name' => '商品销售报表', 'act'=>'goods_sale_list', 'op'=>'report'),
				)),
		)),
			
		/*'mobile'=>array('name'=>'模板','child'=>array(
				array('name' => '设置','child' => array(
						array('name' => '模板设置', 'act'=>'templateList', 'op'=>'Template'),
						array('name' => '手机支付', 'act'=>'templateList', 'op'=>'Template'),
						array('name' => '微信二维码', 'act'=>'templateList', 'op'=>'Template'),
						array('name' => '第三方登录', 'act'=>'templateList', 'op'=>'Template'),
						array('name' => '导航管理', 'act'=>'finance', 'op'=>'Report'),
						array('name' => '广告管理', 'act'=>'finance', 'op'=>'Report'),
						array('name' => '广告位管理', 'act'=>'finance', 'op'=>'Report'),
				)),
		)),
			
		'resource'=>array('name'=>'插件','child'=>array(
				array('name' => '云服务','child' => array(
					array('name' => '插件库', 'act'=>'index', 'op'=>'Plugin'),
				)),
		)),*/
	);
}



/**
 * 邮件发送
 * @param $to    接收人
 * @param string $subject   邮件标题
 * @param string $content   邮件内容(html模板渲染后的内容)
 * @throws Exception
 * @throws phpmailerException
 */
function send_email($to,$subject='',$content=''){
    //vendor('phpmailer.PHPMailerAutoload'); ////require_once vendor/phpmailer/PHPMailerAutoload.php';
	require_once '/vendor/phpmailer/PHPMailerAutoload.php';
    //判断openssl是否开启
    $openssl_funcs = get_extension_funcs('openssl');
    if(!$openssl_funcs){
        return array('status'=>-1 , 'msg'=>'请先开启openssl扩展');
    }
    $mail = new PHPMailer;
    //$config = tpCache('smtp');
	$model = D('config');
	$opt['where'] = array('inc_type' =>"smtp");
	$list = $model->where($opt['where'])->order('id DESC')->select();
	foreach($list as $key=>$val)
	{
			$config[$val['name']]=$val['value'];	
	}
	
    $mail->CharSet  = 'UTF-8'; //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
    $mail->isSMTP();
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 0;
    //调试输出格式
    //$mail->Debugoutput = 'html';
    //smtp服务器
    $mail->Host =$config['smtp_server'];
    //端口 - likely to be 25, 465 or 587
    $mail->Port =25;// $config['smtp_port'];

    if($mail->Port === 465) $mail->SMTPSecure = 'ssl';// 使用安全协议
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    //用户名
    $mail->Username = $config['smtp_user'];
    //密码
    $mail->Password = $config['smtp_pwd'];
    //Set who the message is to be sent from
    $mail->setFrom($config['smtp_user']);
    //回复地址
    //$mail->addReplyTo('replyto@example.com', 'First Last');
    //接收邮件方
    if(is_array($to)){
        foreach ($to as $v){
            $mail->addAddress($v);
        }
    }else{
        $mail->addAddress($to);
    }

    $mail->isHTML(true);// send as HTML
    //标题
    $mail->Subject = $subject;
    //HTML内容转换
    $mail->msgHTML($content);
    //Replace the plain text body with one created manually
    //$mail->AltBody = 'This is a plain-text message body';
    //添加附件
    //$mail->addAttachment('images/phpmailer_mini.png');
    //send the message, check for errors
    if (!$mail->send()) {
        return array('status'=>-1 , 'msg'=>'发送失败: '.$mail->ErrorInfo);
    } else {
        return array('status'=>1 , 'msg'=>'发送成功');
    }
}

//手机号码隐藏中间四位
function deal_phone($phone){
	$p1 = substr($phone,0,3);
	$p2 = substr($phone,3,4);
	$p3 = substr($phone,7,4);
	$p4 = preg_replace('/[0-9]/','*',$p2);
	$result = $p1.$p4.$p3;
	return $result;
}
//身份证 号码隐藏中间10位
function deal_card($card){
	$num = strlen($card);
	$c1 = substr($card,0,4);
	$c2 = substr($card,4,10);
	if($num==15){
		$c3 = substr($card,14,1);
	}else{
		$c3 = substr($card,14,4);
	}
	$c4 = preg_replace('/\w/','*',$c2);
	$result =$c1.$c4.$c3;
	return $result;
}

//验证手机格式

function checkmobile($mobile){
    $len = strlen($mobile);
	if($len!=11){
		return false;
	}
	/*$ruler = '/^1[345789]\d{9}$/';
	if(!preg_match($ruler,$mobile)){
		return false;
	}*/
	
	return true;
}

//验证身份证格式

function checkcard( $id )
{	

	$len = strlen($id);
	if($len!=18){
		return false;
	}
	
	return true;

	/*$id = strtoupper($id);
	$regx = "/(^\d{15}$)|(^\d{17}([0-9]|X)$)/";
	$arr_split = array();
	if(!preg_match($regx, $id))
	{
		return FALSE;
	}
	if(15==strlen($id)) //检查15位
	{
		$regx = "/^(\d{6})+(\d{2})+(\d{2})+(\d{2})+(\d{3})$/";

		@preg_match($regx, $id, $arr_split);
		//检查生日日期是否正确
		$dtm_birth = "19".$arr_split[2] . '/' . $arr_split[3]. '/' .$arr_split[4];
		if(!strtotime($dtm_birth))
		{
			return FALSE;
		} else {
			return TRUE;
		}
	}
	else      //检查18位
	{
		$regx = "/^(\d{6})+(\d{4})+(\d{2})+(\d{2})+(\d{3})([0-9]|X)$/";
		@preg_match($regx, $id, $arr_split);
		$dtm_birth = $arr_split[2] . '/' . $arr_split[3]. '/' .$arr_split[4];
		if(!strtotime($dtm_birth)) //检查生日日期是否正确
		{
			return FALSE;
		}
		else
		{
			//检验18位身份证的校验码是否正确。
			//校验位按照ISO 7064:1983.MOD 11-2的规定生成，X可以认为是数字10。
			$arr_int = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
			$arr_ch = array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
			$sign = 0;
			for ( $i = 0; $i < 17; $i++ )
			{
				$b = (int) $id{$i};
				$w = $arr_int[$i];
				$sign += $b * $w;
			}
			$n = $sign % 11;
			$val_num = $arr_ch[$n];
			if ($val_num != substr($id,17, 1))
			{
				return FALSE;
			} //phpfensi.com
			else
			{
				return TRUE;
			}
		}
	}*/
}

//验证该数据是否位数值型
function isNum($str,$flag = 'float'){
	if(empty($str)) return false;
	if(strtolower($flag) == 'int'){
		return ((string)(int)$str === (string)$str) ? true : false;
	}else{
		return ((string)(float)$str === (string)$str) ? true : false;
	}
}

?>
