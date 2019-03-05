$('#login').on('submit',function(){
	if($.trim($('#tel').val())==''){
		alert('请输入手机号码或电子邮箱！');
		$('#tel').focus();
		return false;
	}
	if($.trim($('#pwd').val())==''){
		alert('请输入密码！');
		$('#pwd').focus();
		return false;
	}
	alert('登录成功！')
})

$('#reg').on('submit',function(){
	if($.trim($('#tel').val())==''){
		alert('请输入手机号码或电子邮箱！');
		$('#tel').focus();
		return false;
	}
	if($.trim($('#yanzheng').val())==''){
		alert('请输入验证码！');
		$('#yanzheng').focus();
		return false;
	}
	if($.trim($('#pwd').val())==''){
		alert('请设置密码!');
		$('#pwd').focus();
		return false;
	}
	if($.trim($('#pwd').val()).length<6){
		alert('设置密码不少于6位数字或字母!');
		$('#pwd').focus();
		return false;
	}
	alert('注册成功！')
})

/*短信*/
var InterValObj; //timer变量，控制时间
var count = 60; //间隔函数，1秒执行
var curCount;//当前剩余秒数
function SetRemainTime() {
	if(curCount == 0){                
		window.clearInterval(InterValObj);//停止计时器
		$('#sendmsg').removeAttr("disabled");//启用按钮
		$('#sendmsg').val("重新发送验证码");
	}else{
		curCount--;
		$('#sendmsg').val(curCount + "秒内输入验证码");
	}
}

/*获取验证码*/
$('#sendmsg').on('click',function(){
	var mobile = $('#tel').val();
	
	if($.trim(mobile)==''){
		alert('请输入有效手机号码或电子邮箱！');
		$('#tel').focus();
		return false;
	}
	if(mobile.indexOf("@") > 0 ){
		if(!mobile.match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/))
		{
			alert("请输入有效手机号码或电子邮箱！");
			$('#tel').focus();
			return false;
		}
	}else{
		if(!validatemobile(mobile)){
		alert('请输入有效手机号码或电子邮箱！');
		$('#tel').focus();
		return false;
		}	
	}

	//发送短信验证码
	$.post('/mobile/login/to_code/',{mobile:mobile},function(msg){
		if(msg.status==1){
			
			curCount = count;
			$("#sendmsg").attr({"disabled":"disabled"});//关闭按钮
			$(this).val(curCount + "秒内输入验证码");
			InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
			alert('已发送！');
		}else{
			alert(msg.msgstr);
			if(msg.ttime>0){

				curCount = msg.ttime;
				$("#sendmsg").attr({"disabled":"disabled"});//关闭按钮
				$(this).val(curCount + "秒内输入验证码");
				InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
			}
		}
	});
})
/*注册*/
$('#registergo').on('click',function(){
	var mobile = $('#tel').val();
	var code   = $('#code').val();
	var pwd    = $('#pwd').val();
	
	if($.trim(mobile)==''){
		alert('请输入有效手机号码或电子邮箱！');
		$('#tel').focus();
		return false;
	}
	if(mobile.indexOf("@") > 0 ){
		if(!mobile.match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/))
		{
			alert("请输入有效手机号码或电子邮箱！");
			$('#tel').focus();
			return false;
		}
	}else{
		if(!validatemobile(mobile)){
		alert('请输入有效手机号码或电子邮箱！');
		$('#tel').focus();
		return false;
		}	
	}
	
	 if(code.length !=6) { 
	 
		 alert('请输入正确的验证码！');
		$('#code').focus();
		return false;
	 
	 }
	 if(pwd.length < 6) { 
	 
		 alert('请输入正确的密码！');
		$('#pwd').focus();
		return false;
	 }
	 
	$.post('/mobile/login/register/',{mobile:mobile,code:code,pwd:pwd},function(msg){
		if(msg.status==1){
			alert(msg.msgstr);
			window.location.href = "/mobile/usercenter/index/";
		}else{
			alert(msg.msgstr);
		}
	});
	
})



