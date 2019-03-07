<?php
class StaffAction extends CommonAction{


	//查询员工列表
	public function staff_list(){
		//array_filter
		if(IS_GET||IS_POST){
			list($where1, $where) = $this->filter_data();
			$cond['name'] = $where1['name'];
			$cond['start_time'] = $where1['start_time'];
			$cond['end_time'] = $where1['end_time'];
			$cond['card'] = $where1['card'];
			$cond['team'] = $where1['team'];
			$cond['tel'] = $where1['tel'];
		}
		//查找对应条件下的分页列表
		list($list, $show) = D('Staff')->page_staff($where);
		if(!empty($list)){
			foreach ($list as $key => &$value) {
				$value['hiredate'] = date('Y-m-d',strtotime($value['hiredate']));
				$value['tel'] = mb_strlen(trim($value['tel']))==0 ? "/":$value['tel'];

				
				$leave_time = date_to_unixtime($value['leave_time']);
				
				$value['leave_time'] =  $leave_time== 0 ? "/":$value['leave_time'];
				$value['remark_s'] = mb_substr($value['remark'], 0,10, $charset="utf-8");
				if(mb_strlen($value['remark'])> 10) $value['remark_s'] .="...";
			}
		}
		$cond['res'] = $list;
		$cond['page'] = $show;

		$this->assign($cond);
		$this->display();
	}

	//新增员工信息
    public function add_staff(){

        if(IS_POST){
            $data = array();
			$data['name'] = I('request.name');
			$data['sex'] = I('request.sex');
			$data['is_leave'] = I('request.is_leave');
			$data['team'] = I('request.team');
			$data['tel'] = I('request.tel');
			$data['card'] = I('request.card');
			$data['remark'] = I('request.remark');
			$data['hiredate'] = I('request.hiredate');
			$data['leave_time'] = I('request.leave_time');
			$data['department'] = I('request.department');

            if(empty($data['name'])){
                $this->error('请填写姓名！');die;
            }

            if($this->check_exist('card',$data['card'])){
                $this->error('身份证，不能重复添加！');die;
            }
    
			$data['createtime'] = date('Y-m-d H:i:s',time());
			$res = M('Staff')->add($data);
			if($res){
				$this->success('添加成功!','/admin/staff/staff_list/');
		    	die;
			}
		   	$this->error('添加失败！');die;
        }
        $this->display();
        
    }

	//编辑员工资料
 	public function edit_staff(){

	 	$id = I('id',0,'intval');
		if(!$id){
			$this->error('无用户id，不能重复添加！');die;
		}
        if(IS_POST){
            $data = array();
			$data['id'] = $id;
			$data['name'] = I('request.name');
			$data['sex'] = I('request.sex',0,'intval');
			$data['is_leave'] = I('request.is_leave',0,'intval');
			$data['team'] = I('request.team');
			$data['tel'] = I('request.tel');
			$data['card'] = I('request.card');
			$data['remark'] = I('request.remark');
			$data['hiredate'] = I('request.hiredate');
			$data['leave_time'] = date(I('request.leave_time'));

            if(empty($data['name'])){
                $this->error('请填写姓名！');die;
            }

            if($this->check_exist('card',$data['card'],$id)){
                $this->error('身份证号码不能重复！');die;
            }
   			
			$Staff = D('Staff');
			$res = $Staff->save($data);
			if($res!== false){
				$this->success('修改成功!','/admin/staff/staff_list/');
		    	die;
			}
			$this->error('修改失败！');die;// echo $Staff->getLastSql();exit; 
        }
		
		$staff_info = D('Staff')->where(" id='{$id}' ")->find();

		$staff_info['hiredate'] = date('Y-m-d',strtotime($staff_info['hiredate']));

		
		$this->assign('res',$staff_info);
		$this->display();
     
    }

    //删除员工信息
	public function del_staff(){

		$id = I('id',0,'intval');
		$url = I('jump_url');
		if(!$id){
			$this->error('无用户id，不能重复添加！');die;
		}
		$url = str_replace("-","/",$url);
		$data = array('id'=>$id);
		$res = D('Staff')->where($data)->delete(); 
		if($res){
			$this->success('删除成功!',$url,5);
		}else{
			$this->error('删除失败！');die;
		}
		
	}
	
