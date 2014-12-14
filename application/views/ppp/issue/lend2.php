<!DOCTYPE html>
<html>
<head>
<title>我要借款</title>
<meta name="description" content="">
<link rel="stylesheet" type="text/css" href="/css/loan.css">
<link rel="stylesheet" href="/css/jquery-ui.css">
<script src="/js/jquery-ui.js"></script>
<?php include(APPPATH.'views/top.php');?>
	<div id="main">
		<span class="main_nav"><a href="">首页</a> > <a href="">我要投资</a> > <a href="">投资详情</a></span>
		<ul class="progress_nav">
			<li class="pro_head">填写借款申请</li>
			<li class="pro_on">填写借款信息</li>
			<li class="pro_nor">审核</li>
			<li class="pro_nor">招标</li>
			<li class="pro_end">提现</li>
		</ul>
		<form class="form" method="post" action="">
			<h1 class="title">您即将发布的标段为<span><?php switch($rank){
case 1:echo '工薪族';break;case 2:echo '企业主';break;case 3:echo '网店主';break;default:echo 'unknown';
        };?></span><a class="help" href="">适用帮助</a><a href="">进入个人中心</a></h1>
			<div class="form_li">
				<h1>标段名字:</h1>
				<div>
					<input type="text" name="title">
					<h3></h3>
				</div>
				<p>申请借款的用户需要根据不同的产品提交相应的信用认证材料，经过闪电贷审核后获取相应的信用级及信用额度。标题输入15到30个汉字。</p>
			</div>
			<div class="form_li">
				<h1>借款额度:</h1>
				<div style="padding-right:0;width:401px;">
					<input type="text" name="total">
					<span>元</span>
					<h3 class="h3"></h3>
				</div>
				<p>请在此栏填写大于等于5000的借款金额，金额必须是正整数</p>
			</div>
			<div class="form_li">
				<h1>还款方式:</h1>
				<div class="li_down">
					<input type="text" name="toubiao_name" value="等额本金" readonly="readonly">
					<ul>
						<li>等额本金</li>
						<li>等额本息</li>
						<li>按月还息，到期还本</li>
					</ul>
				</div>
				<p></p>
			</div>
			<div class="form_li">
				<h1>年利率:</h1>
				<div style="padding-right:0;width:401px;">
					<input type="text" name="rate">
					<span>%</span>
					<h3 class="h4"></h3>
				</div>
				<p>年利率在8%-24%之间，请填写您能够接受的借贷利率</p>
			</div>
			<div class="form_li">
				<h1>期限类型:</h1>
				<div class="li_down">
					<input type="text" name="toubiao_name" value="按月还款" readonly="readonly">
					<ul>
						<li>按月还款</li>
						<li>按月还款</li>
					</ul>
				</div>
				<p></p>
			</div>
			<div class="form_li">
				<h1>标段期限:</h1>
				<div>
					<input type="text" name="toubiao_name" placeholder="如:1">
					<h3></h3>
				</div>
				<p>您的借贷将分期付款，请在此栏填写您能够接受的期限，期限不超过12期</p>
			</div>
			<div class="form_li date">
				<h1>招标时间:</h1>
				<div>
					<input type="text" class="datepicker" name="toubiao_name">
					<h3></h3>
				</div>
				<h4>至</h4>
				<div>
					<input type="text" class="datepicker" name="toubiao_name">
					<h3></h3>
				</div>
				<p></p>
			</div>
			<div class="form_li">
				<h1>标段类型:</h1>
				<div class="li_down">
					<input type="text" name="toubiao_name" value="信用" readonly="readonly">
					<ul>
						<li>担保</li>
						<li>回购</li>
						<li>政府项目</li>
					</ul>
				</div>
				<p>按日计算利息，一年按照360天计算。</p>
			</div>
			<div class="form_li" style="height:144px;">
				<h1>标段介绍:</h1>
					<textarea placeholder="借款理由，还款保障"></textarea>
			</div>
			<input type="submit" class="submit" value="下一步">
		</form>
	</div>
<script type="text/javascript">
	$(function() {
    	$( ".datepicker" ).datepicker();
	});
</script>
<script type="text/javascript" src="/js/touzi.js"></script>
<?php include(APPPATH.'views/foot.php');?>