<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>后台管理</title>
	<meta name="description" content="">
	<link rel="stylesheet" type="text/css" href="/css/back.css">
	<script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/js/ajaxLoad.js"></script>
</head>
<body>
<div id="header">
	<div class="logo">掌金联盟</div>
	<p class="welcome">您好，欢迎<span><?=$user?></span>登录掌金宝后台管理系统，当前时间：<span><?=date('Y-m-d H:i');?></span></p>
</div>
<div id="main">
	<div id="slider">
		<div class="block"></div>
		<div class="quit">
			<span class="f5">刷新 </span>|
			<span>退出</span>
		</div>
		<div class="li">
			<h1>众筹管理<span class="back_icon slide_icon">&#xe73d;</span></h1>
			<ul>
                <li class="zhongchou_shenhe" onclick="location.href='#1'">项目审核</li>
                <li class="zhongchou_guanli" onclick="location.href='#2'">项目管理</li>
            </ul>
        </div>
        <div class="li">
            <h1>掌金宝管理<span class="back_icon slide_icon">&#xe73d;</span></h1>
            <ul>
                <li class="zhangjinbao_shenhe" onclick="location.href='#3'">项目审核</li>
                <li class="zhangjinbao_guanli" onclick="location.href='#4'">项目管理</li>
                <li class="gonggao_guanli" onclick="location.href='#5'">公告管理</li>
            </ul>
        </div>
        <div class="li">
            <h1 class="zhangjinjie" onclick="location.href='#6'">掌金街管理</h1>
        </div>
        <div class="li">
            <h1 class="bbs_guanli" onclick="location.href='#7'">掌金论坛管理</h1>
        </div>
        <div class="li">
            <h1 class="choujiang" onclick="location.href='#8'">抽奖活动管理</h1>
		</div>
	</div>
	<iframe src="backend/bbs_guanli.html" class="iframe" scrolling="0"></iframe>
</div>
</body>
<script type="text/javascript">
	var height = $(window).height();
	var width = $(window).width();
	$('#slider').css('height',height-75);
	$(window).resize(function(){
		var height = $(window).height();
		var width = $(window).width();
		$('#slider').css('height',height-75);
		$('.iframe').css({'width':width-221,"height":height-75});
	});
	$('.iframe').css({'width':width-221,"height":height-75});
	$('.f5').on('click',function(){
		location.reload();
	});
	$('.li h1').on('click',function(){
		$('.on').removeClass('on');
		$('.slide_icon').html('&#xe73d;');
		$(this).addClass('on');
		$(this).parent().parent().find('ul').css('display','none');
		if($(this).parent().attr('class')=='li li_on'){
			$('.li_on').removeClass('li_on');	
		}else{
			if($(this).find('span')){
				$(this).find('.slide_icon').html('&#xe736;');
			}
			$(this).parent().find('ul').css('display','block');
			$('.li_on').removeClass('li_on');
			$(this).parent().addClass('li_on');	
		}
	});
	$('.li ul li').on('click',function(){
		$('.on').removeClass('on');
		$(this).addClass('on');
	});
	//iframe
	function loadPage(id){
	    if (typeof(id)=='object'){
            id=location.hash.substr(1);
        }
	    var fra=$('.iframe');
	    switch(id){
	        case '2':fra.attr('src','/zhong/admin');break;
	        case '3':fra.attr('src','/ppp/admin/check');break;
	        case '4':fra.attr('src','/ppp/admin');break;
	        case '5':fra.attr('src','/ppp/admin/ann');break;
	        case '6':fra.attr('src','/shop/admin');break;
	        case '7':fra.attr('src','/bbs/admin');break;
	        case '8':fra.attr('src','/zhong/admin/choujiang');break;
	        default:fra.attr('src','/zhong/admin/check');
	    }
	}
</script>
</html>