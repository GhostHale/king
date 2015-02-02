/**
 * @author Small
 */
//自适应
var height = $(window).height();
var width = $(window).width();
$('#slider').css('height',height-75);
$(window).resize(function(){
    var height = $(window).height();
    var width = $(window).width();
    $('#slider').css('height',height-75);
    $('.content_top').css('width',width);
});
$('.content_top').css('width',width);
$('a').on('click',function(){
    return false;
});
//搜索
function doSearch(value){
    $("#table").datagrid({queryParams:{key:value}});
}