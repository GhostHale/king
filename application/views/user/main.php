<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>个人中心</title>
	<meta name="description" content="">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="stylesheet" type="text/css" href="/css/person.css">
<?php include(APPPATH.'views/top.php');?>
<script src="/js/ajaxLoad.js"></script>
<div class="header_nav">
	<ul class="nav">
		<li>
			<a href="/ppp/main/">首页 ></a>
		</li>
		<li>
			<a href="/user/me">个人中心 ></a>
		</li>
	</ul>
</div>
<div id="main">
	<ul class="main_nav">
		<span class="nav_class">
			<div class="nav_inner">
				<h3 class="home">个人中心</h3>
			</div>
		</span>
			<a href="#1"><li>基本信息</li></a>
			<a href="#2"><li>信用资料</li></a>
		<span class="nav_class">
			<div class="nav_inner">
				<h3 class="qiandai">借款管理</h3>
			</div>
		</span>
		<a href="#3"><li class="">我的借款</li></a>
		<a href="#4"><li>借款申请查询</li></a>
		<span class="nav_class">
			<div class="nav_inner">
				<h3 class="touzi">投资管理</h3>
			</div>
		</span>
		<a href="#5"><li class="">我的投资</li></a>
		<a href="#6"><li>理财统计</li></a>
		<span class="nav_class">
			<div class="nav_inner">
				<h3 class="gouwu">掌金购物</h3>
			</div>
		</span>
		<a href="#7"><li class="">购买记录</li></a>
		<a href="/shop/main/tobuy" target="_blank"><li>购物车</li></a>
	</ul>
	<iframe name="view" class="iframe" scrolling="no">
	</iframe>
</div>
<script type="text/javascript" src="/js/person.js"></script>
<?php include(APPPATH.'views/foot.php');?>