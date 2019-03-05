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
	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-lg-10">
			<h2>用户管理</h2>
		</div>
	</div>
	<div class="wraper wrapper-content">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<div class="row">
					
					
					<div class="col-md-3">
                     <form class="form-horizontal" action="/admin/user/user_list/" method="post" >
						<div class="input-group">
							<input type="text" class="form-control input-sm" placeholder="用户名"  value="<?php echo ($username); ?>" id="username" name="username">
							<div class="input-group-btn">
								<button class="btn btn-sm btn-primary" id="btnSearch" type="submit">搜索</button>
							</div>
						</div>
                        </form>
					</div>
					
				</div>
			</div>
		<div class="ibox-content">
			<div class="table-responsive">
            
            
            
				<table class="table table-condensed table-bordered  table-hover">
					<thead>
						<tr>
							<th>序号</th>
							<th>所属团队</th>
							<th>姓名</th>
							<th>性别</th>
							<th>身份证号码</th>
							<th>联系方式</th>
							<th>入职时间</th>
							<th>在职/离岗</th>
                            <th>离职时间</th>
                            <th>备注</th>
                            <th>操作</th>
						</tr>
					</thead>
                    
                    
                    
					<tbody>
                     <?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
							<td><?php echo ($v["id"]); ?></td>
							<td><?php echo ($v["username"]); ?></td>
							<td></td>
                        	<td><?php echo ($v["createtime"]); ?></td>
                        	<td></td>
                        <span class="badge badge-success"><?php echo ($v["last_time"]); ?></span>								</td>
                        
                         <td>
                         
                        <?php if($v["status"] == 1): ?><span class="badge badge-success">正常</span>	
                        <?php else: ?>
                        <span class="badge badge-error">禁用</span><?php endif; ?>
                        </td>
                        <td><?php echo ($v["beizhu"]); ?></td>
                        <td><a href="/admin/user/edit_user/id/<?php echo ($v['id']); ?>/" class="btn btn-primary">修改</a>&nbsp;<a href="/admin/user/del_user/id/<?php echo ($v['id']); ?>/" class="btn btn-primary">删除</a></td>
                        
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>						
								
						</tbody>
				</table>
				
			</div>
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
		
		
	})
</script>
</html>