$('#resetpwd').on('submit',function(){
	if($.trim($('#tel').val())==''){
		alert('请输入手机号码或电子邮箱！');
		$('#tel').focus();
		return false;
	}
	if($.trim($('#yanzheng').val())==''){
		alert('请输入验证码！');
		$('#yanzheng').focus();
		return false;
	}
	if($.trim($('#pwd').val())==''){
		alert('请设置密码!');
		$('#pwd').focus();
		return false;
	}
	if($.trim($('#pwd').val()).length<6){
		alert('设置密码不少于6位数字或字母!');
		$('#pwd').focus();
		return false;
	}
	alert('注册成功！')
})


function SetRemainTime1() {
	if(curCount == 0){                
		window.clearInterval(InterValObj);//停止计时器
		$('#sendmsg1').removeAttr("disabled");//启用按钮
		$('#sendmsg1').val("重新发送验证码");
	}else{
		curCount--;
		$('#sendmsg1').val(curCount + "秒内输入验证码");
	}
}

/*重置密码*/
$('#sendmsg1').on('click',function(){
	var mobile = $('#tel').val();
	if($.trim(mobile)==''){
		alert('请输入有效手机号码或电子邮箱！');
		$('#tel').focus();
		return false;
	}
	if(mobile.indexOf("@") > 0 ){
		if(!mobile.match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/))
		{
			alert("请输入有效手机号码或电子邮箱！");
			$('#tel').focus();
			return false;
		}
	}else{
		if(!validatemobile(mobile)){
		alert('请输入有效手机号码或电子邮箱！');
		$('#tel').focus();
		return false;
		}	
	}
		
	//发送短信验证码
	$.post('/mobile/login/register_to_code/',{mobile:mobile},function(msg){
		if(msg.status==1){
			
			curCount = count;
			$("#sendmsg1").attr({"disabled":"disabled"});//关闭按钮
			$(this).val(curCount + "秒内输入验证码");
			InterValObj = window.setInterval(SetRemainTime1, 1000); //启动计时器，1秒执行一次
			alert('已发送！');
		}else{
			alert(msg.msgstr);
			if(msg.ttime>0){
				curCount = msg.ttime;
				$("#sendmsg1").attr({"disabled":"disabled"});//关闭按钮
				$(this).val(curCount + "秒内输入验证码");
				InterValObj = window.setInterval(SetRemainTime1, 1000); //启动计时器，1秒执行一次
			}
		}
	});
})

/*找回密码*/
$('#resetpwdgo').on('click',function(){
	var mobile = $('#tel').val();
	var code   = $('#code').val();
	var pwd    = $('#pwd').val();

	
	if($.trim(mobile)==''){
		alert('请输入有效手机号码或电子邮箱！');
		$('#tel').focus();
		return false;
	}
	if(mobile.indexOf("@") > 0 ){
		if(!mobile.match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/))
		{
			alert("请输入有效手机号码或电子邮箱！");
			$('#tel').focus();
			return false;
		}
	}else{
		if(!validatemobile(mobile)){
		alert('请输入有效手机号码或电子邮箱！');
		$('#tel').focus();
		return false;
		}	
	}
	
	 if(code.length !=6) { 
	 
		 alert('请输入正确的验证码！');
		$('#code').focus();
		return false;
	 
	 }
	 if(pwd.length < 6 ) { 
	 
		 alert('请输入正确的密码！');
		$('#pwd').focus();
		return false;
	 }
	 
	$.post('/mobile/login/resetpwd/',{mobile:mobile,code:code,pwd:pwd},function(msg){
		if(msg.status==1){
			alert(msg.msgstr);
			window.location.href = "/mobile/login/login/";
		}else{
			alert(msg.msgstr);
		}
	});
	
})

/*退出登录*/
$('.outlogin').on('click',function(){
	$.post('/mobile/login/loginout/','',function(msg){
		if(msg.status==1){
			alert(msg.msgstr);
			window.location.href = "/mobile/login/nologin/";
		}else{
			alert(msg.msgstr);
		}
	});
})	
$('.user-order .tabs li').on('click',function(){
	var index=$(this).index();
	$(this).addClass('on').siblings().removeClass('on');
	$('.user-order .tabs-item').eq(index).show().siblings().hide();
})

