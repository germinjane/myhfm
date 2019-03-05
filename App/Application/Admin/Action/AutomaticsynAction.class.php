<?php
class AutomaticsynAction extends Action{
    public function index(){
		
		header("Content-Type:text/html; charset=utf-8");
		
		echo "-统计数据同步01-";
		$data_access   = D('Access_record_temp')->order('id asc')->select();
		$last=1;
		foreach ($data_access as $key=>$v){
			D('Access_record')->execute("INSERT INTO bd_access_record (uid,url,ref,kw,source,region,ip,browser,platform,add_time,ssc) VALUES ('".$v['uid']."','".$v['url']."','".$v['ref']."','".$v['kw']."','".$v['source']."','".$v['region']."','".$v['ip']."','".$v['browser']."','".$v['platform']."','".$v['add_time']."','".$v['ssc']."');"); 
			$last=$v['id'];
		}	
		$last=$last+1;
		//清理数据	
		D('Access_record_temp')->execute("DELETE FROM  `bd_access_record_temp`  WHERE  `id` < ".$last);	
		
	
		echo "-统计数据同步02-1-";
		$data_copy   = D('Copy_record_temp')->order('id asc')->select();
		$last=1;
		foreach ($data_copy as $key=>$v){
			D('Copy_record')->execute("INSERT INTO bd_copy_record (uid,url,ref,kw,source,region,ip,browser,platform,add_time,copy_content,ssc) VALUES ('".$v['uid']."','".$v['url']."','".$v['ref']."','".$v['kw']."','".$v['source']."','".$v['region']."','".$v['ip']."','".$v['browser']."','".$v['platform']."','".$v['add_time']."','".$v['copy_content']."','".$v['ssc']."');"); 
			$last=$v['id'];
		}	
		$last=$last+1;
		//清理数据	
		D('Copy_record_temp')->execute("DELETE FROM  `bd_copy_record_temp`  WHERE  `id` < ".$last);	
		
		
		
		echo "-统计数据同步02-2-";
		$data_press   = D('Press_record_temp')->order('id asc')->select();
		$last=1;
		foreach ($data_press as $key=>$v){
			D('Press_record')->execute("INSERT INTO bd_press_record (uid,url,ref,kw,source,region,ip,browser,platform,add_time,copy_content,ssc) VALUES ('".$v['uid']."','".$v['url']."','".$v['ref']."','".$v['kw']."','".$v['source']."','".$v['region']."','".$v['ip']."','".$v['browser']."','".$v['platform']."','".$v['add_time']."','".$v['copy_content']."','".$v['ssc']."');"); 
			$last=$v['id'];
		}	
		$last=$last+1;
		//清理数据	
		D('Press_record_temp')->execute("DELETE FROM  `bd_press_record_temp`  WHERE  `id` < ".$last);	
		
		
		
		echo "-用户数据缓存03-";
		$data_user   = D('User')->where(' is_temp=1 and status=1 ')->select();

		foreach ($data_user as $key=>$v){
			
			$userinfo= D('User_temp')->where("uid='".$v['id']."'")->find();
			if(empty($userinfo)){
				D('User_temp')->execute("INSERT INTO bd_user_temp (uid,sign,domain) VALUES ('".$v['id']."','".$v['sign']."','".$v['domain']."');"); 
			}else{
				D('User_temp')->execute("UPDATE `bd_user_temp` SET `sign`='".$v['sign']."',`domain`='".$v['domain']."' where uid='".$v['id']."'"); 
			}
			//修改状态
			D('User')->execute("UPDATE `bd_user` SET `is_temp`=0 where id='".$v['id']."'"); 
			
		}
		
		
		echo "-停用到期用户04-";
		$nowtime=date('Y-m-d',time());
		D('User')->execute("UPDATE `bd_user` SET `status`='0' where id<>1 and last_time < '".$nowtime."'"); 
		
		
		
		//清理30天之前的数据
		$get_date = date("y-m-d");
		$c_time1  = strtotime($get_date . " 00:00:00");
		$c_time2  = strtotime($get_date . " 00:10:00");
		$nowtime  = time();
			
        if($c_time1<$nowtime && $nowtime<$c_time2){
			echo "-清理30天之前的数据05";
			
			$d30=strtotime('-30 days');
			
			
			D('Access_record')->where("add_time < '{$d30}'")->delete(); 	
			D('Copy_record')->where("add_time < '{$d30}'")->delete();	
			
		}
		
		
		
//$data_copy   = D('Copy_record')->order('id asc')->select();
//$last=1;
//foreach ($data_copy as $key=>$v){
//
//echo "<br/>";	
//echo $v['copy_content'];
//
//if (preg_match("/^[a-zA-Z0-9_]+$/", $v['copy_content'])) {
//echo "--1";
//}else{
//echo "--0";
//D('Copy_record')->execute("DELETE FROM  `bd_copy_record`  WHERE  `id` = ".$v['id'] );	
//}
//
//
//}	
		
		
		die;
 
	}
		

}