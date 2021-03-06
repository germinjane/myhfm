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
			<h2 class="col-md-3">员工花名册</h2>
			<h2 class="col-md-6">
				<a href="/admin/staff/add_staff/" class="btn btn-primary">添加员工</a>
				&nbsp;
				<a href="/admin/staff/del_staff/id/<?php echo ($v['id']); ?>/" class="btn btn-primary">导入EXCEL</a>
				&nbsp;
				<a href="/admin/staff/edit_staff/id/<?php echo ($v['id']); ?>/" class="btn btn-primary">导出EXCEL</a>

			</h2>

		</div>

	</div>
	<div class="wraper wrapper-content">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<div class="row">
					
					
					<div class="">
                     <form class="form-horizontal" action="/admin/staff/staff_list/" method="post" >
						<div class="input-group">

							<div class=" check_box input-group date">
								<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
								<input type="text" class="form-control datePicker" name="start_date" style="color: red;"  id="start_date" placeholder="选择入职起始日期">
							</div>

							<div class="check_box input-group date">
								<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
								<input type="text" class="form-control datePicker" name="end_date" style="color: red;"  id="end_date" placeholder="选择入职截止日期">
							</div>

							<div>
								<input type="text" class=" form-control input-sm pull-left col-lg-4" placeholder="姓名"  value="<?php echo ($name); ?>" id="name" name="name">

								<input type="text" class=" form-control input-sm pull-left col-lg-4" placeholder="身份证"  value="<?php echo ($card); ?>" id="card" name="card">

								<input type="text" class=" form-control input-sm" placeholder="团队"  value="<?php echo ($team); ?>" id="team" name="team">

								<input type="text" class=" form-control input-sm" placeholder="电话"  value="<?php echo ($tel); ?>" id="tel" name="tel">
							</div>


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
							<td><?php echo ($v["team"]); ?></td>
							<td><?php echo ($v["name"]); ?></td>
							<td><?php if($v["sex"] == 1): ?>男<?php else: ?>女<?php endif; ?></td>
							<td><?php echo ($v["card"]); ?></td>
							<td><?php echo ($v["tel"]); ?></td>
							<td><?php echo ($v["hiredate"]); ?></td>
							<td><?php if($v["is_leave"] == 1): ?>在职<?php else: ?>离岗<?php endif; ?></td>
							<td><?php echo ($v["leave_time"]); ?></td>
							<td><?php echo ($v["remark"]); ?></td>
							<td><a href="/admin/staff/edit_staff/id/<?php echo ($v['id']); ?>/" class="btn btn-primary">修改</a>&nbsp;<a href="javascript:void(0)" ids="<?php echo ($v['id']); ?>" class="btn btn-primary del-staff">删除</a></td>

						</tr><?php endforeach; endif; else: echo "" ;endif; ?>

					</tbody>
				</table>
				<div class="result page pull-right"><?php echo ($page); ?></div>
				
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