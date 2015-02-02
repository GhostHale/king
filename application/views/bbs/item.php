<!DOCTYPE html>
<html>
<head>
    <title><?=$title?></title>
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/less" href="/css/single.less">
    <script src="/js/less-1.7.5.min.js"></script>
<?php include(APPPATH.'views/top.php');?>
<div id="main">
    <ul class="tyle_nav">
        <li><a>首页 ></a></li>
        <li><a>掌金论坛 ></a></li>
        <li class="active"><?=$title?></li>
    </ul>
    <div class="article">
        <h2><?=$title?></h3>
            <p class="art_inf">楼主:<span><?=$name?></span>时间:<span><?=$time?></span>点击:<span><?=$readtimes?></span>回复:<span id="rep"><?=$reply?></span></p>
            <div class="art_box"><?=$content?></div>
    </div>
    <div class="comment">
        <div class="com_input">
            <p>
                <span class="h2">我要评论</span>
                <span>文明上网理性发言，请遵守新闻评论服务协议</span>
            </p>
            <div class='txt_box'>
                <form name="form">
                <textarea placeholder="发表一下你的想法吧..." id="comment_input" name="content"></textarea>
                <input type="hidden" name="reply" />
                <button id="apply" onclick="return sub()">发表评论</button>
                </form>
            </div>
            <ul class="comment_list" id="comment">
            </ul>
            <div id="page" class="load_more">
            </div>
        </div>
    </div>
</div>
<script src="/js/listview.js"></script>
<script src="/js/bbs/bbsItem.js"></script>
<?php include(APPPATH.'views/foot.php');?>