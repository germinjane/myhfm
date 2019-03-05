<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>名药汇员工花名册系统</title>
<link href="/static/common/inspinia/css/bootstrap.min.css" rel="stylesheet" />
<link href="/static/common/inspinia/css/style.min.css" rel="stylesheet" />
<link href="/static/common/inspinia/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<link href="/static/common/inspinia/css/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
<!-- datePicker -->
<link href="/static/common/inspinia/css/plugins/datapicker/datepicker3.css" rel="stylesheet" />
</head>
<body class="gray-bg">
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-10">
    <h2>导入员工数据 </h2>
  </div>
</div>
<!--<div class="wraper wrapper-content">
  <div class="ibox float-e-margins">
    <div class="ibox-title">
	  <div class="row">
	    <form id="my_form" action="<?php echo U('user/userset/data_import');?>" method="post" enctype="multipart/form-data">
        <div class="col-md-7">
        </div>
        <div class="col-md-5">
          <div class="row">
            <div class="col-md-2" style="text-align: right;"> <b style="line-height: 35px;color: #18a689;">文件:</b> </div>
            <div class="col-md-3 ">
              <input name="data" type="file" value=""/>
            </div>
			<div class="col-md-2">
				<input type="button" id="daoru" value="导入" class="btn btn-primary"/>
              &lt;!&ndash;<button id="btnSearch" type="button" class="btn btn-primary">导入</button>&ndash;&gt;
            </div>
          </div>
        </div>
		</form>
      </div>
    </div>

  </div>
</div>-->

<div class="wraper wrapper-content">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <div class="row">
                <div class="col-md-2">
                    <form id="my_form"  action="<?php echo U('user/userset/data_import');?>" method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            <input name="data" type="file" value="" style="width:200px"/>
                            <div class="input-group-btn">
                                <input type="button" id= "daoru" value="导入" class="btn btn-primary"/>
                            </div>
                        </div>
                    </form>
                    <div class="input-group-btn">
                        <a href="<?php echo $_SERVER['HOST'] ?>/dataFormat_bd.xlsx" class="btn btn-sm btn-primary">下载模板</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="/static/common/inspinia/js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="/static/common/inspinia/js/plugins/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript" src="/static/common/inspinia/js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/static/common/inspinia/js/plugins/datapicker/datepicker-unixtime.js"></script>
<script type="text/javascript" src="/static/common/inspinia/js/ncommon.js"></script>
</body>
<script>
	$(document).ready(function(){
		$(".date").datepicker();
	})
</script>

</html>

<script type="text/javascript">
    $("#daoru").on('click',function(){
        var file = $('input[name=data]').val(); 

        if(file == ""){
            alert("请选择上传文件！"); 
            return false; 
        }

        var index1=file.lastIndexOf(".");
        var index2=file.length;
        var file_name=file.substring(index1,index2);//后缀名

        var arr = ['.xls','.xlsx'];
        if($.inArray(file_name,arr) == -1){ 
            alert("请上传Excel表格！"); 
            return false; 
        }

        $('#my_form').submit();
      
    });



  function progress(){
      layer.open({
          type: 1,
          area: ['400px', '200px'],
          shadeClose: false, //点击遮罩关闭
          content: '\<\p id="content">\<\/p>\<\div class="progress">\<\div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:0%;" id="progress">\<\/div>\<\/div>'
      });
  }
</script>