<?php
class IndexAction extends Action{
    public function index(){					
		//测试
		//$kw_sign_id    = 'eaf7d1e360f634a865f61067e79a6464';
		//$kw_url        = 'https://sls01.myh100.com/bdss02/a2';	
		//$kw_ref        = "https://m.baidu.com/baidu.php?sc.a00000KHiqMrRubUBdoe3hWkPcIunorUkBYkz-WCbyrWFYP0PbsMRwRqwYzvwfgoOOJXweyLVimXbCRxfdIjlyURi7zFyzB-k7nXYq2WmaZ_y4AMI8UcZDYN6Wo1YsXL6c8NOj32oG93VHODPAtGg6IypUBW3fwi5Rm3fBvsXt4KW9Kdcs.DY_NR2Ar5Od66WCkvNSyMwNguu3mQeC3ernjPTZIMKTqnR2y2ShEkvTNBmIWWo_oLtpllas1f_NePS1BC0.U1Yk0ZDqdOj2LUiOdVjiJU1dVtJq8_Hi0ZKGm1Yk0ZfqdVazLI2GE5yLzovlkPc0pyYqnWc10ATqIvwln0KdpHY0TA-b5Hb0mv-b5H00UgfqnH0kPdtknjD4g1csPWFxn1msnNt4njn3g1csPHD0pvbqn0KzIjY4nWf0uy-b5HDsnWRvrNtknjcznjuxnHDvP16sg1DkPjTYndtknHbsPjIxnH0snjb3g1Dznjckn7tknW0sn1KxnHD3rjbzg1Dkrj6vPdtknH63PHKxnHD3rjn1g1DkrjT4P7tknjT1nHuxnHD4njfYg1DznjTLnsKBpHYznjuxnW0snjFxnW0sn1D0UynqPWbLnHmznWbzg1Dsnj7xnWfvnjTsPWDYndtsg1DdP-tzPjf1PHmLP0KkTA-b5H00TyPGujYs0ZFMIA7M5H00mycqn7ts0ANzu1Ys0ZKs5H00UMus5H08nj0snj0snj00Ugws5H00uAwETjYk0ZFJ5H00uANv5gIGTvR0uMfqn6KspjYs0Aq15Hc0mMTqP0K8IjYs0ZPl5Hnzn7tknj0k0ZwdT1YdPW6YPWTznW0LP10LrjcYrH040ZF-TgfqnHRknWfYP1RznWDvrfK1pyfqmWn3nvfdmWD4n1-BrHfsPfKWTvYqwDF7rHDLnH-DwWuKPYfdnfK9m1Yk0ZK85H00TydY5H00Tyd15H00XMfqn6KVmdqhThqV5HKxn7tsg1Kxn7ts0Aw9UMNBuNqsUA78pyw15HKxn7tsg1Kxn7ts0ZK9I7qhUA7M5H00uAPGujYzPW6Yn1RYPHm0ugwGujYVnfK9TLKWm1Ys0ZNspy4Wm1Ys0Z7VuWYkP6KhmLNY5H00uMGC5H00uh7Y5H00XMK_Ignqn0K9uAu_myTqnfK_uhnqn0KLuMFEUHYknjD4n1DkI0KWThnqn16LnWD&qid=b383d5b1939b9405&sourceid=111&placeid=1&rank=1&shh=m.baidu.com&word=尊瘦纯中药减肥胶囊&sht=1019311t&ck=1050.101.138.229.360.284.0.0.15.136.232&us=0.0.0.0.0.0.0.104";
		//$c             = 'sls00848';
		
		/*php
		urlencode()
		urldecode()
		js
		decodeURIComponent()
		encodeURIComponent()*/
		
		$kw_sign_id = I('kw_sign_id', '', 'trim');
		$kw_url = I('kw_url'); //解码
		$kw_ref = I('kw_ref');
		$c = I('c', '', 'trim');
		$p = I('p', '', 'trim');
		$agent = $_SERVER['HTTP_USER_AGENT'];
		$browser = $this->determinebrowser($agent);
		$platform = $this->determineplatform($agent);
		$kw = '';
		$ssc = '';
		
		//判断kw_sign_id是否合法,统计域名是否合法
		$userinfo = D('User_temp')->where("sign='{$kw_sign_id}'")->find();
		if(empty($userinfo)){
			die;	
		}
		$arr_kw_url = parse_url($kw_url);
		if(!strstr($userinfo['domain'], $arr_kw_url['host'])){
			die;		
		}
	    $uid = $userinfo['uid'];
				
		//获取来源url搜索词
		if($kw_ref){
			//$pattern = '/kw=([^&]*)&?/';
			$pattern = '/(wd=|word=)([^&]*)&?/'; //PC,WAP
			preg_match_all($pattern, urldecode($kw_ref), $matches);
			$ssc = @$matches[2][0];
		}
	
		if( empty($ssc) ){	
			//如何是否来百度 其它渠道
			if(strstr($kw_ref, 'cpro.baidu.com')){
				$ssc ='baiduwangmeng';
			}else if(strstr($kw_ref, 'youxuan.baidu.com')){
				$ssc ='baiduyouxuan';
			}else if(strstr($kw_ref, 'jingyan.baidu.com')){
				$ssc ='baidujingyan';
			}else if(strstr($kw_ref, 'zhidao.baidu.com')){
				$ssc ='baiduzhidao';
			}else if(strstr($kw_ref, 'wenku.baidu.com')){
				$ssc ='baiduwenku';
			}else if(strstr($kw_ref, 'm.baidu.com/sf_edu_wenku')){
				$ssc ='baiduwenku';
			}else if(strstr($kw_ref, 'muzhi.baidu.com')){
				$ssc ='baidumuzhi';
			}else if(strstr($kw_ref, 'm.baidu.com')){
				$ssc ='m.baidu.com';
			}else if(strstr($kw_ref, 'mipcache.bdstatic.com')){
				$ssc ='baidu';
			}else if(strstr($kw_ref, 'mipcdn.com')){
				$ssc ='baidu';
			}		
		}
		
		//截取当前URL的关键字	
		$pattern = '/kw=([^&]*)&?/'; 
		preg_match_all($pattern, urldecode($kw_url), $matches);
		$kw = @$matches[1][0];
		
		$ssc = $this->strtouft8($ssc);
		$kw = $this->strtouft8($kw);
		$ip = $this->real_ip();
		//$regiondate = $this->get_region($ip);
		//$region = "{$regiondate['country']} {$regiondate['province']} {$regiondate['city']} {$regiondate['area']} {$regiondate['operator']}";
		$region = '';
		
		//来源
		$source = '百度';
		//插入数据
		if($c == '' && $p == ''){
			$accessData = array(
				'uid' =>$uid,
				'url' =>$kw_url,
				'ref' =>$kw_ref,
				'kw' =>$kw,
				'source' =>$source,
				'region' =>$region,
				'ip' =>$ip,
				'browser' =>$browser,
				'platform' =>$platform,
				'add_time' =>time(),
				'ssc' =>$ssc,
			);
			D('Access_record_temp')->add($accessData);		
		}else{
			//不包含中文
			if (preg_match("/^[a-zA-Z0-9_]+$/", $c)) {
			//if ($c) {
				$copyData = array(
					'uid' =>$uid,
					'url' =>$kw_url,
					'ref' =>$kw_ref,
					'kw' =>$kw,
					'source' =>$source,
					'region' =>$region,
					'ip' =>$ip,
					'browser' =>$browser,
					'platform' =>$platform,
					'add_time' =>time(),
					'copy_content' =>$c,
					'ssc' =>$ssc,
				);
				D('Copy_record_temp')->add($copyData);	 	
			}
			if (preg_match("/^[a-zA-Z0-9_]+$/", $p)) {
			//if ($p) {
				$pressData = array(
					'uid' =>$uid,
					'url' =>$kw_url,
					'ref' =>$kw_ref,
					'kw' =>$kw,
					'source' =>$source,
					'region' =>$region,
					'ip' =>$ip,
					'browser' =>$browser,
					'platform' =>$platform,
					'add_time' =>time(),
					'copy_content' =>$p,
					'ssc' =>$ssc,
				);
				D('Press_record_temp')->add($pressData);
			}	
			
		}
		$result = array('status'=>1);
		die($_GET['callback'].'('.json_encode($result).')');		
    }
	
