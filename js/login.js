/*$('.interface ul li').on('click',function(){
	$('.on_btn').removeClass('on_btn');
	if($(this).attr('class')=='login_btn'){
		$('.login_interface').css('display','block');
		$('.register_interface').css('display','none');
	}else{
		$('.login_interface').css('display','none');
		$('.register_interface').css('display','block');
	}
	$(this).addClass('on_btn');
});*/
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
    location.href = "/user/register";
});

//登录成功后
function login(){
    $.post('/user/login',$('#login').serialize(),function(data){
        if (data.state==1){
            alert('登录成功！');
            $('#header .login_register').html("<li class='quit' style='border-right: 1px dashed #979797;'><a href='/user/logout'>退出</a></li><li>Welcome back,<a href='/user/me'>"+data.name+"</li></a>");
            $('.close').click();
        }else alert(data.error);
    },'json');
    return false;
}