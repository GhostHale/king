$(document).ready(function(){
    var v=navigator.appVersion;
    var num=v.indexOf('MSIE');
    param={};
    if (num>0){
        v=v.substr(num+5,1);
        if (v>1&&v<=7){
            nowurl=location.href;
            setInterval('forOld()',250);
            forOld();
            return;
        }
    }
    url=location.href;
    if (url.indexOf('#')==-1) loadPage('1');
    else loadPage(url.substr(url.indexOf('#')+1));
    $(window).bind('hashchange',loadPage);
});
function forOld(){//处理老版本返回事件
    if (nowurl==location.href) return;
    nowurl=location.href;
    if (nowurl.indexOf('#')==-1) loadPage('1');
    else loadPage(nowurl.substr(nowurl.indexOf('#')+1));
}
function loadPage(p){
    beforeLoad();
    if (typeof(p)=='string'){
        param.page=p;
    }else param.page=location.hash.substr(1);
    if (typeof(url)=='undefined') url=location.href;
    $.post(url,param,function(res){
        if (res.page>1) $('#pages').html(writePages(res.page,parseInt(page)));
        else $('#pages').html('');
        showData(res.data);
    },'json');
}
function writePages(page,now){
    var res='<a href="#'+1+' class="btn_page1">首页</a><a href="#'+(now-1)+' class="btn_page2 btn_page1">上一页</a>';
    var omi='<li>...</li>';
    if (num <= 5){
        for (a = 1; a <= num; a++)
            if (a == now)
                res+='<li>'+a+'</li>';
            else
                res+=jump(a);
    }else if (now >= 3) {
        res+=jump(1)+omi;
        res+=jump(now - 1);
        res+='<li>'+now+'</li>';
        if (num > now) {
            res+=jump(now + 1);
            if (num - now > 2)
                res+=omi+jump(num);
            else if (num - g_page == 2)
                res+=jump(num);
        }
    } else {
        for (a = 1; a <= 3; a++) {
            if (a == now)
                res+='<li>'+a+'</li>';
            else
                res+=jump(a);
        }
        res+='<li>...</li>'+jump(num);
    }
    return res+'<a href="#'+(now+1)+' class="btn_page2 btn_page1">下一页</a><a href="#'+page+' class="btn_page1">末页</a>';
}
function jump(page){
    return '<li><a href="#'+page+'">'+page+'</a></li>';
}