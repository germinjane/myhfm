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
                    <h2>添加员工</h2>
                </div>
                <div class="ibox-content">
                    <div class="row m-t">
                        <div class="col-md-12">
                            <form class="form-horizontal" action="/user/userset/add_user/" method="post" >
                                <div class="form-group">
                                    <label class="col-md-2 control-label">姓名:</label>
                                    <div class="col-md-6">
                                    	<input type="taxt" class="form-control input-sm" placeholder="姓名" id="name" name="name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">性别:</label>
                                    <div class="col-md-6">
                                        男：<input type="radio"  id="sex" name="sex" value="1">
                                        女：<input type="radio"  id="sex" name="sex" value="2">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">是否在岗:</label>
                                    <div class="col-md-6">
                                        在岗：<input type="radio"  id="is_leave" name="is_leave" value="1">
                                        离职：<input type="radio"  id="is_leave" name="is_leave" value="2">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">所属团队:</label>
                                    <div class="col-md-6">
                                        <input type="taxt" class="form-control input-sm" placeholder="所属团队" id="team" name="team">
                                    </div>
                                </div>

                                  <div class="form-group">
                                    <label class="col-md-2 control-label">电话:</label>
                                    <div class="col-md-6">
                                        <input type="taxt" class="form-control input-sm" placeholder="电话" id="tel" name="tel">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">身份证号码:</label>
                                    <div class="col-md-6">
                                        <input type="taxt" class="form-control input-sm" placeholder="身份证号码" id="card" name="card">
                                    </div>
                                </div>

                               <!--   <div class="form-group">
                                    <label class="col-md-2 control-label">微信:</label>
                                    <div class="col-md-6">
                                        <input type="taxt" class="form-control input-sm" placeholder="微信" id="wechat" name="wechat">
                                    </div>
                                </div>

                                   <div class="form-group">
                                    <label class="col-md-2 control-label">qq:</label>
                                    <div class="col-md-6">
                                        <input type="taxt" class="form-control input-sm" placeholder="qq" id="qq" name="qq">
                                    </div>
                                </div>

                                  <div class="form-group">
                                    <label class="col-md-2 control-label">职位:</label>
                                    <div class="col-md-6">
                                        <input type="taxt" class="form-control input-sm" placeholder="职位" id="job" name="job">
                                    </div>
                                </div>-->

                                <!-- <div class="form-group">
                                    <label class="col-md-2 control-label">所在部门:</label>
                                    <div class="col-md-6">
                                        <input type="taxt" class="form-control input-sm" placeholder="所在部门" id="department" name="department">
                                    </div>
                                </div> -->

                                  <div class="form-group">
                                    <label class="col-md-2 control-label">备注:</label>
                                    <div class="col-md-6">
                                        <input type="taxt" class="form-control input-sm" placeholder="备注" id="remark" name="remark">
                       
                                    </div>
                                  
                                   
                                </div>

                                 <div class="form-group">
                                    <label class="col-md-2 control-label">入职时间:</label>
                                    <div class="col-md-6 date">
                                    	
                                    <div class="input-group date"> <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
                                        <input type="text" class="form-control datePicker" name="hiredate" style="color: red;"  id="hiredate" placeholder="入职时间">
                                      </div>
                                  
                              </div>        
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">离职时间:</label>
                                    <div class="col-md-6 date">

                                        <div class="input-group date"> <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
                                            <input type="text" class="form-control datePicker" name="leave_time" style="color: red;"  id="leave" placeholder="离职时间" >
                                        </div>

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