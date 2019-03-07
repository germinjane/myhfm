<?php
class StaffModel extends RelationModel{
    protected $tablePrefix = 'fm_';
    protected $tableName = 'staff';
	

	
	function get_staff_list($opt, $flag =1){
		if($flag){
			return $this->relation(true)->where($opt['where'])->find();
		}else{
			return $this->relation(true)->where($opt['where'])->limit($opt['limit'])->order('id DESC')->select();
		}
	}


	//分页输出
	function page_staff($where){

		$p = I('request.p');
		import('ORG.Util.Page');
		$Data = M('Staff');
		$count = $Data->where($where)->count();


		$Page = new \Page($count, 10);
		$show = $Page->show();
		$list = $Data->where($where)->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)
			->select();

		return array($list, $show);

	}

	function check_exist($key, $value, $id=0){

		if($id!=0){
			$sql="".$key."='{$value}' and id<>'{$id}' ";
		}else{
			$sql=" ".$key."='{$value}' ";
		}
		$userinfo= M('Staff')->where($sql)->find();
		if(empty($userinfo)){
			return false;
		}
		return true;
	}
	
	//是否存在
	function is_in_staff($opt){
		return $this->where($opt['where'])->getField('id');
	}
	
	function get_staff_num($opt){
		return $this->where($opt['where'])->count('id');
	}

}