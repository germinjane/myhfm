<?php
class LoginAction extends Action{
	
	//登录
	function login(){
	
		if(IS_POST){
			$res = array('status' =>0, 'msg' =>'登录失败', 'jumpurl' =>U('user/index/index'));
			if(I('vertify','','md5') != session('verify')){
				$res['msg'] = '验证码错误'; 
				$this->ajaxReturn($res);
			}
			$data = array_map('trim', I('post.'));
			$opt['where'] = array(
				'username' =>$data['username'],
				'status' =>1,
			);		

			$info = D('User')->where($opt['where'])->find();
			$pwd = $data['password'];
			if(strlen($pwd)!=32){
				$pwd=md5(md5($data['password']).$info['salt']);
			}
			unset($opt);
			$opt['where'] = array(
				'username' =>$data['username'],
				'password' =>$pwd,
				'last_time' =>array('EGT', date('Y-m-d')),
				'status' =>1,
			);
			$isId = D('User')->is_in_user($opt);
			if($isId){
				session('ext_uid', $isId);
				$res['status'] = 1;
				$res['msg'] = '登录成功！';
				
				//插入日志
				D('Log')->execute("INSERT INTO bd_log (connent,ip,add_time) VALUES ('[".$data['username']."],登录成功。','".$this->real_ip()."','".date('Y-m-d H:i:s')."');"); 
			
			}
			$this->ajaxReturn($res);
		}else{
			$this->display();
		}
	}
	
	

	/*退出*/
	function logout(){
		session('ext_uid', null);

		$this->redirect('user/login/login');
	}
	
	/**
     * 验证码获取
     */
	function vertify(){
		ob_clean();
		import('ORG.Util.Image');
		Image::buildImageVerify(4,1,'png',50,27);
        exit();
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
		
	
}
