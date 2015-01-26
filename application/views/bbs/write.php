<!DOCTYPE html>
<html>
    <head>
        <title>发布帖子</title>
        <meta name="description" content="">
        <link rel="stylesheet" type="text/css" href="/css/main.css">
        <link rel="stylesheet" type="text/css" href="/css/apply.css">
<?php include(APPPATH.'views/top.php');?>
        <div id="main">
            <ul class="tyle_nav">
                <li><a>首页 ></a></li>
                <li><a>掌金论坛 ></a></li>
                <li class="active"><a>我要发帖</a></li>
            </ul>
            <div class="bbs_box">
                <form method="post" enctype="multipart/form-data">
                <p class="title">标题：<input name="title" type="text" class="titleTxt"></p>
                    <p class="txt">内容：<textarea name="content" class="innerTxt" autofocus></textarea></p><br>
                    <span class="sub_fiel" onclick="document.getElementById('file_sub').click()">
                        插入附件(允许上传图片、doc、docx、txt文档及压缩文件，20M以内)
                        <input name="file" type="file" id="file_sub">
                    </span>
                    <input type="submit" value="提交" class="apply">
                </form>
            </div>
        </div>
<?php include(APPPATH.'views/foot.php');?>