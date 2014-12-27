function sub(){
    var val=form.user.value;
    if(val.length==0||val.length>=20){
        $($('.register_interface input')[0]).next().text('用户名需要在20字母以内');
        form.user.focus();
        return false;
    }else{
        if (val.search(/^([-a-z0-9_-])+$/i)==-1){
            $($('.register_interface input')[0]).next().text('用户名必须是数字、字母或下划线');
            form.user.focus();
            return false;
        }else{
            val=val.substr(0,1);
            if ((val>='a'&&val<='z')||(val>='A'&&val<='Z')){
                $($('.register_interface input')[0]).next().text('');
            }else{
                $($('.register_interface input')[0]).next().text('用户名必须以字母开头');
                form.user.focus();
                return false;
            }
        }
    }
    if($($('.register_interface input')[1]).val().search(/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/)==-1){
        $($('.register_interface input')[1]).next().text('请输入正确的EMAIL格式');
        return false;
    }else{
        $($('.register_interface input')[1]).next().text('');
    }
    if($($('.register_interface input')[2]).val().length != 11){
        $($('.register_interface input')[2]).next().text('请输入11位手机号');
        return false;
    }else{
        $($('.register_interface input')[2]).next().text('');
    }
    if($($('.register_interface input')[3]).val().length<5){
        $($('.register_interface input')[3]).next().text('密码至少需要5位');
        form.psw.focus();
        return false;
    }else{
        $($('.register_interface input')[3]).next().text('');
    }
    if($($('.register_interface input')[4]).val()!=$($('.register_interface input')[3]).val()){
        $($('.register_interface input')[4]).next().text('请正确输入密码');
        form.confirm_password.focus();
        return false;
    }else{
        $($('.register_interface input')[4]).next().text('');
    }
    if (form.code.value.length!=4){
        alert('请输入正确的手机验证码！');
        return false;
    }
    $.post(location.href,$(form).serialize(),function(data){
        if (data=='ok'){
            alert('注册成功！');
            location.href='/';
        }else alert(data);
    });
    return false;
}
function code(e){
    form.submit.disabled=!e.checked;
}
function reg_btn(){
    $('#register .button').val("发送验证码到手机");
    $('#register .button').on('click',function(){
        $('#register .button').unbind('click');
        var timer = setInterval('time()',1000);
    });
}
var i = 60;
var timer;
document.getElementById("check").checked=true;
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
