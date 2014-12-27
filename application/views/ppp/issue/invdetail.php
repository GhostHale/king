<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/> 
<title><?=$title?></title>
<meta name="description" content="">
<link rel="stylesheet" type="text/css" href="/css/less_detail.css">
<?php include(APPPATH.'views/top.php');?>
	<div id="main">
		<span class="main_nav"><a href="">首页 </a>> <a href="">我要投资</a>> <a href="">标段详情</a></span>
		<div class="top_con">
			<div class="left">
				<h1 class="left_title"><?=$title?></h1>
				<ul class="infro">
					<li>借款金额：<h1>￥<span><?=$total?></span></h1></li>
					<li>信用等级：<h1><span>AAA</span></h1></li>
					<li>年利率：<h1><?=$rate?>%</h1></li>
					<li>标段期限：<h1><?=$period?><?=($isday)?'日':'月'?></h1></li>
					<li class="from">时间段：<h1><?=$start?>到<?=$end?></h1></li>
				</ul>
				<ul class="infro_un">
					<li class="li_left">
						<div class="progress_line"><div></div></div>
						<span>5，000.00元</span>
					</li>
					<li>√100%安全认证，确认安全交易</li>
				</ul>
			</div>
			<div class="right">
				<h1 class="right_title">投资金额</h1>
				<form onsubmit="return sub()" name="form">
					<input class="money" type="text" name="money" onchange="count(this)">元
					<h1>到期总收益<span>￥<span id="income" class="income"></span>元</span></h1>
					<a>理财计算器，计算您的投资收益</a>
					<div>
						<input class="checkbox" type="checkbox">
						<span>我同意<a href="">《投资人协议》</a></span>
					</div>
					<input type="submit" class="submit" value="投资">
				</form>
			</div>
		</div>
		<ul class="list">
			<li class="li_on">借款人详情</li>
			<li>购买记录</li>
			<li>标段详情</li>
		</ul>
		<div class="bd_detail list_under">
			<div class="top_detail">
				<h1>生物公司资金周转三期</h1>
				<ul>
					<li>借款金额：<span>500，000，000.00</span>元</li>
					<li>年利率：<span>15%</span></li>
					<li>借款期限：<span>12个月</span></li>
					<li>信用等级：<span>A</span></li>
					<li>还款方式：<span>按期还息，到期还本</span></li>
				</ul>		
			</div>	
			<div class="bottom_detail">
				<h1>第三方专业风险评估报告</h1>
				<h2>担保编号：<span>10101</span></h2>
				<img src="">
			</div>
		</div>
		<div class="record list_under">
			<table>
				<tr>
					<th>买家</th>
					<th>投资金额</th>
					<th>每期获利</th>
					<th>成交时间</th>
					<th>状态</th>
				</tr>
				<tr>
					<td>afdsaf</td>
					<td>54，000.00</td>
					<td>
						<span>第一期：￥300</span>
						<span>第二期：￥300</span>
					</td>
					<td>2014.11.1-2014.12.3</td>
					<td>已付款</td>
				</tr>
				<tr>
					<td>afdsaf</td>
					<td>54，000.00</td>
					<td>
						<span>第一期：￥300</span>
						<span>第二期：￥300</span>
					</td>
					<td>2014.11.1-2014.12.3</td>
					<td>已付款</td>
				</tr>
				<tr>
					<td>afdsaf</td>
					<td>54，000.00</td>
					<td>
						<span>第一期：￥300</span>
						<span>第二期：￥300</span>
					</td>
					<td>2014.11.1-2014.12.3</td>
					<td>已付款</td>
				</tr>
			</table>
		</div>
		<div class="per_detail list_under">
			<table>
				<tr class="top">
					<td class="kong">
						<span class="odd">昵称</span>
						<span class="even">sdf</span>
					</td>
					<td>
						<span class="odd">昵称</span>
						<span class="even">sdf</span>
					</td>
				</tr>
				<tr>
					<td class="kong">
						<span class="odd">性别</span>
						<span class="even">男</span>
					</td>
					<td>
						<span class="odd">性别</span>
						<span class="even">男</span>
					</td>
				</tr>
				<tr class="bottom">
					<td class="kong">
						<span class="odd">手机号</span>
						<span class="even">111</span>
					</td>
					<td>
						<span class="odd">手机号</span>
						<span class="even">111</span>
					</td>
				</tr>
				<tr class="middle">
					<td>
						<span class="odd"> </span>
						<span class="even">通过审核项目</span>
					</td>
				</tr>
				<tr>
					<td class="kong">
						<span class="odd">营业执照副本</span>
						<span class="even status">√</span>
					</td>
					<td>
						<span class="odd">营业执照副本</span>
						<span class="even status">√</span>
					</td>
				</tr>
				<tr>
					<td class="kong">
						<span class="odd">户口本</span>
						<span class="even status">√</span>
					</td>
					<td>
						<span class="odd">户口本</span>
						<span class="even status">√</span>
					</td>
				</tr>
			</table>
		</div>
	</div>
<script type="text/javascript">
$('.list li').on('click',function(){
	var index = $(this).index();
	$('.list_under').css('display','none');
	if (index == 0) {
		$('.per_detail').css('display','block');
	}else if (index == 1) {
		$('.record').css('display','block');
	}else{
		$('.bd_detail').css('display','block');
	}
	$('.li_on').removeClass('li_on');
	$(this).addClass('li_on');
});
function count(e){
    var money=e.value;
    if (isNaN(money)){
        $('#income').html('输入非法！');
    }else{
        money=parseInt(money)*<?=$rate?>;
        money=Math.floor(money/<?=($isday)?'365':'12'?>);
        $('#income').html(money/100);
    }
}
function sub(){
    var money=form.money.value;
    if (isNaN(money)){
        alert('输入非法！');
    }else{
        $.post(location.href,{money:money},function(data){
            if (data=='ok') alert('投资成功！');
            else alert(data);
        });
    }
    return false;
}
</script>
<?php include(APPPATH.'views/foot.php');?>