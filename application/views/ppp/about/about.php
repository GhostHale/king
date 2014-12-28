<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title></title>
	<meta name="description" content="">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="stylesheet" type="text/less" href="/css/aboutus.less">
	<script src="/js/less-1.7.5.min.js"></script>
<?php include(APPPATH.'views/top.php');?>
	<script src="/js/ajaxLoad.js"></script>
<div id="main">
	<ul class="header_nav">
		<li><a href="/ppp/main/">首页 ></a></li>
		<li class="on">关于我们 </li>
	</ul>
	<div class="box">
		<div class="main_nav">
			<ul id="list">
				<span class="blank"></span>
				<li><a href="#1">关于我们</a></li>
				<li><a href="#2">安全保障</a></li>
				<li><a href="#3">礼贤下士</a></li>
				<li><a href="#4">联系我们</a></li>
				<li><a href="#5">公司介绍</a></li>
				<li><a href="#6">合作伙伴</a></li>
			</ul>
		</div>
		<div class="informatin" id="info"></div>
	</div>
</div>
<script type="text/javascript">
    function loadPage(info){
        if (typeof(info)!='string')
            info=location.hash.substr(1);
        $('#info').load('/ppp/main/about/'+info);
        info=parseInt(info)-1;
        $('.active').attr("class","");
        $('#list>li:eq('+info+')').attr("class","active");
    }
</script>
<?php include(APPPATH.'views/foot.php');?>