	//员工基本信息条件搜索
	public function check_exist($key, $value, $id=0){

		return D('Staff')->check_exist($key, $value, $id);
	}

	// 导入Excel
	public function import_staff(){
		
		if($_FILES){	
			$file_type = strtolower(pathinfo($_FILES['excel']['name'], PATHINFO_EXTENSION));
			if($file_type == 'xlsx'||$_FILES['excel']['type'] =='xls' ){
				$file = $_FILES;
				$path = upload($file);
				$arr = $this->i_excel($path, 0);
				$data = [];
				// echo 11;exit;
				// $stard = C("STAFF_EXCEL_FORMAT");

				// if($arr[1] !== $stard){
				// 	$this->error('首行格式不正确！');die;
				// }
				$create_time = date("Y-m-d");

				//表格内容格式状态默认是true
				$format_state = true;
				//用于存储错误提示信息
				$error_message = '';

				for($i=2; $i <= count($arr); $i++){

					$action = 'add';
					$mess = "第".$i."行导入失败原因：";

					//数据格式判断
					if(!empty($arr[$i]['A'])){
						$dat['team'] = trim($arr[$i]['A']);
					}else{
						// $error_message[$i][] = "团队不能为空";
						$mess .= '团队不能为空<br/>';

					}
					if(!empty(trim($arr[$i]['C']))){
						if(in_array($arr[$i]['C'],["男","女"])){
							$dat['sex'] = trim($arr[$i]['C'])== "男"? 1: 2;
						}else{
							// $error_message[$i][] = "性别只能填写男或女";
							$mess .= '性别只能填写男或女<br/>';
						}
					}else{
						$error_message[$i][] = "性别不能为空";
						$mess .= '性别不能为空<br/>';
					}
					if(strlen($arr[$i]['E']) > 0){

						if(preg_match(C('PREG_MATCH_REGULAR.PHONE'),$arr[$i]['E'])){

							$dat['tel'] =trim($arr[$i]['E']);
						}else{


							// $error_message[$i][] = "电话号码格式不正确";
							$mess .= '电话号码格式不正确<br/>';
						}

					}else{
						// $error_message[$i][] = "电话不能为空";
						$mess .= '电话不能为空<br/>';
					}
					if(!empty($arr[$i]['F'])){

						if(preg_match(C('PREG_MATCH_REGULAR.DATE'),$arr[$i]['F'])){
							$dat['hiredate'] = $arr[$i]['F'];
						}else{

							// $error_message[$i][] = "日期格式必须是 年-月-日 或者 年/月/日";
							$mess .= '日期格式必须是 年-月-日 或者 年/月/日<br/>';

						}

					}else{
						// $error_message[$i][] = "入职日期不能为空";
						$mess .= '入职日期不能为空<br/>';
					}

					if(!empty($arr[$i]['G'])){
						if(in_array($arr[$i]['G'],["在职","离岗"])){
							$dat['is_leave'] = trim($arr[$i]['G'])== "在职"? 1: 2;
						}else{
							// $error_message[$i][] = "在职/离岗 只能填写在职或离岗";
							$mess .= '在职/离岗 只能填写在职或离岗<br/>';
						}
					}else{
						// $error_message[$i][] = "在职/离岗 不能为空";
						$mess .= '在职/离岗 不能为空<br/>';
					}
					if(!empty($arr[$i]['H'])){
						
						if(preg_match(C('PREG_MATCH_REGULAR.DATE'),$arr[$i]['H'])){
							// "/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/"
							$dat['leave_time'] = $arr[$i]['H'];
						}else{
							// $error_message[$i][] = "日期格式必须是 年-月-日  或者 年/月/日";
							$mess .= '日期格式必须是 年-月-日  或者 年/月/日<br/>';
						}

					}else{
						$dat['leave_time'] = $arr[$i]['H'];
					}
					if(!empty($arr[$i]['B'])){
						$dat['name'] = $arr[$i]['B'];
					}else{
						// $error_message[$i][] = "姓名不能为空";
						$mess .= '姓名不能为空<br/>';
					}
					if(!empty($arr[$i]['D'])){

						if(preg_match(C('PREG_MATCH_REGULAR.ID_CARD'),trim($arr[$i]['D']))){
							if($this->check_exist('card',$arr[$i]['D'])){
								// $error_message[$i][] = "身份证已存在！";
								// $mess .= '身份证已存在<br/>';
								if($this->check_exist('name',$arr[$i]['B'])){
									$action = 'update';
									unset($dat['name']);
									$up_where = array('name'=>$arr[$i]['B'], 'card'=>trim($arr[$i]['D']));
									$res = D('staff')->where($up_where)->save($dat);
									 if($res === false){// === 判断语句执行是否失败
									 	$mess .= '更新数据失败！<br>';
									 }
								}
							}else{
								$dat['card'] = $arr[$i]['D'];
							}
							
						}else{
							// $error_message[$i][] = "身份证格式不正确";
							$mess .= '身份证格式不正确<br/>';
						}

					}else{
						// $error_message[$i][] = "身份证不能为空";
						$mess .= '身份证不能为空<br/>';
					}


					if(mb_strlen($mess) <= 10 && $action == 'add'){

						$dat['create_time'] = $create_time;
						$res = D('staff')->add($dat);
						if(!$res){
							$mess .= '导入失败！<br>';
							// $this->error('导入失败！','', 12);die;
						}
					}
					//所有操作后二次检查
					if(mb_strlen($mess)>10) $error_message .= $mess;
					// $data[] = $dat;
				}
				if(mb_strlen($error_message)>0){
		
					$this->error($error_message,'', 15);die;
				}else{
					$this->success('导入成功!','/admin/Staff/staff_list/',20);
				}

				// $insertInfo = D('staff')->addAll($data);

				// if($insertInfo){
				// 	$this->success('导入成功!','/admin/Staff/staff_list/');
				// }
				// $this->error('导入失败！');die;


			}else if($file_type== ""){
				$this->error('请选择文件！');die;
			}else{
				$this->error('文件类型必须是excel！');die;
			
			}
		}
		if ($_FILES["file"]["error"] > 0)
		{
			echo "错误：" . $_FILES["file"]["error"] . "<br>";exit;
		}
		$this->display();
	}

