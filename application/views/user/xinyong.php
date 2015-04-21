<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="/css/xinyong.css">
	<script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/js/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="/js/upUserPic.js"></script>
</head>
<body>
	<div class="title">
		<span class="titleTxt">信用资料</span><span>图片大小在2M内，支持png、jpg、jpeg格式</span>
	</div>
	<form enctype="multipart/form-data" name="form" method="post">
	    <input type="hidden" name="type" />
	    <input type="file" name="file" style="display:none" onchange="changed()" />
	<ul class="cre_holder">
		<span class="cre_type">必要信息</span>
		<span class="project">
			<span class="pro_name">项目</span>
			<span class="cre_state">状态</span>
		</span><?php foreach($basic as $item):?>
		<li>
			<span class="pro_name"><?=$item['name']?></span>
			<span class="pro_state"><?=($item['have']==0)?'未上传':'已上传'?></span>
			<div class="upfiel" onclick="selFile(this);">
				<div class="row"></div>
				<div class="tips">请选择文件</div>
			</div>
			<button class="apply" onclick="return sub(<?=$item['type']?>)">提交</button>
		</li><?php endforeach;?>
	</ul>
	<ul class="cre_holder">
		<span class="cre_type">选填信息</span>
		<span class="project">
			<span class="pro_name">项目</span>
			<span class="cre_state">状态</span>
		</span><?php foreach($sub as $item):?>
        <li>
            <span class="pro_name"><?=$item['name']?></span>
            <span class="pro_state"><?=($item['have']==0)?'未上传':'已上传'?></span>
            <div class="upfiel" onclick="selFile(this);">
                <div class="row"></div>
                <div class="tips">请选择文件</div>
            </div>
            <button class="apply" onclick="return sub(<?=$item['type']?>)">提交</button>
        </li><?php endforeach;?>
	</ul>
	</form>
</body>
</html>