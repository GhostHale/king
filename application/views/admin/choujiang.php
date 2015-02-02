<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="/css/back.css">
	<link rel="stylesheet" type="text/css" href="/css/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="/css/themes/icon.css">
	<script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/js/jquery.easyui.min.js"></script>
</head>
<body style="background-color:#fff;">
<div id="main">	
	<div id="content">
		<div class="content_top">
			<p><a href="">后台管理</a><a href="">> 抽奖管理</a></p>
			<div class="search">
				<input class="easyui-searchbox" data-options="prompt:'请输入关键字',searcher:doSearch" style="width:300px"></input>
			</div>
		</div>
		<table id="tt" class="easyui-datagrid" style="width:100%;height:auto;">
			<thead>
				<tr>
					<th field="name1" width="5%">序号</th>
					<th field="name2" width="24%">抽奖活动名称</th>
					<th field="name3" width="13%">发布人</th>
					<th field="name4" width="19%">发布时间</th>
					<th field="name5" width="13%">已筹到</th>
					<th field="name6" width="13%">剩余时间</th>
					<th field="name7" width="13%" align="center">详细信息</th>
				</tr>                          
			</thead>                           
			<tbody>
				<tr>                           
					<td>Data 1</td>            
					<td>Data 2</td>            
					<td><a href="">xxx</a></td>            
					<td>Data 4</td> 
					<td>Data 5</td>            
					<td>Data 6</td>        
					<td><a href="">查看详情</a></td>       
				</tr> 
			</tbody>                         
		</table>
		<div style="float:right;width:630px;">
			<div class="easyui-panel" width="610px;">
				<div class="easyui-pagination" data-options=""></div>
			</div>
		</div>
	</div>
</div>
</body>
<script type="text/javascript">
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
		alert('You input: ' + value);
	}
	//添加公告
	$('.add_anno').on('click',function(){
		location.href = "add_anno.html";
	});
</script>
</html>