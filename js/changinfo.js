function set(type){
    var data={};
    switch(type){
        case 1:data.rank=$('#rank').val();break;
        case 2:data.realname=$('#realname').val();data.peoid=$('#peoid').val();
            if (data.realname==''&&data.peoid==''){
                alert('请输入真实姓名!');
                $('#realname')[0].focus();
                return false;
            }
            if (data.peoid.length!=18){
                alert('请输入正确身份证号!');
                $('#peoid')[0].focus();
                return false;
            }
            break;
        case 3:if (form.psw.value!=form.rep.value){
                $(form.rep).next('span').html('两次输入的密码需要一致');
                form.rep.focus();
                return false;
            }
            if (form.psw.value.length<5){
                $(form.rep).next('span').html('密码至少要有5位');
                form.psw.focus();
                return false;
            }
            data=$('#form1').serialize();
            break;
        case 4:data=$('#form2').serialize();break;
        default:return false;
    }
    $.post('/user/changeinfo/'+type,data,function(data){
        if (data=='ok'){
            alert('操作成功！');
            switch(type){
                case 2:$('#once').remove();$('#realname').attr('readonly','true');$('#peoid').attr('readonly','true');break;
                case 3:form.reset();break;
                case 4:$('#form2')[0].reset();break;
                default:break;
            }
        }else alert(data);
    });
    return false;
}