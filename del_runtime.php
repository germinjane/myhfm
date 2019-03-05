<?php

clear_cache('./App/Runtime');

//删除静态缓存文件
function clear_cache($dir){
	if(!is_dir($dir)) return false;
	$dir_handle = opendir($dir);
	while($filename=readdir($dir_handle)){
		if($filename!='.' && $filename!='..'){
			$subFile=$dir.'/'.$filename;
			if(is_dir($subFile)){
				echo ($dir.'/'.$filename).'--->'.is_writable($dir.'/'.$filename).'<br>';;
				clear_cache($subFile);
			}else{
				echo ($dir.'/'.$filename).'<br>';;
				unlink($dir.'/'.$filename);
			}
		}
	}
	closedir($dir_handle);
}