$('.user-order .dis-tabs a').on('click',function(){
	var index=$(this).index();
	$(this).addClass('on').siblings().removeClass('on');
	$('.user-order .dis-tabs-item').eq(index).show().siblings().hide();
})

var adressid=0;
$('.user-adress label').on('click',function(){
	$('.user-adress label i').removeClass('checked').find('input').attr('checked',false);
	$(this).find('i').addClass('checked').find('input').attr('checked',true);
	
	var id = $(this).attr('uid');
	if(adressid!=id){
		adressid=id;
		$.post('/mobile/usercenter/address_default/',{id:id},function(msg){
			if(msg.status==1){
				alert(msg.msgstr);
			}else{
				alert(msg.msgstr);
			}
		});
	}
	
})


$('#saveadress').on('click',function(){
	if($.trim($('#adressname').val())==''){
		alert('请输入收货人姓名！');
		$('#adressname').focus();
		return false;
	}
	if($.trim($('#adresstel').val())==''){
		alert('请输入手机号码！');
		$('#adresstel').focus();
		return false;
	}
	//if($.trim($('#diqu').val())==''){
//		alert('请输入所在地区！');
//		$('#diqu').focus();
//		return false;
//	}
	if($.trim($('#distr').val())==''){
		alert('请输入街道、小区门牌等详细地址!');
		$('#distr').focus();
		return false;
	}
	
	var adressname=$.trim($('#adressname').val());
	var adresstel=$.trim($('#adresstel').val());
	//var diqu=$.trim($('#diqu').val());
	var distr=$.trim($('#distr').val());
	
	var province=$.trim($('#province').val());
	var city=$.trim($('#city').val());
	var district=$.trim($('#district').val());
	
	$.post('/mobile/usercenter/address_add/',{adressname:adressname,adresstel:adresstel,province:province,city:city,district:district,distr:distr},function(msg){
		if(msg.status==1){
			alert(msg.msgstr);
			window.location.href = "/mobile/usercenter/address/";
		}else{
			alert(msg.msgstr);
		}
	});
})


$('.collect-goods .check').on('click',function(){
	if($(this).hasClass('checked')){
		$(this).removeClass('checked').find('input').attr('checked',false);
	}else{
		$(this).addClass('checked').find('input').attr('checked',true);
	}
})


$('.collect-goods .allcheck').on('click',function(){
	if($(this).hasClass('checked')){
		$(this).removeClass('checked').find('input').attr('checked',false);
		$('.collect-goods .check').removeClass('checked').find('input').attr('checked',false);
	}else{
		$(this).addClass('checked').find('input').attr('checked',true);
		$('.collect-goods .check').addClass('checked').find('input').attr('checked',true);
	}
})

//$('#date').date({theme:"datetime"});
$('.prop .bg').on('click',function(){
	$('.prop').fadeOut();
})
$('#name').on('click',function(){
	$('#name-box').fadeIn();
})
$('#name-box .confirm').on('click',function(){
	var name=$('#name-box input[name=name]').val();
	$('#name').html($('#name-box input[name=name]').val());
	$.post('/mobile/usercenter/account/',{name:name},function(msg){
		if(msg.status==1){
			alert(msg.msgstr);
		}else{
			alert(msg.msgstr);
		}
	});
	$('#name-box').fadeOut();
})
$('#sex').on('click',function(){
	$('#sex-box').fadeIn();
})
$('#sex-box li').on('click',function(){
	$(this).addClass('on').siblings().removeClass('on');
	$('#sex').html($('#sex-box input[name=sex]:checked').val());
	
	var ismale=$('#sex-box input[name=sex]:checked').val();
	$.post('/mobile/usercenter/account/',{ismale:ismale},function(msg){
		if(msg.status==1){
			alert(msg.msgstr);
		}else{
			alert(msg.msgstr);
		}
	});
	$('#sex-box').fadeOut();
})
$('#sex-box .chancel').on('click',function(){
	$('#sex-box').fadeOut();
})


//判断手机号
function validatemobile(mobile){
	if(mobile.length==0 || mobile.length!=11)
	{
		return false;
	}
	var myreg = /^1[34587]\d{9}$/;
	if(!myreg.test(mobile))
	{   
		return false;
	}
	return true;	
}