<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="{fy_:config('site_description')}" />
<meta name="keywords" content="{fy_:config('site_keyword')}" />
<title>名药汇员工花名册系统</title>
<link href="/static/common/inspinia/css/bootstrap.min.css" rel="stylesheet" />
<link href="/static/common/inspinia/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<link href="/static/common/inspinia/css/style.min.css" rel="stylesheet" />
</head>
<body class="pace-done">
<div id="grop">
  <div id="wrapper">
    <!--左侧导航-->
    <nav class="navbar-default navbar-static-side">
      <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
          <li class="nav-header">
            <div class="dropdown profile-element"> <span><img src="/static/common/inspinia/img/002.png" width="48" /></span> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> <span class="clear"> <span class="block m-t-xs"><strong class="font-bold">用户: <?php echo ($userinfo["username"]); ?></strong></span> </span> </a> </div>
          </li>
          <li> <a href="/admin/index/welcome.html" target="iframeContent"><i class="fa fa-dashboard"></i> <span class="nav-label">后台首页</span> </a> </li>
          <li> <a href="" target="iframeContent"><i class="fa fa-shopping-cart"></i> <span class="nav-label">用户管理</span> </a>
            <ul class="nav nav-second-level collapse">
                <li><a href="/admin/user/add_user.html" target="iframeContent">添加用户</a></li>
                <li><a href="/admin/user/user_list.html" target="iframeContent">用户管理</a></li>
            </ul>
          </li>
            <li> <a href="" target="iframeContent"><i class="fa fa-shopping-cart"></i> <span class="nav-label">职员管理</span> </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="/admin/staff/add_staff.html" target="iframeContent">添加职员</a></li>
                    <li><a href="/admin/staff/staff_list.html" target="iframeContent">职员管理</a></li>

                </ul>
            </li>

        </ul>
      </div>
    </nav>
  </div>
  <!--右侧内容-->
  <div id="page-wrapper" class="gray-bg" style="padding: 0">
    <!--顶部导航-->
    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0;background-color: #dadada;" id="frameHeader">
      <div class="navbar-header"> <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i></a> </div>
      <ul class="nav navbar-top-links navbar-right">
        <li> <span class="m-r-sm text-muted welcome-message" style="color: #1c84c6;">欢迎 <b style="color:#000000"><?php echo ($userinfo["username"]); ?></b> 使用本系统</span></li>
        
        <li> <a href="/admin/login/logout.html"> <i class="fa fa-sign-out"></i>退出 </a> </li>
      </ul>
    </nav>
    <!--页面内容-->
    <div id="frameContent" style="height: 800px;">
      <!--content这里加内容-->
      <iframe src="/admin/index/welcome.html" name="iframeContent" width="100%" height="100%" frameborder="0"> </iframe>
    </div>
    <!--页脚-->
    <div class="footer text-center" style="margin-bottom: 0" id="frameFooter">
      <div> <strong>&copy;技术支持</strong> </div>
    </div>
  </div>
</div>
</body>
<script type="text/javascript" src="/static/common/inspinia/js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="/static/common/inspinia/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script type="text/javascript" src="/static/common/inspinia/js/inspinia.js"></script>
<script type="text/javascript">
	function autoSize(){
		var winHeight=$(window).outerHeight();
		var headerHeight=$("#frameHeader").outerHeight(true);
		var footerHeight=$("#frameFooter").outerHeight(true);
		var contentHeight=winHeight-headerHeight-footerHeight;
		$("#frameContent").css("height",contentHeight+"px");
	}
	$(function(){
		$(window).resize(function(){
			autoSize();
		});
		autoSize();
	});
</script>
</html>