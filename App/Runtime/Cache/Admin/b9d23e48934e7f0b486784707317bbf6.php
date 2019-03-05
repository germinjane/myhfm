<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>名药汇员工花名册系统--持续更新</title>
	<link href="/static/common/inspinia/css/bootstrap.min.css" rel="stylesheet" />
	<link href="/static/common/inspinia/css/style.min.css" rel="stylesheet" />
		<link href="/static/common/inspinia/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="/static/common/inspinia/css/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
	<!-- datePicker -->
	<link href="/static/common/inspinia/css/plugins/datapicker/datepicker3.css" rel="stylesheet" />
	<style type="text/css">
		.check_box{ width: 14%; display: block;}
	</style>
	<script type="application/javascript">

	</script>
</head>
<body class="gray-bg">
	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-lg-10">
			<h2 class="col-md-3">导入员工数据</h2>
		</div>

	</div>
	<div class="wraper wrapper-content">
		<div class="ibox float-e-margins">

		<div class="col-md-12">
			<form  class="form-horizontal" action="/admin/staff/import_staff/" method="post" enctype="multipart/form-data">
				<div class="col-md-6 " style="width: 20%;float: left">

					<input type="file" name="excel" id="excel"/>
				</div>
				<div class="col-md-6" style="width: 20%">
					<button  class="btn btn-sm btn-primary" id="btnSearch" type="submit">导入</button>
				</div>
			</form>
		</div>
		<div>
			<div class="col-md-6" >
				<a  class="btn btn-primary">下载模板</a>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="/static/common/inspinia/js/jquery-2.1.1.js"></script>
	<script type="text/javascript" src="/static/common/base/js/fyinit.js"></script>
	<script type="text/javascript" src="/static/common/base/js/fycommon.js"></script>
	<script type="text/javascript" src="/static/common/inspinia/js/plugins/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript" src="/static/common/inspinia/js/plugins/datapicker/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="/static/common/inspinia/js/plugins/datapicker/datepicker-unixtime.js"></script>
</body>
<script>
	$(document).ready(function(){
		$(".date").datepicker();
		$(".del-staff").click(function(){
			var id = parseInt($(this).attr('ids'));

			if(confirm("确定要删除这个员工吗？")){
//				window.location.href = "/admin/staff/del_staff/id/"+id+"/";
//				console.log("id"+id);
				window.location.replace("/admin/staff/del_staff/id/"+id+"/");
			}else{
				console.log("good job!");
			}

		});

		function is_del(id){

		}


		
	})
</script>
</html>