<!DOCTYPE html>
<html>
<head>
	<title>购物车</title>
	<meta name="description" content="">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="stylesheet" type="text/css" href="/css/collection.css">
<?php include(APPPATH.'views/top.php');?>
<div id="main">
	<ul class="header_nav">
		<a href="/ppp/main"><li>首页 ></li></a>
		<a href="/shop/main"><li>掌金街 ></li></a>
		<a href="/show/tobuy"><li class="now">购物车</li></a>
	</ul>
	<div class="controller">
		<ul class="nav_left">
			<li class="sele_all">
				<input type='checkbox' id="sele_all"/>全选
			</li>
			<li>商品信息</li>
		</ul>
		<ul class="nav_right">
			<li>分类</li>
			<li>单价</li>
			<li>数量</li>
			<li>金额（元）</li>
		</ul>
		<ul class="colle_list"><?php if (count($rows)==0) echo "<li>空</li>";
		else foreach ($variable as $item):?>
			<li>
				<input type="checkbox" class="per_pro">
				<img src="car/1_min.jpg">
				<a href="/shop/main/goods/<?=$item['gid']?>" class="pro_name"><?=$item['name']?></a>
				<span class="pro_type">
				    <?php $res=$item['kind'];if ($item['type']!=''){
				        $type=json_decode($item['type'],true);
                        foreach($type as $key=>$value) $res.=" $key:$value";
                        echo $type;
				    }?>
				</span>
				<span class="per_price"><?=$item['price']?></span>
				<ul class="num_control">
					<li class="subtract">-</li>
					<input type="text" class="num" value="1" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
					<li class="plus">+</li>
				</ul>
				<span class="cost">
						180.00
				</span>
				<div class="delete">删除</div>
			</li>
			<?php endforeach;?>
		</ul>
	</div>
	<div class="pay_holder">
		<span class="cost_all">
			合计：<span class="cost_num">¥ 0.00</span>
		</span>
		<div class="buy">结算</div>
	</div>
</div>
<script src="/js/collection.js"></script>
<?php include(APPPATH.'views/foot.php');?>