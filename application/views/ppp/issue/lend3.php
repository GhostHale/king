	<div id="main">
		<span class="main_nav"><a href="/ppp/main">首页</a> > <a href="">我要投资</a> > <a href="">投资详情</a></span>
		<ul class="progress_nav">
			<li class="pro_head">填写借款申请</li>
			<li class="pro_on">填写借款信息</li>
			<li class="pro_on">审核</li>
			<li class="pro_nor">招标</li>
			<li class="pro_end">体现</li>
		</ul>
		<div class="confirm">
			<h1 class="title">您即将发布的标段为<span><?php switch($type){
case 1:echo '工薪族';break;case 2:echo '企业主';break;case 3:echo '网店主';break;default:echo 'unknown';
        };?></span><a class="help" href="">适用帮助</a><a href="/user/me">进入个人中心</a></h1>
			<div>
				<h1>您的申请已经提交，我们正在审核之中</h1>
				<div>
					<a href="/user/me">进入个人中心</a>
					<a href="/ppp/main">返回首页</a>
				</div>
			</div>
			<div>
				<h1 class="name"><?=$title?></h1>
				<span>借款金额：<span><?=$total?>元</span></span>
				<span>年利率：<span><?=$rate?>%</span></span>
				<span>借款期限：<span><?=$period?><?=($isday==1)?'日':'个月'?></span></span>
				<span>信用等级：<span>A</span></span>
			</div>
			<div>
				<h1 class="name">标段介绍</h1>
				<p><?=$intro?></p>
			</div>	
		</div>
	</div>