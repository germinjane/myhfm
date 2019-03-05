<?php
class StaffAction extends CommonAction{

	public function staff_list(){

		//array_filter


		if(IS_GET||IS_POST){

			//分页
			$p = I('request.p');
//
//		}
//
//		//条件搜索查询
//		if(IS_POST){

//			var_dump($_POST);exit;
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


				$where = $str;

			}




			$this->assign('name', $where1['name']);
			$this->assign('start_time', $where1['start_time']);
			$this->assign('end_time', $where1['end_time']);
			$this->assign('card', $where1['card']);
			$this->assign('team', $where1['team']);
			$this->assign('tel', $where1['tel']);
		}


		$Data = M('Staff');
		import('ORG.Util.Page');
//		echo $where;
//		echo '-------------';
		$count = $Data->where($where)->count();


		$Page = new \Page($count, 10);
		$show = $Page->show();
		$list = $Data->where($where)->order('id')->limit($Page->firstRow.','.$Page->listRows)
			->select();
//		if(IS_POST){
//			echo $Data ->getLastSql();
//
//			echo '-------------';exit;}


		$this->assign('res', $list);
		$this->assign('page',$show);// 赋值分页输出
//		$res =D('Staff')->where($opt['where'])->order('id')->select();

//		var_dump($res);exit;

//		$this->assign('res', $res);
		$this->display();
	}
	
	
    public function add_staff(){
        if(IS_POST){
//			var_dump($_POST);exit;

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


            if($this->check_exist($data['card'])){
                $this->error('身份证，不能重复添加！');die;
            }
    

			$data['createtime'] = date('Y-m-d H:i:s',time());

//			$data['is_temp'] = 1;

			$res = M('Staff')->add($data);
		    $this->success('添加成功!','/admin/staff/staff_list/');
		    die;
        }
          
        $this->display();
        
    }

 	public function edit_staff(){
	 	$id = I('id',0,'intval');
		if(!$id){
			$this->error('无用户id，不能重复添加！');die;
		}
        if(IS_POST){
//			var_dump($_POST);exit;
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
//			$data['department'] = I('request.department');
//				echo 'leave_time'.$data['leave_time'].'<br/>';
//			var_dump($data);
            if(empty($data['name'])){
                $this->error('请填写姓名！');die;
            }

            if($this->check_exist($data['card'],$id)){
                $this->error('身份证号码不能重复！');die;
            }
   			
			$Staff = D('Staff');
			$res = $Staff->save($data);
//			echo $Staff->getLastSql();exit;
		    $this->success('修改成功!','/admin/staff/staff_list/');
		    die;
        }
            
		
		
		$staffinfo= D('Staff')->where(" id='{$id}' ")->find();
		
		$this->assign('res',$staffinfo);
		$this->display();
     
    }

	public function del_staff(){

//		echo 1111;exit;
		$id = I('id',0,'intval');
		if(!$id){
			$this->error('无用户id，不能重复添加！');die;
		}
		
		$data = array('id'=>$id);
		D('Staff')->where($data)->delete(); // 删除id为5的用户数据
		$this->success('删除成功!','/admin/Staff/staff_list/');
	}
	
	//员工基本信息条件搜索
	public function check_exist($name,$id=0){

		if($id!=0){
			$sql=" name='{$username}' and id<>'{$id}' ";
		}else{
			$sql=" name='{$username}' ";
		}
		$userinfo= D('Staff')->where($sql)->find();

		if(empty($userinfo)){
			return false;
		}
		return true;
	}

	// 导入Excel
	public function import_staff(){

		if($_FILES){
//			var_dump($_FILES);exit;
			if($_FILES['excel']['type'] == 'application/vnd.ms-excel'||$_FILES['excel']['type'] =='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' ){
				$file = $_FILES;
				$path = $this->upload($file);
				$arr = $this->excel($path, 0);
				$data = [];

				$stard = array(
					'A'	=>	'所属团队',
					'B'	=>	'姓名',
					'C'	=>	'性别',
					'D'	=>	'身份证号码',
					'E'	=>	'联系方式',
					'F'	=>	'入职时间',
					'G'	=>	'在岗/离职',
					'H'	=>	'离职时间',
					'I'	=>	'备注'
					);

//				var_dump($arr[1]);
//				var_dump($stard);
//				exit;
				if($arr[1] !== $stard){
					$this->error('首行格式不正确！');die;
				}
				$create_time = date("Y-m-d");
				for($i=2; $i<= count($arr); $i++){

					//数据格式判断
					
					$dat = array(
						'team'	=>	$arr[$i]['A'],
						'name'	=>	$arr[$i]['B'],
						'sex'	=>	$arr[$i]['C']=='男'?1:2,
						'card'	=>	$arr[$i]['D'],
						'tel'	=>	$arr[$i]['E'],
						'hiredate'	=>	$arr[$i]['F'],
						'is_leave'	=>	($arr[$i]['G'] == '在职')?1:2,
						'leave_time'=>	$arr[$i]['H'],
						'remark'	=>	$arr[$i]['I'],
						'create_time' =>$create_time,
						'is_leave'	=> empty($leave_time)? 1:2

						);


					$data[] = $dat;
				}

				$insertInfo = D('staff')->addAll($data);

				if($insertInfo){
					$this->success('导入成功!','/admin/Staff/staff_list/');
				}
				$this->error('导入失败！');die;
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

	}

//	//下载模板
//	public function download(){
//
//		$down = $_GET['f'];   //获取文件参数
//		$filename = $down.'.xlsx'; //获取文件名称
////		$dir ="down/";  //相对于网站根目录的下载目录路径
//		$down_host = $_SERVER['HTTP_HOST'].'/'; //当前域名//判断如果文件存在,则跳转到下载路径
//		if(file_exists(__DIR__.'/'.$filename)){
//			echo 'location:http://'.$down_host.$filename;exit;
//		header('location:http://'.$down_host.$filename);
//			}else{
//		header('HTTP/1.1 404 Not Found');
//		}
//	}


	//上传
	public function upload($file){

		import('ORG.Net.UploadFile');
		$upload = new \UploadFile();
		$upload->maxSize = 3145728 ;// 设置附件上传大小
		$upload->exts = array('jpg', 'gif', 'png', 'jpeg', 'xls');// 设置附件上传类型
		$upload->savePath = APP_PATH  . 'Upload/xls/'; // 设置附件上传（子）目录
		// 上传文件
//		$info = $upload->upload($file);
		$info = $upload->uploadOne($file['excel']);
//		$info = $info['inputfile'];
		if(!$info) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
		}

		return $info[0]['savepath'] . $info[0]['savename'];
	}

	//excel
	public function excel($filePath='', $sheet=0){

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
				$cell = $currentSheet->getCell($addr)->getValue();
				if($cell instanceof PHPExcel_RichText){ //富文本转换字符串
					$cell = $cell->__toString();
				}
				$data[$rowIndex][$colIndex] = $cell;
			}
		}
		return $data;
	}

//	public function getRandomString($len, $chars=null)
//	{
//		if (is_null($chars)){
//		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
//		}
//		mt_srand(10000000*(double)microtime());
//		for ($i = 0, $str = '', $lc = strlen($chars)-1; $i < $len; $i++){
//		$str .= $chars[mt_rand(0, $lc)];
//		}
//		return $str;
//	}

	
}