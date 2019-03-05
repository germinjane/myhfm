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
</head>
<body class="gray-bg">
	
	<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h2>添加用户</h2>
                </div>
                <div class="ibox-content">
                    <div class="row m-t">
                        <div class="col-md-12">
                            <form class="form-horizontal" action="/admin/user/add_user/" method="post" >
                                <div class="form-group">
                                    <label class="col-md-2 control-label">用户名:</label>
                                    <div class="col-md-6">
                                    	<input type="taxt" class="form-control input-sm" placeholder="用户名" id="username" name="username">
                                        <br/>
										<p style="color: red;">密码默认：123456</p>
                                    </div>
                                  
                                   
                                </div>
                                 <div class="form-group">
                                    <label class="col-md-2 control-label">授权时间:</label>
                                    <div class="col-md-6 date">
                                    	
                                    <div class="input-group date"> <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
                <input type="text" class="form-control datePicker" name="last_time" style="color: red;"  id="last_time" placeholder="授权时间">
              </div>
                                  
                              </div>        
                                </div>
                                
                                 <div class="form-group">
                                    <label class="col-md-2 control-label">备注:</label>
                                    <div class="col-md-6">
                                    	<input type="taxt" class="form-control input-sm" placeholder="备注" id="beizhu" name="beizhu">
                       
                                    </div>
                                  
                                   
                                </div>
                                 <div class="hr-line-dashed"></div>
                                 <div class="form-group">
                                 <p align="center"><button type="submit" class="btn btn-primary">保存</button></p></div>
                            </form>
	                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/static/common/inspinia/js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="/static/common/inspinia/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/static/common/base/js/fyinit.js"></script>
<script type="text/javascript" src="/static/common/base/js/fycommon.js"></script>
<script type="text/javascript" src="/static/common/inspinia/js/plugins/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript" src="/static/common/inspinia/js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/static/common/inspinia/js/plugins/datapicker/datepicker-unixtime.js"></script>
<script type="text/javascript">
$(function () {
	$(".date").datepicker();
	
			
		
});
</script>
</html>