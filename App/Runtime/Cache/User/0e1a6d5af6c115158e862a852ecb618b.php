<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<meta charset="utf-8" />

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" content="{fy_:config('site_description')}" />

	<meta name="keywords" content="{fy_:config('site_keyword')}" />

	<title名药汇员工花名册系统--持续更新</title>

	<link href="/static/common/inspinia/css/bootstrap.min.css" rel="stylesheet" />

	<link href="/static/common/inspinia/font-awesome/css/font-awesome.min.css" rel="stylesheet" />

	<link href="/static/common/inspinia/css/style.min.css" rel="stylesheet" />

	<link href="/static/common/inspinia/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

</head>

<body class="gray-bg">

	<div class="loginColumns" style="max-width: 400px;">

		<div class="row">

			<div class="col-md-12">

				<div class="ibox-content">

					<h2 class="text-center">名药汇员工花名册系统</h2>

					<h1 class="text-center">- 登陆 -</h1>

					<form name="theForm" id="theForm" class="m-t-lg" role="form" method="POST">

						<div class="form-group">

							<input name="username" type="text" class="form-control" placeholder="请输入用户名" required="">

						</div>

						<div class="form-group">

							<input name="password" type="password" class="form-control" placeholder="请输入密码" required="">

						</div>

						<div class="form-code-box">

							<div class="row">

								<div class="col-md-4">

									<input type="text" class="form-control" placeholder="验证码" required="" name="vertify">

								</div>

								<div class="col-md-8">

									<img src="<?php echo U('user/login/vertify');?>" style="width:70px;" id="imgVerify" alt="" onClick="fleshVerify()">

									<a class="btn btn-xs btn-link" style="padding: 5px 5px;" href="javascript:void(0);" onclick="fleshVerify();">看不清,换一张</a>

								</div>

							</div>

						</div>

						<div id="error" style="clear:both;text-align:center;margin-top:10px;color:#F00;font-weight:bold;font-size:14px;">

						</div>

						<div class="hr-line-dashed"></div>

							<button type="button" class="btn btn-primary block full-width m-t m-b" onClick="return login();" >登录</button>

							<a class="btn btn-sm btn-white btn-block">请联系下方客服申请使用</a>

					</form>

					<p class="m-t">

					客服QQ:<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=574582516&amp;site=qq&amp;menu=yes" rel="external nofollow" title="" target="_blank" data-original-title="联系QQ"><i class="qq fa fa-qq"></i>574582516</a>



					<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=574582516&amp;site=qq&amp;menu=yes" rel="external nofollow" title="" target="_blank" data-original-title="联系QQ"><i class="qq fa fa-qq"></i>574582516</a>



					<small class="text-left">©技术支持</small>

					</p>

				</div>

			</div>

		</div>

	</div>

<!-- Mainly scripts -->

<script type="text/javascript" src="/static/common/inspinia/js/jquery-2.1.1.js"></script>

<script type="text/javascript">

function login(){

	var username=true;

	var password=true;

	var vertify=true;

	if($('#theForm input[name=username]').val() == ''){

		$('#error').html('<span class="error">用户名不能为空!</span>');

		$('#theForm input[name=username]').focus();

		username = false;

		return false;

	}



	if($('#theForm input[name=password]').val() == ''){

		$('#error').html('<span class="error">密码不能为空!</span>');

		$('#theForm input[name=password]').focus();

		password = false;

		return false;

	}



	if($('#theForm input[name=vertify]').val() == ''){

		$('#error').html('<span class="error">验证码不能为空!</span>');

		$('#theForm input[name=vertify]').focus();

		vertify = false;

		return false;

	}

	if(vertify && $('#theForm input[name=username]').val() != '' && $('#theForm input[name=password]').val() != ''){

		$.ajax({

			async:false,

			url:"<?php echo U('user/login/login');?>",

			data:{'username':$('#theForm input[name=username]').val(),'password':$('#theForm input[name=password]').val(),vertify:$('#theForm input[name=vertify]').val()},

			type:'post',

			dataType:'json',

			success:function(res){

				if(res.status != 1){



					$('#error').html('<span class="error">'+res.msg+'!</span>');

					fleshVerify();

					username=false;

					password=false;

					return false;

				}else{

					top.location.href = res.jumpurl;

				}

			},

			error : function(XMLHttpRequest, textStatus, errorThrown) {

				$('#error').html('<span class="error">网络失败，请刷新页面后重试!</span>');

			}

		});

	}else{

		return false;

	}

}



function fleshVerify(){

	$('#imgVerify').attr('src','/user/login/vertify?rand='+Math.floor(Math.random()*100));//重载验证码

}



$(function(){

	fleshVerify();
	
	$(window).keydown(function(event){
		if(event.keyCode ==13){
			login();
		}
	})

});

</script>

</body>

</html>