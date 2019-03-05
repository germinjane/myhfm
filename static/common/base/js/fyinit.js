$(function(){
	$(".fydel").click(function(){
		var sUrl=$(this).attr("delurl");
		if(sUrl){
			fyAlert("确定删除数据","数据删除后无法恢复",function(){
				location.href=sUrl;
			},"warning",function(){});
		}
	});
	$("#btnSearch").click(function(){
		var sKey=$("#txtSearch").val();
		if(!sKey) return;
		var sUrl=$(this).attr("searchurl");
		location.href=sUrl+"?searchkey="+sKey;
	});
	$(".fyback").click(function(){
		var sUrl=$(this).attr("backurl");
		if(sUrl) location.href=sUrl;
		else history.back();
	});
	// 初始化在线编辑器
	if($(".ckeditor").length>0){
		CKEDITOR.replace($(".ckeditor").attr("name"),{
			filebrowserImageBrowseUrl: '/uploader/upload.php',
			filebrowserUploadUrl : "/home/index/ckupload.html?water=1"//$(".ckeditor").attr("upurl"),
		});
	}
	//初始化上传按钮
	$(".fyupload").click(function(){
		//打开上传对话框
		var sUrl=$(this).attr("uploadurl");
		//target是当前标签的一个属性，用于告知目标input框位置
		var sTargetId=$(this).attr("target");
		if(sUrl.indexOf("https://")==-1){
			sUrl="https://"+location.host+sUrl;
		}
		if(sUrl.indexOf("?")==-1) sUrl+="?dom="+sTargetId+"&r="+Math.random();
		else sUrl+="&dom="+sTargetId+"&r="+Math.random();
		fyDialog("上传文件",sUrl);
	});
	$(".fycopy").click(function(){
		var sTargetId=$(this).attr("target");
		var e=document.getElementById(sTargetId)
		e.select();
		document.execCommand("Copy");
	});
	//初始化图片预览
	//依赖:blueimp-gallery
	$(".fyimgpreview").click(function(){
		var sUrl=$("#"+$(this).attr("target")).val();
		fyImgPreview(sUrl);
	});
	//初始化从素材库选择
	$(".fygallery").click(function(){
		var sUrl=$(this).attr("galleryurl");
		//target是当前标签的一个属性，用于告知目标input框位置
		var sTargetId=$(this).attr("target");
		if(sUrl.indexOf("https://")==-1){
			sUrl="https://"+location.host+sUrl+"?dom="+sTargetId;
		}
        if(sUrl.indexOf("?")==-1) sUrl+="?dom="+sTargetId;
        else sUrl+="&dom="+sTargetId;
		fyDialog("素材库",sUrl,null,null,710,700);
	});
	// 地图初始化经纬度选择
	$(".fymap").click(function(){
		var sUrl=$(this).attr("mapurl");
		//target是当前标签的一个属性，用于告知目标input框位置
		var sLong=$(this).attr("longitude");
		var sLat=$(this).attr("latitude");
		var iLongVal=$("#"+$(this).attr("longitude")).val()||0;
		var iLatVal=$("#"+$(this).attr("latitude")).val()||0;
		var iWidth=$(this).attr("fywidth")||(function(){
				return $(window).outerWidth(true)-50;
			}).call();
		var iHeight=$(this).attr("fyheight")||(function(){
				return $(window).outerHeight(true)-50;
			}).call();
		sUrl+="?domlong="+sLong+"&domlat="+sLat+"&longval="+iLongVal+"&latval="+iLatVal;
		if(sUrl.indexOf("https://")==-1){
			sUrl="https://"+location.host+sUrl;
		}
		fyDialog("坐标选择",sUrl,null,null,iWidth,iHeight);
	});
});