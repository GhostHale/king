<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="/css/back.css">
	<link rel="stylesheet" type="text/css" href="/css/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="/css/themes/icon.css">
	<script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/js/jquery.easyui.min.js"></script>
	<script type="text/javascript">$(document).ready(function (){
    $('#add').dialog({title:'添加管理员',closed:true,buttons:[{text:'完成',iconCls:'icon-ok',handler:function(){
        if (form.user.value.length==0||form.psw.value.length==0){
            $.messager.alert('警告','请完成表格','error');
            return false;
        }
        $.post('/doadmin/addadmin',$('form').serialize(),function(d){
            if (d=='ok'){
                $.messager.alert('信息','添加成功！','info',function(){location.reload();});
            }else $.messager.alert('警告',d,'warning');
        });
    }},{text:'取消',handler:function(){
        $('#add').window('close');
    }}]});
    $("#table").datagrid({
    nowrap : true,
    striped : true,
    border : true,
    collapsible : false, //是否可折叠的
    fit : false, //自动大小
    rownumbers: true,   //行号
    showFooter: false,  //显示底部
    toolbar : [{
            text : "添加管理员",
            iconCls : "icon-add",
            handler : function() {
                $('#add').window('open');
            }},'-',{
            text : "修改密码",
            iconCls : "icon-edit",
            handler : mod},{
            text : "删除用户",
            iconCls : "icon-remove",
            handler : del}]
    });
});
function mod(){
    var n=getName();
    if (n)
        $.messager.prompt('提示', '请输入新密码！',function(r){
            if (r) $.post('/doadmin/setpsw',{user:n,psw:r},function(d){
                if (d=='ok'){
                    $.messager.alert('信息','修改成功！','info');
                }else $.messager.alert('警告',d,'warning');
            });
        });
}
function del(){
    var n=getName();
    if (n)
        $.post('/doadmin/deladmin',{user:n},function(d){
            if (d=='ok'){
                $.messager.alert('信息','删除成功！','info',function(){location.reload();});
                //$('#add').datagrid('deleteRow',$('#add').datagrid('getSelected'));
            }else $.messager.alert('警告',d,'warning');
        });
}
function getName() {
    var row=$("#table").datagrid('getSelected');
    if (row==null){
        $.messager.alert('提示','请选择一个用户！','warning');
        return false;
    }else return row.name;
}</script>
</head>
<div id="add" style="padding:12px 12px 12px 12px"><form name="form" onsubmit="return false;">
    用户名：<input name="user" type="text" maxlength="16" /><br /><br />
    密码&nbsp;&nbsp;：<input name="psw" type="password" />
</form></div>
<div id="main">	
	<div id="content">
		<div class="content_top">
			<p><a href="">后台管理</a><a href="">> 用户管理</a></p>
		</div>
        <table id="table">
            <thead><tr>
                <th data-options="field:'name',width:'15%',align:'center'">用户名</th>
                <th data-options="field:'ttime',width:'22%',align:'center'">最近一次登陆时间</th>
                <th data-options="field:'tip',width:'20%',align:'center'">登陆IP</th>
                <th data-options="field:'ltime',width:'22%',align:'center'">上一次登陆时间</th>
                <th data-options="field:'lip',width:'20%',align:'center'">登陆IP</th>
                </tr></thead>
            <tbody><?php foreach($data as $name=>$value):?>
                <tr><td><?=$name?></td><td><?=$value['t']['time']?></td><td><?=$value['t']['ip']?></td><td><?=$value['l']['time']?></td><td><?=$value['l']['ip']?></td></tr>
            <?php endforeach;?></tbody>
        </table>
    </div>
</div>
</body>
<script type="text/javascript" src="/js/admin.js"></script>
</html>