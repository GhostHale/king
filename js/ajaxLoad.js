/**
 * @author Small
 */
$(document).ready(function(){
    var v=navigator.appVersion;
    var num=v.indexOf('MSIE');
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