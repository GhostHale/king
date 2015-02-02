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
    sortName: 'time',  //排序列名
    sortOrder: 'desc',  //排序规则
    columns : [[
        {
        field: 'title',
        title: '标题',
        align: 'center',
        sortable: true,
        formatter : function(value, row, index) {
            var tag='';
            if (value.length>10){
                tag=' title="'+value+'"';
                value=value.substr(0,10);
            }
            return '<span'+tag+'>'+value+'</span>';
        }},{
        field : 'pid',
        title : '发布人',
        sortable: true,
        align : 'center'
        },{
        field : 'total',
        title : '总金额',
        sortable: true,
        align : 'center'
        },{
        field : 'time',
        title : '发布时间',
        sortable: true,
        align : 'center'
        },{
        field : 'end',
        title : '结束日期',
        sortable: true,
        align : 'center'
        },{
        field : 'zid',
        title : '审核',
        align : 'center',
        formatter : function(value, row, index) {
            return '<a target="_blank" href="/zhong/admin/item/'+value+'">查看详细</a>';
        }}
    ]]});
    var page = $("#table").datagrid('getPager');
    page.pagination({
        beforePageText: '第', //页数文本框前显示的汉字
        afterPageText: '页 共 <b>{pages}</b> 页',
        displayMsg: '当前显示 <b>{from}-{to}</b> 条记录 共 <b>{total}</b> 条记录'
    });
});
</script>
</head>
<body style="background-color:#fff;">
<div id="main">	
	<div id="content">
		<div class="content_top">
			<p><a href="">后台管理</a><a href="">> 众筹管理</a><a href="">> 项目审核</a></p>
			<div class="search">
				<input class="easyui-searchbox" data-options="prompt:'请输入关键字',searcher:doSearch" style="width:300px"></input>
			</div>
		</div>
		<table id="table"></table>
	</div>
</div>
</body>
<script type="text/javascript" src="/js/admin.js"></script>
</html>