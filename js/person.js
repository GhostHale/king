/**
 * @author Small
 */
$(document).ready(function(){
    $('#banner').remove();
});
function change(e){
    $('.active').attr('class','');
    $('li',e).attr('class','active');
}
function loadPage(info) {
    if (typeof(info)!='string')
        info=location.hash.substr(1);
    $('.active').attr('class','');
    $("[href='#"+info+"']>li").attr('class','active');
    view.location.href='/user/me/'+info;
}