	//导出Excel
	public function export_staff(){

		//如果有筛选条件的话
		if($_GET){
			$res = $this->filter_data();
		}
		$Data = M('Staff');
		$list = $Data->where($res[1])->order('id')
			->select();
		if(!empty($list)){
			$dat[1] = C("STAFF_EXCEL_FORMAT");

			foreach($list as $key => $value) {

				$roll['A'] = $value['team'];
				$roll['B'] = $value['name'];
				$roll['C'] = $value['sex']==1?"男":"女";
				$roll['D'] = $value['card'];
				$roll['E'] = $value['tel'];
				$roll['F'] = date('Y-m-d',strtotime($value['hiredate']));
				$roll['G'] = $value['is_leave']==1 ?"在岗":"离职";
				$roll['H'] = $value['leave_time'];
				$roll['I'] = $value['remark'];

				$dat[$key + 2] = $roll;
			}

			$this->e_excel2($dat);
		}
		$this->error('数据为空', 5);die;
	}

	//数据条件筛选
	public function  filter_data(){

		if(!empty(I('request.end_time')) &&(I('request.start_time')>I('request.end_time')) ){
			$this->error('入职起始日期不能大于入职截止日期！');die;
		}
		$where1['start_time'] = I('request.start_time');
		$where1['end_time'] = I('request.end_time');
		$where1['name'] = I('request.name');
		$where1['card'] = I('request.card');
		$where1['team'] = I('request.team');
		$where1['tel'] = I('request.tel');
		$opt = array_filter($where1);
		if(!empty($opt)){
			$i = 0; $str='';
			foreach($opt as $key =>$value){
				if($i != 0){
					$str.= ' AND ';
				}
				if($key == 'start_time'){
					$str .= 'hiredate >= "'.$value.'" ';
				}else if($key == 'end_time'){
					$str .= 'hiredate <= "'.$value.'" ';
				}else{
					$str .= $key.' like "%'.$value.'%" ';

				}
				$i++;

			}
			return array($where1, $str);
		}
	}

