jQuery.cookie = function(name, value, options) {
    if (typeof value != 'undefined') { // name and value given, set cookie
        options = options || {};
        if (value === null) {
            value = '';
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
        }
        var path = options.path ? '; path=' + options.path : '';
        var domain = options.domain ? '; domain=' + options.domain : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else { // only name given, get cookie
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                // Does this cookie string begin with the name we want?
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
};

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
function reg_btn(){
    $('#register .button').val("发送验证码到手机");
    $('#register .button').on('click',function(){
        $('#register .button').unbind('click');
        var timer = setInterval('time()',1000);
    });
}
var i = 60;
var timer;
function time(){
    i -= 1;
    if (i == 0) {
       clearInterval(timer);
        reg_btn();
    }else{
        $('#register .button').val(i+"秒后再次点击");
    }
}
$('#register .button').on('click',function(){
    $('#register .button').unbind('click');
    timer = setInterval('time()',1000);
});

$('.register').on('click',function(){
    location.href = "/user/register";
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

//初始化页面时验证是否记住了密码 
$(document).ready(function() { 
    if ($.cookie("rmbUser") == "true") { 
        $("#login_register .checkbox input").attr("checked", true); 
        $("#login_register .userName").val($.cookie("userName")); 
        $("#login_register .password").val($.cookie("passWord")); 
    } 
}); 
//保存用户信息 
function saveUserInfo() {
    if ($("#login_register .checkbox input").attr("checked") == 'checked') { 
        var userName = $("#login_register .username input").val(); 
        var passWord = $("#login_register .password input").val(); 
        $.cookie("rmbUser", "true", { expires: 7 }); // 存储一个带7天期限的 cookie 
        $.cookie("userName", userName, { expires: 7 }); // 存储一个带7天期限的 cookie 
        $.cookie("passWord", passWord, { expires: 7 }); // 存储一个带7天期限的 cookie 
    } 
    else { 
        $.cookie("rmbUser", "false", { expires: -1 }); 
        $.cookie("userName", '', { expires: -1 }); 
        $.cookie("passWord", '', { expires: -1 }); 
    } 
} 
$('#login_register .login_interface .submit').on('click',saveUserInfo);
