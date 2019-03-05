<?php
class UsersetAction extends CommonAction{
	//修改密码
	function updatepwd(){
		$model = D('User');
		if(IS_POST){
			$res = array('status' =>0, 'msg' =>'修改密码失败！', 'url' =>'');
			$data = array_map('trim', I('post.'));
			$ismyself = $this->is_myself($data['id']);
			if(empty($ismyself) && $this->uid != 1){
				$this->ajaxReturn($res);
			}
			$opt['where'] = array('id' =>$data['id'], 'status' =>1);
			$userinfo = D('User')->get_user_list($opt, 1);
			if($userinfo){
				$opt['data'] = array('id' =>$data['id'], 'password' =>md5(md5($data['password']).$userinfo['salt']));
				$saveId = D('User')->save($opt['data']);
				if($saveId){
					$res['status'] = 1;
					$res['msg'] = '修改密码成功！';
				}
				//插入日志
				D('Log')->execute("INSERT INTO bd_log (connent,ip,add_time) VALUES ('[".$data['id']."],修改密码成功。','".$this->real_ip()."','".date('Y-m-d H:i:s')."');"); 
			}
			$this->ajaxReturn($res);
		}
		
		$id = I('id', 0);
		$opt['where'] = array('id' =>$id, 'status' =>1);
		$data = D('User')->get_user_list($opt, 1);
		$this->assign('data', $data);
		$this->display();
	}
	
	function getcode(){
		
		if(IS_POST){
			
			$data = array('id' =>$this->uid);
			$domain = I('request.domain');
			$domain =str_replace("，", ',', $domain);
			
			if(!empty($domain)){
				$data['domain']=$domain;
				$data['is_temp']=1;
			}
			
			$res = M('User')->save($data);
			$this->success('保存成功!','/user/userset/getcode/');
			//插入日志
			D('Log')->execute("INSERT INTO bd_log (connent,ip,add_time) VALUES ('[".$this->uid."],（".$domain."）修改授权网址。','".$this->real_ip()."','".date('Y-m-d H:i:s')."');"); 
			die;
		}
		$userinfo= D('User')->where("id='{$this->uid}'")->find();
		
		//var_dump($userinfo);
		$this->assign('userinfo', $userinfo);
		$this->display();
		
	}
	function readme(){
		//$userinfo= D('User')->where("id='{$this->uid}'")->find();
		
		//var_dump($userinfo);
		//$this->assign('userinfo', $userinfo);
		$this->display();
		
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