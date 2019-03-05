<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>名药汇员工花名册系统</title>
  <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="/static/layer/layer.js"></script>
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
    <h2>员工花名册
       <a style="margin-left: 30px;" href="/user/userset/add_user.html" target="iframeContent"><button class="btn btn-primary" >添加员工</button></a>
        <?php if($uid == 1): ?><button style="margin-left: 30px;" id="export" class="btn btn-primary">导出Excel</button><?php endif; ?>
      <a style="margin-left: 30px;" href="/user/userset/data_import.html" target="iframeContent"><button type="button"  class="btn btn-primary">导入Excel</button></a>
    </h2>
  </div>
  <!--<div class="progress">-->
    <!--<div class="progress-bar progress-bar-success" role="progressbar"-->
         <!--aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"-->
         <!--style="width: 0%;" id="progress">-->
        <!--<p id="content"></p>-->
    <!--</div>-->
  <!--</div>-->
</div>
<div class="wraper wrapper-content">
  <div class="ibox float-e-margins">
    <div class="ibox-title">
      <div class="row">
	  	<form action="" name="search" id="search" method="post">
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-1" style="text-align: right;"> <b style="line-height: 35px;color: #18a689;">日期:</b> </div>
            <div class="col-md-2">
              <div class="input-group date"> <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
                <input autocomplete="off" type="text" class="form-control datePicker" name="starttime" style="color: red;" value="<?php echo I(starttime)?I(starttime):$bdate;?>" id="setstarttime" placeholder="选择入职起始日期">
              </div>
            </div>
            <div class="col-md-2">
              <div class="input-group date">
                <input autocomplete="off" type="text" class="form-control datePicker" name="endtime" style="color: red;" value="<?php echo I('endtime')?I('endtime'):$edate;?>" id="setendtime" placeholder="选择入职截止日期">
                <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span> </div>
            </div>

            <div class="col-md-2" style="text-align: right;">
              <input class="form-control" type="text" name="name" value="<?php echo I('name')?I('name'):'';?>" placeholder="搜索姓名"> 
            </div>  

            <div class="col-md-3" style="text-align: right;">
                  <input class="form-control" type="text" name="card" value="<?php echo I('card')?I('card'):'';?>" placeholder="按身份证">
              </div>

              <div class="col-md-2" style="text-align: right;">
                  <input class="form-control" type="text" name="team" value="<?php echo I('team')?I('team'):'';?>" placeholder="所属团队">
              </div>

          </div>
        </div>
        <div class="col-md-2">
          <div class="input-group">
            <input type="text" name="tel" value="<?php echo I('tel')?I('tel'):'';?>" class="form-control input-sm" placeholder="搜索电话">
            <div class="input-group-btn">
              <button class="btn btn-sm btn-primary" id="btnSearch">查询</button>
            </div>
          </div>
        </div>
		<input type="hidden" name="page" value="1">
		<input type="hidden" name="isexcel" value="0" id="isexcel">
		</form>
      </div>
    </div>
    <div class="ibox-content">
      <div class="table-responsive">
        <table class="table table-hover table-condensed table-bordered">
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
            <!--  <th>微信</th>
              <th>QQ</th>
              <th>职位</th>-->
              <th>备注</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
        <?php $sex_arr= array('0'=>'未知','1'=>'男','2'=>'女') ?>
		  	<?php if(is_array($list)): $key = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><tr>
              <td><?php echo ($key); ?></td>
              <td><?php echo ($vo["team"]); ?></td>
                <td><?php echo ($vo["name"]); ?></td>
              <td><?php echo ($sex_arr[$vo[sex]]); ?></td>
                <td><?php echo ($vo["card"]); ?></td>
              <td><?php echo ($vo["tel"]); ?></td>
             <!-- <td><?php echo ($vo["wechat"]); ?></td>
              <td><?php echo ($vo["qq"]); ?></td>
              <td><?php echo ($vo["job"]); ?></td>-->
                <td><?php echo ($vo["hiredate"]); ?></td>
                <td><?php if($vo['is_leave'] == 1): ?>在岗<?php elseif($vo['is_leave'] == 2): ?>离职<?php else: ?>未知<?php endif; ?></td>
                <td><?php echo ($vo["leave_time"]); ?></td>
              <td><?php echo ($vo["remark"]); ?></td>
                <?php if($uid == 1): ?><td>
                        <a href="<?php echo U('user/userset/edit_user',array('id'=>$vo['id']));?>">修改</a>&nbsp;&nbsp;&nbsp;
                        <a class="del_user" data-id="<?php echo ($vo["id"]); ?>" data-name="<?php echo ($vo["name"]); ?>">删除</a>
                    </td>
                    <?php else: ?>
                    <td><a href="<?php echo U('user/userset/edit_user',array('id'=>$vo['id']));?>">修改</a></td><?php endif; ?>

            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          </tbody>
        </table>
        <div class="page-break">
		  <?php if(!empty($list)): ?><ul class="pagination">
            <?php echo ($pageshow); ?>
          </ul>
          <span style="float: right;"> 总记录数：<?php echo ($count); ?></span><?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
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

  var sort = parseInt("<?php echo ($sort); ?>");
  var type = "<?php echo ($order); ?>";
  function data_sort(obj){
      var sort_type = $(obj).attr('data-type');
      if(sort_type != type){
          type = sort_type;
          sort = 1;
      }else{
          sort += 1;
      }

      $("input[name='order']").val(type);
      $("input[name='sort']").val(sort);
      $("#search").submit();

  }

  $(".del_user").on('click',function(){
    debugger
      var id = $(this).data('id');
      var name =   $(this).data('name');
      if(confirm("确定删除"+name+"吗？")){
          $.ajax({
               type: "post",
               url: "<?php echo U('user/userset/del_user');?>",
               data: {'id':id,},
               dataType: "json",
               success: function(data){
                  alert(data.msg);
                  if(data.status == 1){
                    location.reload();
                  }
              }
            });
     }   
  });



  function progress(){
      layer.open({
          type: 1,
          area: ['400px', '200px'],
          shadeClose: true, //点击遮罩关闭
          content: '\<\p id="content">\<\/p>\<\div class="progress">\<\div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:0%;" id="progress">\<\/div>\<\/div>'
      });
  }
</script>