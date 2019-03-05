<?php
class UserModel extends RelationModel{
    protected $tablePrefix = 'fm_';
    protected $tableName = 'user';
	

	
	function get_user_list($opt, $flag =1){
		if($flag){
			return $this->relation(true)->where($opt['where'])->find();
		}else{
			return $this->relation(true)->where($opt['where'])->limit($opt['limit'])->order('id DESC')->select();
		}
	}
	
	//是否存在
	function is_in_user($opt){
		return $this->where($opt['where'])->getField('id');
	}
	
	function get_user_num($opt){
		return $this->where($opt['where'])->count('id');
	}

}