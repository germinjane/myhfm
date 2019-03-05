// JavaScript Document
$(function(){
	//翻页提交
	$("ul.pagination li a").click(function(){
		var page = $(this).attr('data-p');
		$("input[name='page']").val(page);
		$("form[name='search']").submit();
	});
	
	$("#btnSearch").click(function(){
		$('form[name=search]').submit();
	});
	
	$('#export').click(function(){
		$('#isexcel').val('1');
		$('form[name=search]').submit();
		$('#isexcel').val('0');
	});
});