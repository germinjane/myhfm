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
	
	//是否存在
	function is_in_staff($opt){
		return $this->where($opt['where'])->getField('id');
	}
	
	function get_staff_num($opt){
		return $this->where($opt['where'])->count('id');
	}

}