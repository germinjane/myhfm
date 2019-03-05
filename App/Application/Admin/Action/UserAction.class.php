<?php
class UserAction extends CommonAction{
	//修改密码
	function user_list(){
		$opt['where'] =array();
		//$opt['where'] = array('status'=>1);
		
		if(IS_POST){
			
			$username= I('request.username');
			
			if(!empty($username)){
				$opt['where'] = array('username'=>$username);
			}
			$this->assign('username', $username);
		}
		
		
		
		
		$res =D('User')->where($opt['where'])->order('id DESC')->select();
		
		$this->assign('res', $res);
		$this->display();
	}
	
	
    public function add_user(){
        if(IS_POST){

            $data = array();
			
			$data['username'] = I('request.username');
			$data['last_time'] = I('request.last_time');
			$data['beizhu'] = I('request.beizhu');
			
            if(empty($data['username'])){
                $this->error('请填写用户名！');die;
            }
			if(empty($data['last_time'])){
                $this->error('请选择授权时间！');die;
            }
            if($this->check_exist($data['username'])){
                $this->error('用户名，不能重复添加！');die;
            }
    
            $data['salt']   =$this->getRandomString(5);
			$data['password'] = md5(md5('123456').$data['salt']);
			$data['createtime'] = date('Y-m-d H:i:s',time());
			$data['sign'] = md5(md5('8898'.$data['username']));
			$data['status'] = 1;
			$data['is_temp'] = 1;

			$res = M('User')->add($data);
		    $this->success('添加成功!','/admin/user/user_list/');
		    die;
        }
          
        $this->display();
        
    }

 public function edit_user(){
	 	$id = I('id',0,'intval');
		if(!$id){
			$this->error('无用户id，不能重复添加！');die;
		}
        if(IS_POST){

            $data = array();
			$data['id'] = $id;
			$data['username']  = I('request.username');
			$data['last_time'] = I('request.last_time');
			$data['beizhu']    = I('request.beizhu');
			
			
            if(empty($data['username'])){
                $this->error('请填写用户名！');die;
            }
			if(empty($data['last_time'])){
                $this->error('请选择授权时间！');die;
            }
            if($this->check_exist($data['username'],$id)){
                $this->error('用户名，不能重复！');die;
            }
   			
			
			$pwd=I('request.password');
			if(!empty($pwd)){

				$data['salt']   =$this->getRandomString(5);
				$data['password'] = md5(md5(I('request.password')).$data['salt']);
			}


			$res = M('User')->save($data);
		    $this->success('修改成功!','/admin/user/user_list/');
		    die;
        }
            
		
		
		$userinfo= D('User')->where(" id='{$id}' ")->find();
		
		$this->assign('res',$userinfo);
		$this->display();
     
    }

	public function del_user(){

		$id = I('id',0,'intval');
		if(!$id){
			$this->error('无用户id，不能重复添加！');die;
		}
		
		$data = array('status'=>0,'id'=>$id);
		$status = D('User')->save($data);
		$this->success('删除成功!','/admin/user/user_list/');
	}
	

	public function check_exist($username,$id=0){
		if($id!=0){
			$sql=" username='{$username}' and id<>'{$id}' ";
		}else{
			$sql=" username='{$username}' ";
		}
		$userinfo= D('User')->where($sql)->find();

		if(empty($userinfo)){
			return false;
		}
		return true;
	}
	
	
	public function getRandomString($len, $chars=null)
	{
		if (is_null($chars)){
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		} 
		mt_srand(10000000*(double)microtime());
		for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < $len; $i++){
		$str .= $chars[mt_rand(0, $lc)]; 
		}
		return $str;
	}

	
}