	//打包成excel输出
	public function  e_excel2($arr, $expTitle = "名药汇员工花名册"){

		vendor('PHPExcel.Classes.PHPExcel');
		$Excel = new \PHPExcel();
		// 设置
		$Excel
			->getProperties()
			->setCreator("mingyaohui")
			->setLastModifiedBy("dee")
			->setTitle("数据EXCEL导出")
			->setSubject("数据EXCEL导出")
			->setDescription("数据EXCEL导出")
			->setKeywords("excel")
			->setCategory("result file");

		foreach($arr as $key => $val) { // 注意 key 是从 0 还是 1 开始，此处是 0
			// $num = $key + 1;
			$Excel->setActiveSheetIndex(0)
				//Excel的第A列，uid是你查出数组的键值，下面以此类推
				->setCellValue('A'.$key, $val['A'])
				->setCellValue('B'.$key, $val['B'])
				->setCellValue('C'.$key, $val['C'])
				->setCellValue('D'.$key, $val['D'])
				->setCellValue('E'.$key, $val['E'])
				->setCellValue('F'.$key, $val['F'])
				->setCellValue('G'.$key, $val['G'])
				->setCellValue('H'.$key, $val['H'])
				->setCellValue('I'.$key, $val['I']);
		}

		$Excel->getActiveSheet()->setTitle('export');
		$Excel->setActiveSheetIndex(0);
		$name=$expTitle.'_'.date('Ymd',time()).'.xlsx';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename='.$name);
		header('Cache-Control: max-age=0');

		$ExcelWriter = \PHPExcel_IOFactory::createWriter($Excel, 'Excel2007');
		$ExcelWriter->save('php://output');
		exit;

	}
	
	//把excel内容读出来
	public function i_excel($filePath = '', $sheet = 0){

		import("Org.Util.PHPExcel");
		import("Org.Util.PHPExcel.Reader.Excel5");
		import("Org.Util.PHPExcel.Reader.Excel2007");

		if(empty($filePath) or !file_exists($filePath)){die('file not exists');}
		$PHPReader = new \PHPExcel_Reader_Excel2007();        //建立reader对象
		if(!$PHPReader->canRead($filePath)){
			$PHPReader = new \PHPExcel_Reader_Excel5();
			if(!$PHPReader->canRead($filePath)){
				echo 'no Excel';
				return ;
			}
		}
		$PHPExcel = $PHPReader->load($filePath);        //建立excel对象
		$currentSheet = $PHPExcel->getSheet($sheet);        //**读取excel文件中的指定工作表*/
		$allColumn = $currentSheet->getHighestColumn();        //**取得最大的列号*/
		$allRow = $currentSheet->getHighestRow();        //**取得一共有多少行*/
		$data = array();
		for($rowIndex=1;$rowIndex<=$allRow;$rowIndex++){        //循环读取每个单元格的内容。注意行从1开始，列从A开始
			for($colIndex='A';$colIndex<=$allColumn;$colIndex++){
				$addr = $colIndex.$rowIndex;
				if($colIndex==="F" || $colIndex==="H"){ //指定H列为时间所在列
					//php读取excel中的时间转换
                    $cell = gmdate("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($currentSheet->getCell($addr)->getValue()));  
                }else{
                    $cell = $currentSheet->getCell($addr)->getValue();
                }

				// $cell = $currentSheet->getCell($addr)->getValue();
				if($cell instanceof PHPExcel_RichText){ //富文本转换字符串
					$cell = $cell->__toString();
				}
				$data[$rowIndex][$colIndex] = $cell;
			}
		}
		return $data;
	}

	
}