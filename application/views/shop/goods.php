<!DOCTYPE html>
<html>
<head>
    <title>商品详情</title>
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/perpro.css">
<?php include(APPPATH.'views/top.php');?>
    <script src="/js/shop/goods.js"></script>
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
            <span class="nav_name">我的收藏</span>
        </ul>
    </div>
    <div class="pro_list">
        <div class="pro_box">
            <ul class="type">
                <li><a href="/shop/main"> 掌金街 > </a></li>
                <li><a href="#" class="now"> 商品详情</a></li>
            </ul>
            <div class="buy_con">
                <div class="photo_con">
                    <div class="photo_big">
                    </div>
                    <ul class="photo_list">
                        <li></li>
                        <li></li>
                        <li style="margin-right: 0;"></li>
                    </ul>
                </div>
                <div class="pro_con">
                    <h3>商品名称商品名称商品名称商品名称商品名称商品</h3>
                        <span class="price_box">价格:<span class="price">¥100</span></span>
                        <ul class="info_menu">
                            <li>
                                <span>销量</span><br>
                                <span>2000件</span>
                            </li>
                        </ul>
                        <div class="type_selector">
                            种类:
                            <ul class="sele_menu">
                                <li>
                                    <img src="/car/1_sele.jpg">
                                </li>
                                <li>
                                    <img src="/car/1_sele.jpg">
                                </li>
                                <li>
                                    <img src="/car/1_sele.jpg">
                                </li>
                                <li>
                                    <img src="/car/1_sele.jpg">
                                </li>
                                <li>
                                    <img src="/car/1_sele.jpg">
                                </li>
                            </ul>
                        </div>
                        <div class="num_sel">
                            数量:
                            <ul>
                                <li class="subtract">-</li>
                                <input type="text" class="num" value="1" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
                                <li class="plus">+</li>
                            </ul>
                        </div>
                        <div class="buy_btn">
                            点击收藏
                        </div>
                        <div class="buy_btn">
                            立即购买
                        </div>

                </div>
            </div>
        </div>
        <div class="explicit">
            <img src="/car/ad.jpg">
        </div>
    </div>
</div>
<?php include(APPPATH.'views/foot.php');?>