	protected function strtouft8($strText){
		$encode = mb_detect_encoding($strText, array('UTF-8','GB2312','GBK'));
		if($encode!= "UTF-8"){
			return @iconv($encode,'UTF-8',$strText);
		}else{
			return $strText;
		}
	}  
	
	//获取地区信息
	protected function get_region( $ip){
	
		//新浪
		$ch = curl_init();
		$timeout = 5;
		curl_setopt ($ch, CURLOPT_URL, 'http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip='.$ip);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$str = curl_exec($ch);
		curl_close($ch);
		$str = iconv("GBK", "UTF-8", $str);
		$data = json_decode($str);
		$json = array();
		$json['country'] = $data->country;
		$json['province'] = $data->province;
		$json['city'] = $data->city;
		$json['area'] = $data->district;
		$json['operator'] = $data->isp;
	  
			
	/*taobao处理类	
		$url = "http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
		$dip = file_get_contents($url);
		$dd = json_decode($dip,true);
		
		$json = array();
		$json['country'] =$dd['data']['country'];
		$json['province']=$dd['data']['region'];
		$json['city']    =$dd['data']['city'];
		$json['area']    =$dd['data']['area'];
		$json['operator']=$dd['data']['isp'];	
	*/
		return $json;
	}


    //获取用户真实id
   protected  function real_ip(){
        static $realip = NULL;
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
	
	//正值表达式比对解析$_SERVER['HTTP_USER_AGENT']中的字符串 获取访问用户的浏览器的信息
	protected function determinebrowser ($Agent) {
		$browseragent = "";   //浏览器
		$browserversion = ""; //浏览器的版本
		if (ereg('MSIE ([0-9].[0-9]{1,2})',$Agent,$version)) {
			$browserversion = $version[1];
			$browseragent = "Internet Explorer";
		} else if (ereg( 'Opera/([0-9]{1,2}.[0-9]{1,2})',$Agent,$version)) {
			$browserversion = $version[1];
			$browseragent = "Opera";
		} else if (ereg( 'Firefox/([0-9.]{1,5})',$Agent,$version)) {
			$browserversion = $version[1];
			$browseragent = "Firefox";
		}else if (ereg( 'Chrome/([0-9.]{1,3})',$Agent,$version)) {
			$browserversion = $version[1];
			$browseragent = "Chrome";
		}else if (ereg( 'Safari/([0-9.]{1,3})',$Agent,$version)) {
			$browseragent = "Safari";
			$browserversion = "";
		}else {
			$browserversion = "";
			$browseragent = "Unknown";
		}
		return $browseragent." ".$browserversion;
	}
	
	// 同理获取访问用户的浏览器的信息
	protected function determineplatform ($Agent) {
		$browserplatform == '';
		if (eregi('win',$Agent) && strpos($Agent, '95')) {
			$browserplatform = "Windows 95";
		}else if (eregi('win 9x',$Agent) && strpos($Agent, '4.90')) {
			$browserplatform = "Windows ME";
		}else if (eregi('win',$Agent) && ereg('98',$Agent)) {
			$browserplatform = "Windows 98";
		}else if (eregi('win',$Agent) && eregi('nt 5.0',$Agent)) {
			$browserplatform = "Windows 2000";
		}else if (eregi('win',$Agent) && eregi('nt 5.1',$Agent)) {
			$browserplatform = "Windows XP";
		}else if (eregi('win',$Agent) && eregi('nt 6.0',$Agent)) {
			$browserplatform = "Windows Vista";
		}else if (eregi('win',$Agent) && eregi('nt 6.1',$Agent)) {
			$browserplatform = "Windows 7";
		}else if (eregi('win',$Agent) && ereg('32',$Agent)) {
			$browserplatform = "Windows 32";
		}else if (eregi('win',$Agent) && eregi('nt',$Agent)) {
			$browserplatform = "Windows NT";
		}else if (eregi('Mac OS',$Agent)) {
			$browserplatform = "Mac OS";
		}else if (eregi('linux',$Agent)) {
			$browserplatform = "Linux";
		}else if (eregi('unix',$Agent)) {
			$browserplatform = "Unix";
		}else if (eregi('sun',$Agent) && eregi('os',$Agent)) {
			$browserplatform = "SunOS";
		}else if (eregi('ibm',$Agent) && eregi('os',$Agent)) {
			$browserplatform = "IBM OS/2";
		}else if (eregi('Mac',$Agent) && eregi('PC',$Agent)) {
			$browserplatform = "Macintosh";
		}else if (eregi('PowerPC',$Agent)) {
			$browserplatform = "PowerPC";
		}else if (eregi('AIX',$Agent)) {
			$browserplatform = "AIX";
		}else if (eregi('HPUX',$Agent)) {
			$browserplatform = "HPUX";
		}else if (eregi('NetBSD',$Agent)) {
			$browserplatform = "NetBSD";
		}else if (eregi('BSD',$Agent)) {
			$browserplatform = "BSD";
		}else if (ereg('OSF1',$Agent)) {
			$browserplatform = "OSF1";
		}else if (ereg('IRIX',$Agent)) {
			$browserplatform = "IRIX";
		}else if (eregi('FreeBSD',$Agent)) {
			$browserplatform = "FreeBSD";
		}
		if ($browserplatform == '') {
			$browserplatform = "Unknown"; 
		}
		return $browserplatform;
	}


	//头条回调接口入库
	  public function click_data_receive(){
	  	$data = array_map('trim', I('get.'));
	  	file_put_contents('1.txt',json_encode($data).PHP_EOL,FILE_APPEND);
	  	if($data['adid'] <= 0 || $data['cid'] <= 0 || $data['usign'] == ""){
	  		echo "fail";
	  		exit;
	  	}

	  	$data['add_time'] = date('Y-m-d H:i:s',time());
	  	$state = M('data'.$data['usign'])->add($data);
	  	if($state !== false){
	  		echo "success";
	  	}else{
	  		echo "fail";
	  	}
	  }


}