<?php
class CommonAction extends Action{
	
	function _initialize(){
		$not_auth_array = array('login');
		if(!in_array(strtolower(ACTION_NAME), $not_auth_array)){
			$this->uid = $this->_check_login();
			if(!$this->uid){
				$this->redirect('user/login/login');
			}
		}
		
		//当前用户信息
		$opt['where'] = array('id' =>$this->uid, 'status' =>1);
		$userInfo = D('User')->get_user_list($opt);
		$this->empinfo = $userInfo;
		$this->assign('userinfo', $userInfo);
		
		//管理员看到全部数据，其他看各自
		if($this->uid ==1){
			$this->allUid = M('User')->where(array('status' =>1))->getField('id', true);
		}else{
			$this->allUid = $this->uid;
		}	
	}

    function __construct(){		
		parent::__construct();
    }
	
	protected function _check_login(){
		return session('ext_uid');
	}
	
	//判断是不是自己账户
	function is_myself($uid){
		return (int)$uid == (int)$this->uid? 1: 0;
	}
	
	//导出功能
	function excel_export($listExcel, $excelname, $title, $letter){ //$listExcel数据源 $excelname excel名称 $title表头
		ob_clean();
		set_time_limit(0);
		import("ORG.Util.PHPExcel"); 
		$cacheMethod = PHPExcel_CachedObjectStorageFactory:: cache_to_phpTemp;  
		$cacheSettings = array('memoryCacheSize' => '2048MB');
        //memoryCache缓存
		/*$cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_to_memcache; 
		$cacheSettings = array( 
						'memcacheServer'  => 'localhost', 
                        'memcachePort'    => 11211, 
                        'cacheTime'       => 600 
                      ); */
       //memoryCache缓存
		PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings); 
		$objPHPExcel = new PHPExcel();
		$filename = $excelname.date('Y-m-d His');			
		$objPHPExcel->setActiveSheetIndex(0);
		$j =0;
		foreach($title as $t_val){ 
			$index = $letter[$j];
			$objPHPExcel->getActiveSheet()->setCellValue($index."1", $t_val);
			$j++;
		}
		$arr_count = count($listExcel);
		$i = 2;		
		foreach($listExcel as $key=>$val){			
			$j =0;
			foreach($val as $val2){
				$index = $letter[$j];
				//$objPHPExcel->getActiveSheet()->setCellValue($index.$i, $val2);
				$objPHPExcel->getActiveSheet()->setCellValueExplicit($index.$i, $val2, PHPExcel_Cell_DataType::TYPE_STRING);
				$j++;
			}
			$i++;
		}
		$objPHPExcel->getActiveSheet()->setTitle("{$excel_name}");
		header('Content-Type:application/vnd.ms-excel');
		header('Content-Disposition:attachment;filename="'.$filename.'.xls"');
		header('Cache-Control:max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit();
	}

	/**
	 * upload文件上传
	 */
	protected function upload(){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize = 5145728;// 设置附件上传大小
		$upload->allowExts = array('jpg', 'gif', 'png', 'jpeg', 'xls', 'xlsx');// 设置附件上传类型
		$upload->savePath = C('UPLOAD_PATH');// 设置附件上传目录
		if (!$upload->upload()) {// 上传错误提示错误信息
			//$this->_tips($upload->getErrorMsg());
			var_dump($upload->getErrorMsg());
			exit;
		} else {// 上传成功 获取上传文件信息
			$info = $upload->getUploadFileInfo();
			return $info[0]['savepath'].$info[0]['savename'];
		}
	}
	
	//向服务器提交数据
    function curl_post($url, $vars){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//不向网页输出
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);//POST请求
        curl_setopt($ch, CURLOPT_POSTFIELDS, substr($this->data_encode($vars), 0, -1));//POST字段
        curl_setopt($ch, CURLOPT_VERBOSE, 1);//启用时会汇报所有的信息
        $data = curl_exec($ch);
        curl_close($ch);
        if ($data) {
            return $data;
        } else {
            return false;
        }
    }
	
	function data_encode($data, $keyprefix = "", $keypostfix = ""){
        assert(is_array($data));
        $vars = null;
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $vars .= $this->data_encode($value, $keyprefix . $key . $keypostfix . urlencode("["), urlencode("]"));
            } else {
                $vars .= $keyprefix . $key . $keypostfix . "=" . urlencode($value) . "&";
            }
        }
        return $vars;
    }
	
	function xml2array($contents, $get_attributes = 1){
		if (!$contents) {
			return array();
		}
	
		if (!function_exists('xml_parser_create')) {
			return array();
		}
	
		$parser = xml_parser_create();
		xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
		xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
		xml_parse_into_struct($parser, $contents, $xml_values);
		xml_parser_free($parser);
	
		if (!$xml_values) {
			return;
		}//Hmm...
	
		//Initializations
		$xml_array = array();
		$parents = array();
		$opened_tags = array();
		$arr = array();
		$current = &$xml_array;
		foreach ($xml_values as $data) {
			unset($attributes, $value);
			extract($data);
			$result = '';
			if ($get_attributes) {
				$result = array();
				if (isset($value)) {
					$result['value'] = $value;
				}
				if (isset($attributes)) {
					foreach ($attributes as $attr => $val) {
						if ($get_attributes == 1) {
							$result['attr'][$attr] = $val;
						}
					}
				}
			} elseif (isset($value)) {
				$result = $value;
			}
			if ($type == "open") {//The starting of the tag '<tag>'
				$parent[$level - 1] = &$current;
	
				if (!is_array($current) or (!in_array($tag, array_keys($current)))) { //Insert New tag
					$current[$tag] = $result;
					$current = &$current[$tag];
	
				} else { //There was another element with the same tag name
					if (isset($current[$tag][0])) {
						array_push($current[$tag], $result);
					} else {
						$current[$tag] = array($current[$tag], $result);
					}
					$last = count($current[$tag]) - 1;
					$current = &$current[$tag][$last];
				}
	
			} elseif ($type == "complete") { //Tags that ends in 1 line '<tag />'
				//See if the key is already taken.
				if (!isset($current[$tag])) { //New Key
					$current[$tag] = $result;
	
				} else { //If taken, put all things inside a list(array)
					if ((is_array($current[$tag]) and $get_attributes == 0)//If it is already an array...
						or (isset($current[$tag][0]) and is_array($current[$tag][0]) and $get_attributes == 1)
					) {
						array_push($current[$tag], $result); // ...push the new element into that array.
					} else { //If it is not an array...
						$current[$tag] = array(
							$current[$tag],
							$result
						); //...Make it an array using using the existing value and the new value
					}
				}
	
			} elseif ($type == 'close') { //End of tag '</tag>'
				$current = &$parent[$level - 1];
			}
		}
		return ($xml_array);
	}
}
