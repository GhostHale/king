<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="/css/back.css">
	<link rel="stylesheet" type="text/css" href="/css/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="/css/themes/icon.css">
	<script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/js/jquery.easyui.min.js"></script>
	<script type="text/javascript">
$(document).ready(function (){
    $("#table").datagrid({
    nowrap : true,
    striped : true,
    border : true,
    collapsible : false, //是否可折叠的
    fit : false, //自动大小
    loadMsg : '载入中...',
    pagination: true,   //分页控件
    rownumbers: true,   //行号
    showFooter: false,  //显示底部
    pageSize: 10,       //每页显示的记录条数，默认为10
    pageList: [5, 10, 15, 20, 25, 30 ], //可以设置每页记录条数的列表
    url:location.href,
    sortName: 'begin',  //排序列名
    sortOrder: 'desc',  //排序规则
    columns : [[
        {
        field: 'user',
        title: '用户名',
        width:'25%',
        align: 'center'
        },{
        field: 'name',
        title: '昵称',
        width:'25%',
        align: 'center'
        },{
        field : 'begin',
        title : '账号激活时间',
        width:'20%',
        align : 'center'
        },{
        field : 'pid',
        title : '查看信息',
        width:'10%',
        align : 'center',
        formatter : function(value, row, index) {
            return '<a target="_blank" href="/bbs/main/userinfo/'+value+'">详细信息</a>';
        }},{
        field : 'rank',
        title : '操作',
        width:'19%',
        align : 'center',
        formatter : function(value, row, index) {
            var is=(value==0)?'':' checked="checked"';
            return '<input type="checkbox" onclick="send('+row.pid+',this)"'+is+'>是否为版主';
        }}
    ]]});
    var page = $("#table").datagrid('getPager');
    page.pagination({
        beforePageText: '第', //页数文本框前显示的汉字
        afterPageText: '页 共 <b>{pages}</b> 页',
        displayMsg: '当前显示 <b>{from}-{to}</b> 条记录 共 <b>{total}</b> 条记录'
    });
});
function send(id,e){
    var rank=0;
    if (e.checked) rank=1;
    $.post('/bbs/admin/setrank',{pid:id,rank:rank},function(d){
        if (d=='ok') $.messager.alert('消息：','操作成功！','info');
        else $.messager.alert('警告：',d,'warning');
    });
}</script>
</head>
<body style="background-color:#fff;">
<div id="main">	
	<div id="content">
		<div class="content_top">
			<p><a href="">后台管理</a><a href="">> 掌金论坛</a></p>
			<div class="search">
				<input class="easyui-searchbox" data-options="prompt:'请输入关键字',searcher:doSearch" style="width:300px"/>
			</div>
		</div>
        <table id="table"></table>
    </div>
</div>
</body>
<script type="text/javascript" src="/js/admin.js"></script>
</html>