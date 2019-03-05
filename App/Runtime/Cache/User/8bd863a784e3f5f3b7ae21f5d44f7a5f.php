<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>修改密码</title>
<link href="/static/common/inspinia/css/bootstrap.min.css" rel="stylesheet" />
<link href="/static/common/inspinia/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<link href="/static/common/inspinia/css/style.min.css" rel="stylesheet" />
<link href="/static/common/inspinia/css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">
</head>
<body class="gray-bg">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link href="__PUBLIC__/static/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="__PUBLIC__/static/js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/layer/layer.js"></script><!-- 弹窗js 参考文档 http://layer.layui.com/-->

<div class="wrapper wrapper-content">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox">
        <div class="ibox-title">
          <h2>修改密码</h2>
        </div>
        <div class="ibox-content">
          <div class="row m-t">
            <div class="col-md-12">
             <form class="form-horizontal" id="adminHandle" action="" method="post">
        		<input type="hidden" name="id" value="<?php echo ($data["id"]); ?>">
				<div class="form-group">
                  <label class="col-md-2 control-label">用户名:</label>
                  <div class="col-md-4"><b style="font-size:14px"><?php echo ($data["username"]); ?></b></div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">新密码:</label>
                  <div class="col-md-4">
				  	<input type="password" name="password" value="" class="form-control" placeholder="请输入新密码" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">重复新密码:</label>
                  <div class="col-md-4">
				  	<input type="password" name="repassword" value="" class="form-control" placeholder="请重复输入新密码" required="">
                  </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                  <label class="col-md-2 control-label"></label>
                  <div class="col-md-4">
                    <button type="button" class="btn btn-primary" onClick="adsubmit();">确认修改</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
<script type="text/javascript" src="/static/common/inspinia/js/jquery-2.1.1.js"></script>
<script type="text/javascript">
   // 判断输入框是否为空
function adsubmit(){
	var password = $.trim($('input[name=password]').val());
	var repassword = $.trim($('input[name=repassword]').val());
	if(password == ''){
		layer.alert('新密码不能为空！', {icon: 2,time: 1000});
		return false;
	}
	if(password.length < 6){
		layer.alert('新密码不能少于6位！', {icon: 2,time: 1000});
		return false;
	}
	if(repassword == ''){
		layer.alert('重复密码不能为空！', {icon: 2,time: 1000});
		return false;
	}
	if(repassword.length < 6){
		layer.alert('重复密码不能少于6位！', {icon: 2,time: 1000});
		return false;
	}
	if(password != repassword){
		layer.msg('两次密码不一致！', {icon: 2,time: 1000});
		return false;
	}
	$.post("<?php echo U('user/userset/updatepwd');?>",$("#adminHandle").serialize(),function(res){
		layer.alert(res.msg, {icon: 2,time: 1000});
		return false;
	});
}
</script>
</html>