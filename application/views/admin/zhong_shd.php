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
			<p><a href="">后台管理</a><a href="">> 众筹管理</a><a href="">> 项目审核</a></p>
		</div>
		<h1>标题<div><span>上一条</span><span>下一条</span></div></h1>
		<div class="detail">
			<img class="pic1" src="">
			<div class="detail_infro">
				<h3>商品名称</h3>
				<h2>商品简介信息，商品简介信息，商品简介信息，商品简介信息，商品简介信息</h2>
				<h2>发布人：<span>身份</span></h2>
				<h2>发布时间：<span>2000.1.1——2001.2.2</span></h2>
				<h2>剩余天数：<span>50</span>天</h2>
				<ul>
					<li><h4><span>xxxxxx</span>%</h4>已达</li>
					<li><h4>￥<span>xxxxxxxx</span></h4>已筹集</li>
					<li class="rli"><h4><span>xx</span>天</h4>剩余时间</li>
				</ul>
			</div>
			<p>布鲁诺·马尔斯（Bruno Mars），原名彼得·基恩·埃尔南德斯（Peter Gene Hernandez），是美国的创作型歌手、音乐制作人。他的音乐风格多种多样，舞台表演内容丰富，个人独特的复古表演极具吸引力。他拥有18项格莱美奖提名并赢得其中的两座，全球60白金专辑销量，全球单曲销量超过1.3亿，是继“猫王”之后，拿下五首Billboard Hot 100单曲榜冠军单曲速度最快的男歌手。入选2011年《时代》杂志全球“最具影响力的100人”，获2013年《人物》杂志“全球最性感男人”第五名，拿下2013年《Billboard》杂志年度艺人，领衔2014年《福布斯》“音乐领域30位30岁以下俊杰”名单，在2014年第48届超级碗中场秀领衔演出，是当今世界流行乐坛的超级巨星。</p>
			<img class="pic2" src="">
			<p>布鲁诺·马尔斯（Bruno Mars），原名彼得·基恩·埃尔南德斯（Peter Gene Hernandez），是美国的创作型歌手、音乐制作人。他的音乐风格多种多样，舞台表演内容丰富，个人独特的复古表演极具吸引力。他拥有18项格莱美奖提名并赢得其中的两座，全球60白金专辑销量，全球单曲销量超过1.3亿，是继“猫王”之后，拿下五首Billboard Hot 100单曲榜冠军单曲速度最快的男歌手。入选2011年《时代》杂志全球“最具影响力的100人”，获2013年《人物》杂志“全球最性感男人”第五名，拿下2013年《Billboard》杂志年度艺人，领衔2014年《福布斯》“音乐领域30位30岁以下俊杰”名单，在2014年第48届超级碗中场秀领衔演出，是当今世界流行乐坛的超级巨星。</p>
		</div>
		<form class="commit">
			<div class="btn yes">审核通过</div>
			<div class="btn no">审核失败</div>
			<input class="btn_val" type="text" style="display:none;" value="">
			<input class="commit_btn" type="submit" vlaue="提交">
		</form>
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
	//审核
	$('.commit .btn').on('click',function(){
		if ($(this).attr('class')=="btn yes") {
			$(this).addClass('yes_on');
			$('.no_on').removeClass('no_on');
			$('.btn_val').attr('value','1');
		}else{
			$(this).removeClass('yes_on');
			$('.btn_val').attr('value','');
		}
		if ($(this).attr('class')=="btn no") {
			$(this).addClass('no_on');
			$('.yes_on').removeClass('yes_on');
			$('.btn_val').attr('value','0');
		}else{
			$(this).removeClass('no_on');
			$('.btn_val').attr('value','');
		}
	});
</script>
</html>