/**
 * @author Small
 */
sel=null;
function selFile(e){
    sel=e;
    form.file.click();
}
function changed(){
    $('.tips').html('请选择文件');
    $('.tips',sel).html(form.file.value);
}
function sub(id){
    if ($('.tips',this.parentNode).html()=='请选择文件'){
        alert('没有指定文件！');
        return false;
    }
    form.type.value=id;
    $('form').form('submit', {
        url:'/user/picup',
        success: function(data){
            if (data=='ok'){
                alert('上传成功！');
                $('.pro_state',sel.parentNode).html('已上传');
            }else alert(data);
        }
    });
    return false;
}