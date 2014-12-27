<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/> 
<title>公告</title>
<meta name="description" content="">
<link rel="stylesheet" type="text/css" href="/css/announce_detail.css">
<?php include(APPPATH.'views/top.php');?>
	<div id="main">
		<span class="main_nav"><a href="/ppp/main">首页</a> > <a href="/ppp/main/annlist">公告列表</a> > <a>$title</a></span>
		<div class="content">
			<h1><?=$title?></h1>
			<h2><?=$time?></h2>
			<p><?=$content?></p>
		</div>
	</div>
<?php include(APPPATH.'views/foot.php');?>