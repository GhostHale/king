$('.interface ul li').on('click',function(){
	$('.on_btn').removeClass('on_btn');
	if($(this).attr('class')=='login_btn'){
		$('.login_interface').css('display','block');
		$('.register_interface').css('display','none');
	}else{
		$('.login_interface').css('display','none');
		$('.register_interface').css('display','block');
	}
	$(this).addClass('on_btn');
});
$('.close').on('click',function(){
	$('#curtain').css('display','none');
	$('#login_register').css('display','none');
});
$('.login').on('click',function(){
	$('#curtain').css('display','block');
	$('#login_register').css('display','block');
	$('#login_register .login_interface').css('display','block');
	$('#login_register .login_interface').css('display','block');
	$('#login_register .register_interface').css('display','none');
	$('#login_register .on_btn').removeClass('on_btn');
	$('#login_register .login_btn').addClass('on_btn');
});
$('.register').on('click',function(){
});

$('.register_interface .submit').bind('click',function(event){
	var status1 = false;
	var status2 = false;
	var status3 = false;
	var status4 = false;
	var status5 = false;
	var status6 = false;
	$(function(){
    	if($($('.register_interface input')[0]).val()==""){
    	    $($('.register_interface input')[0]).next().text('请输入用户名');
    	}else{                  
        	status1=true;
        	$($('.register_interface input')[0]).next().text('');
    	}
    	if($($('.register_interface input')[1]).val().search(/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/)==-1){
    	    $($('.register_interface input')[1]).next().text('请输入正确的EMAIL格式');
    	}else{                  
        	status2=true;
        	$($('.register_interface input')[1]).next().text('');
    	}
    	if($($('.register_interface input')[2]).val().length != 11||$('input[name="phone"]').val() == ""){
    	    $($('.register_interface input')[2]).next().text('请输入11位手机号');
    	}else{                  
        	status3=true;
        	$($('.register_interface input')[2]).next().text('');
    	}
    	if($($('.register_interface input')[3]).val()==""){
    	    $($('.register_interface input')[3]).next().text('请输入密码');
    	}else{                  
        	status4=true;
        	$($('.register_interface input')[3]).next().text('');
    	}
    	if($($('.register_interface input')[4]).val()!=$($('.register_interface input')[3]).val()){
    	  	$($('.register_interface input')[4]).next().text('请正确输入密码');
    	}else{                  
        	status5=true;
        	$($('.register_interface input')[4]).next().text('');
    	}
    	if ($('.register_interface .checkbox input').attr('checked')) {
    		status6=true;
    	};
	});
	if (status1&&status2&&status3&&status4&&status5&&status6) {
		$('.register_interface .submit').submit();
	}else{
		event.preventDefault()
	}
});
