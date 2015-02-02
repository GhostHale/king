/**
 * @author Small
 */
function delHtmlTag(str)
{
    var str=str.replace(/<\/?[^>]*>/gim,"");//去掉所有的html标记
    var result=str.replace(/(^\s+)|(\s+$)/g,"");//去掉前后空格
    return  result.replace(/\s/g,"");//去除文章中间空格
}
$(function(){
    var h=$('.art_box').height()+200;
    var aReply=$('.reply');
    var oInput=$('#comment_input');
    aReply.click(function(){
        var b=this.parentNode.parentNode;
        var m=$(b).find('.com_value').html();
        if(m.length>50)
        {
           m=m.substr(0,50);
        }
        m=delHtmlTag(m);
        oInput[0].value='回复：'+m+'...';
        scrollTo(0,h);
    });
});
function showData(data){
    var res='';
    var tou='';
    for (data in x){
        switch (data[x].tou){
            case 1:tou='/upload/pic/'+data[x].id+'tou'+'.jpg';break;
            case 2:tou='/upload/pic/'+data[x].id+'tou'+'.jpeg';break;
            case 3:tou='/upload/pic/'+data[x].id+'tou'+'.png';break;
            default:tou='/images/person.png';
        }
        res+='<li><div class="usr_left"><div class="usr_photo"><img src="'+tou+'"></div></div>';
        res+='<div class="usr_right"><p class="usr_inf"><span class="usr_name"></span>'+data[x].name+'<span>'+data[x].time+'</span></p>';
        res+='<div class="commentTxt">'+data[x].content+'</div>';
        res+='<div class="opt_box"><span class="opt" onclick="zan('+data[x].rid+')">('+data[x].agree+')</span><span class="reply" onclick="rep('+data[x].rid+')">回复</span></div>';
        res+='</div></li>';
    }
    $('#comment').html(res);
}
function zan(id){
    $.get('/bbs/main/zan/'+id,'',function(d){
        if (d=='ok'){
            $(this).addClass('fuck');
            alert('ok');
        }else alert(d);
    });
}
function sub(){
    if (form.content.value.length==0){
        alert('请输入内容！');
        form.content.focus();
        return false;
    }
    $.post(location.href,$(form).serialize(),function(d){
        if (d.state==0) alert(d.info);
        else{
            alert('发表成功！');
            loadPage(d.info);
            location.href='#'+d.info;
            form.reply.value='';
        }
    },'json');
    return false;
}
