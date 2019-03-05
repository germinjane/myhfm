<?php
header("Content-Type:text/html; charset=utf-8");
$servername = "10.29.249.245";
$username = "myh2017";
$password = "myh2017123456#";
$dbname = "dbordersys";
$conn = mysql_connect($servername, $username, $password) or die("ERROR"); 
mysql_select_db($dbname, $conn); 
mysql_query("set names 'utf8'");

session_start();
if(isset($_SESSION['send_time_wap'])){
	$_SESSION['send_time_wap'] = 0;
}
$cur_time = time();
if (($cur_time - $_SESSION['send_time_wap']) < 10) {
	echo $jsonp.'({"success":fasle,"msg":"您至少在10秒后才可以继续提交！"})';
	die();
}

$jsonp = $_GET["callback"];  
$name = $_GET["name"];
$tel = $_GET["tel"];
$wechat = isset($_GET["wechat"])?$_GET["wechat"]:'';
$address = isset($_GET["address"])?$_GET["address"]:'';
$sex = isset($_GET["sex"])?$_GET["sex"]:'';
$goods = isset($_GET["goods"])?$_GET["goods"]:'赛乐赛';
$price = isset($_GET["price"])?$_GET["price"]:0;
$num = isset($_GET["num"])?$_GET["num"]:1;
$brand_id = isset($_GET["brand_id"])?$_GET["brand_id"]:0;
$remarks = isset($_GET["remarks"])?$_GET["remarks"]:'';
$ip = real_ip();
$referrer = $_SERVER['HTTP_REFERER'];
$add_time = time();

if (empty($name)) {
	echo $jsonp.'({"success":false,"msg":"请填写正确姓名！"})';
	die();
}
if (empty($tel)) {
	echo $jsonp.'({"success":false,"msg":"请填写正确手机号码！"})';
	die();
}

$sql = "SELECT * FROM cps_url WHERE brand_id = {$brand_id} AND tel='{$tel}' ORDER BY order_id DESC LIMIT 1";
$rst = mysql_query($sql);
$info = mysql_fetch_array($rst); 
if($info){
	echo $jsonp.'({"success":false,"msg":"亲，您的资料已经提交过了！"})';
	die();
}

$_SESSION['send_time_wap'] = $cur_time;
$sql = "INSERT INTO cps_url (name,tel,wechat,address,sex,goods,price,num,brand_id,remarks,ip,referrer,add_time,status) VALUES ('{$name}','{$tel}','{$wechat}','{$address}','{$sex}','{$goods}',{$price},{$num},{$brand_id},'{$remarks}','{$ip}','{$referrer}',{$add_time},1)";
mysql_query($sql);
mysql_close($conn);
echo $jsonp.'({"success":true,"msg":"亲，您的资料提交成功，请耐心等待客户与您联系！"})';
die();


//获取用户真实id
function real_ip(){
	$realip = NULL;
	if ($realip !== NULL){
		return $realip;
	}

	if (isset($_SERVER)){
		if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
			$arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
			/* 取X-Forwarded-For中第一个非unknown的有效IP字符串 */
			foreach ($arr AS $ip){
				$ip = trim($ip);
				if ($ip != 'unknown'){
					$realip = $ip;
					break;
				}
			}
		}
		elseif (isset($_SERVER['HTTP_CLIENT_IP'])){
			$realip = $_SERVER['HTTP_CLIENT_IP'];
		}
		else{
			if (isset($_SERVER['REMOTE_ADDR'])){
				$realip = $_SERVER['REMOTE_ADDR'];
			}
			else{
				$realip = '0.0.0.0';
			}
		}
	}else{
		if (getenv('HTTP_X_FORWARDED_FOR')){
			$realip = getenv('HTTP_X_FORWARDED_FOR');
		}
		elseif (getenv('HTTP_CLIENT_IP')){
			$realip = getenv('HTTP_CLIENT_IP');
		}
		else{
			$realip = getenv('REMOTE_ADDR');
		}
	}

	preg_match("/[\d\.]{7,15}/", $realip, $onlineip);
	$realip = !empty($onlineip[0]) ? $onlineip[0] : '0.0.0.0';
	return $realip;
}

function getIPaddress(){
	$IPaddress='';
	if (isset($_SERVER)){
		if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
			$IPaddress = $_SERVER["HTTP_X_FORWARDED_FOR"];
		} else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
			$IPaddress = $_SERVER["HTTP_CLIENT_IP"];
		} else {
			$IPaddress = $_SERVER["REMOTE_ADDR"];
		}

	} else {
		if (getenv("HTTP_X_FORWARDED_FOR")){
			$IPaddress = getenv("HTTP_X_FORWARDED_FOR");
		} else if (getenv("HTTP_CLIENT_IP")) {
			$IPaddress = getenv("HTTP_CLIENT_IP");
		} else {
			$IPaddress = getenv("REMOTE_ADDR");
		}

	}
	return $IPaddress;
}