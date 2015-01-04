<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/> 
<title>掌金宝</title>
<meta name="description" content="">
<link rel="stylesheet" type="text/css" href="/css/invest.css">
<?php include(APPPATH.'views/top.php');?>
	<div id="main">
		<span class="main_nav"><a href="">首页 </a>> <a href="">我要投资</a></span>
		<div class="top_con">
			<div class="top_left">
				<h1>筛选投资项目</h1>
				<div>
					<span>年利率：</span>
					<ul>
						<li onclick="set(1,null,this)" class="select">不限</li>
						<li onclick="set(1,1,this)">8%-13%</li>
						<li onclick="set(1,2,this)">13%-18%</li>
						<li onclick="set(1,3,this)">18%-24%</li>
					</ul>
				</div>
				<div>
					<span>借款期限：</span>
					<ul>
						<li onclick="set(2,null,this)" class="select">不限</li>
						<li onclick="set(2,1,this)">0-3个月</li>
						<li onclick="set(2,2,this)">3-6个月</li>
						<li onclick="set(2,3,this)">6-12个月</li>
					</ul>
				</div>
				<div>
					<span>认证等级：</span>
					<ul>
						<li onclick="set(3,null,this)" class="select">不限</li>
						<li onclick="set(3,1,this)">AAA+</li>
						<li onclick="set(3,2,this)">AAA</li>
						<li onclick="set(3,3,this)">AA+</li>
						<li onclick="set(3,4,this)">AA</li>
						<li onclick="set(3,5,this)">A+</li>
					</ul>
				</div>	
			</div>
			<div class="top_right">
				<h1>投标注意</h1>
				<p>确认投标信息，不要盲目投标。不要听从旁人指导，自己确认。投标有风险，请用户须知。如有问题，可以询问客服。</p>
			</div>
		</div>
		<div class="list">
			<h1>最新标段</h1>
			<table id="table">
				<tr class="headline">
					<th class="name">借款人</th>
					<th class="title">借款标题</th>
					<th class="rate">年利率</th>
					<th class="level">信用等级</th>
					<th class="money">金额</th>
					<th class="limit">期限</th>
					<th class="progress">进度</th>
					<th class="type"></th>
				</tr>
			</table>
		</div>
		<div id="page" class="page">
		</div>
	</div>
	<script type="text/javascript" src="/js/listview.js"></script>
	<script type="text/javascript" src="/js/p2p/invlist.js"></script>
<?php include(APPPATH.'views/foot.php');?>