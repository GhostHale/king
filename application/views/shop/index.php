<!DOCTYPE html>
<html>
    <head>
        <title>掌金街</title>
        <meta name="description" content="">
<?php include(APPPATH.'views/top.php');?>
        <link rel="stylesheet" type="text/css" href="/css/main.css">
		<link rel="stylesheet" type="text/css" href="/css/style.css">
		<script>
			function timerSet(n,aBtn,oSlider){
				   timer=setInterval(function(){
					n++;
					if(n==3){
						n=0;
					};
					for(var i=0;i<aBtn.length;i++)
					{
						aBtn.attr('class','');
					}
					aBtn.eq(n)[0].className='active';
					oSlider.animate({left:-815*n},500);
				},5000);
				return timer;
			};
			$(function(){
				var oSlider=$('.pro_nav');
				var aBtn=$('.dir_btn>li');
				var n=0;
				for(var i=0;i<aBtn.length;i++) {
					var li = aBtn.eq(i);
					li[0].index = i;
					aBtn.eq(i).click(function () {
						clearInterval(timer);
						n = $(this)[0].index;
						timer=timerSet(n,aBtn,oSlider);
						aBtn.attr('class', '');
						$(this)[0].className = 'active';
						oSlider.animate({left: -815 * n}, 500);
					});
				}
				var timer=timerSet(n,aBtn,oSlider);
			});
		</script>
		<div id="main">
			<div class="nav_list">
				<ul class="nav_type">
					<span class="nav_name">生活类</span>
					<li>沐浴露</li>
					<li>洗发水</li>
					<li>床上用品</li>
					<li>牙膏牙刷</li>
					<li>脸盆水桶</li>
				</ul>
				<ul class="nav_type">
					<span class="nav_name">零食类</span>
					<li>膨化食品</li>
					<li>辣条</li>
					<li>泡面</li>
					<li>糖果饼干</li>
					<li>饮品</li>
				</ul>
			</div>
			<div class="pro_list">
				<div class="pro_slider">
					<ul class="pro_nav">
						<li></li>
						<li style="background: yellow"></li>
						<li></li>
					</ul>
					<ul class="dir_btn">
						<li class="active"></li>
						<li></li>
						<li></li>
					</ul>
				</div>
				<div class="pro_box">
					<ul class="nav_pro">
						<li>
							<a href="##">
								<img src="/images/pro.jpg">
								<p>产品名称</p>
								<p>产品介绍产品介绍产品介绍产品</p>
								<input type="button" value="点击购买">
							</a>
						</li>
						<li>
							<a href="##">
								<img src="/images/pro.jpg">
								<p>产品名称</p>
								<p>产品介绍产品介绍产品介绍产品</p>
								<input type="button" value="点击购买">
							</a>
						</li>
						<li>
							<a href="##">
								<img src="/images/pro.jpg">
								<p>产品名称</p>
								<p>产品介绍产品介绍产品介绍产品</p>
								<input type="button" value="点击购买">
							</a>
						</li>
						<li>
							<a href="##">
								<img src="/images/pro.jpg">
								<p>产品名称</p>
								<p>产品介绍产品介绍产品介绍产品</p>
								<input type="button" value="点击购买">
							</a>
						</li>
						<li>
							<a href="##">
								<img src="/images/pro.jpg">
								<p>产品名称</p>
								<p>产品介绍产品介绍产品介绍产品</p>
								<input type="button" value="点击购买">
							</a>
						</li>
						<li>
							<a href="##">
								<img src="/images/pro.jpg">
								<p>产品名称</p>
								<p>产品介绍产品介绍产品介绍产品</p>
								<input type="button" value="点击购买">
							</a>
						</li>
						<li>
							<a href="##">
								<img src="/images/pro.jpg">
								<p>产品名称</p>
								<p>产品介绍产品介绍产品介绍产品</p>
								<input type="button" value="点击购买">
							</a>
						</li>
						<li>
							<a href="##">
								<img src="/images/pro.jpg">
								<p>产品名称</p>
								<p>产品介绍产品介绍产品介绍产品</p>
								<input type="button" value="点击购买">
							</a>
						</li>
						<li>
							<a href="##">
								<img src="/images/pro.jpg">
								<p>产品名称</p>
								<p>产品介绍产品介绍产品介绍产品</p>
								<input type="button" value="点击购买">
							</a>
						</li>
					</ul>
				</div>
				<div class="page">
					<span class="btn_page1">首页</span>
					<span class="btn_page2 btn_page1">上一页</span>
					<ul>
						<li style="margin-left: 10px">
							<a>1</a>
						</li>
						<li>
							<a>2</a>
						</li>
						<li>
							<a>3</a>
						</li>
						<li>
							<a>4</a>
						</li>
						<li>
							<a>......</a>
						</li>
						<li>
							<a>10</a>
						</li>
						<li>
							<a>11</a>
						</li>
						<li>
							<a>12</a>
						</li>
					</ul>
					<span class="btn_page2 btn_page1">下一页</span>
					<span class="btn_page1">末页</span>
				</div>
			</div>
		</div>
<?php include(APPPATH.'views/foot.php');?>