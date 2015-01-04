<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head lang="en">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="/css/basicinfo.css">
	<script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
	<script src="/js/less-1.7.5.min.js"></script>
</head>
<body>
	<div class="title">
		<span class="titleTxt">基本信息</span>
	</div>
	<div class="info_holder">
		<div class="per_info">
			<div class="photo_box">
				<div class="per_photo"></div>
				<span class="ur_name"><?=$user?></span><br>
			</div>
			<div class="info_list">
				<span class="identity">社会角色：<?php switch ($rank) {
					case 0:echo '未设置';break;
					case 1:echo '工薪族';break;
					case 2:echo '企业主';break;
					case 3:echo '网店店主';break;
				}?></span><br>
				<span class="per_type">会员级别：A</span><br>
				<span class="phone">手机号码：<?=substr($phone,7).'****'?></span><br>
			</div>
			<a href="/user/me/8" id="changeinfo"><div class="reset">修改信息</div></a>
		</div>
		<div class="money_info">
			<h4>账户可用现金：</h4>
			<p class="moneyholder">
				<span class="money_num"><?=$access?></span><span class="yuan">元</span>
			</p>
			<p class="money_btn">
				<a href="/user/recharge"><span class="btn_left">充值</span></a>
				<a href="##"><span>提现</span></a>
			</p>
		</div>
	</div>
	<div class="ad">
		产品广告区
	</div>
	<div class="ad">
		产品广告区
	</div>
</body>
</html>