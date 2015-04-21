<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="/css/back.css">
	<link rel="stylesheet" type="text/css" href="/css/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="/css/themes/icon.css">
	<script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/js/jquery.easyui.min.js"></script>
	<script src="/js/notRefreshFilesUpload.js"></script>  
    <script>  
        $(function () {  
  
            var btn = $("#Button1");  
  
            btn.uploadFile({  
                url: "WebForm1.aspx",  
                fileSuffixs: ["jpg", "png", "gif"],  
                buttonFeature: true,  
                errorText: "{0}",  
                maximumFilesUpload: 5,//最大文件上传数  
                onComplete: function (msg) {  
                    $("#testdiv").html(msg);  
                },  
                perviewImageElementId: "fileList", //设置预览图片的元素id  
                perviewImgStyle: { width: '100px', height: '100px', border: '1px solid #ebebeb' }//设置预览图片的样式  
            });  
  
            var upload = btn.data("uploadFileData");  
  
            $("#files").click(function () {  
                upload.submitUpload();  
            });  
        });  
    </script>  
</head>
<body style="background-color:#fff;">
<div id="main">	
	<div id="content">
		<div class="content_top">
			<p><a href="">后台管理</a><a href="">> 掌金街</a><a href="">> 商品</a></p>
		</div>
		<h1 class="shop_title">上传图片</h1>
		<div style="width: 800px; height: 300px; float:left;margin-left:16px;">  
        	<input id="Button1" type="button" value="选择文件" />  
        	<input id="files" type="button" value="上传" />  
        	<div id="fileList" style="margin-top: 10px; padding-top:10px; border-top:1px solid #C0C0C0;font-size: 13px; width:800px;">  
    		</div>  
    	</div>  
    	<div id="testdiv"></div> 
    	<h1 class="shop_title">简介</h1> 
    	<textarea class="jianjie"></textarea>
    	<h1 class="shop_title">属性<span class="shop_del">删除属性</span></h1>
    	<form class="shuxing">
    		<ul>
    			<li class="shuxing_li"><input class="shu_tag" type="text"><span class="back_icon shu_del">&#xf003e;</span><span class="shu_con">确定</span><span class="add_detail">分类</span></li>
    			<li class="var" style="display:none;">
    				<ul>
    					<li class="var_li"><input type="text"><span class="back_icon var_del">&#xf003e;</span><span class="var_con">确定</span></li>
    					<li class="add_var">+ 添加分类</li>
    				</ul>	
    			</li>
    		</ul>
    		<ul>
    			<li class="shuxing_li"><input class="shu_tag" type="text"><span class="back_icon shu_del">&#xf003e;</span><span class="shu_con">确定</span><span class="add_detail">分类</span></li>
    			<li class="var">
    				<ul>
    					<li class="var_li"><input type="text"><span class="back_icon">&#xf003e;</span><span class="var_con">确定</span></li>
    					<li class="add_var">+</li>
    				</ul>	
    			</li>
    		</ul>
    		<div class="add_shu">+ 添加属性</div>
    		<input class="submit" type="submit" value="确认提交">
    	</form>
    	<h4>添加分类</h4>
    	<div class="show_shu"></div>
    	<button class="submit_">确认提交</button>
	</div>	
</div>
</body>
<script type="text/javascript">
	//自适应
	var height = $(window).height();
	var width = $(window).width();
	$('#slider').css('height',height-75);
	$(window).resize(function(){
		var height = $(window).height();
		var width = $(window).width();
		$('#slider').css('height',height-75);
		$('.content_top').css('width',width);
	});
	$('.content_top').css('width',width);
	$('a').on('click',function(){
		return false;
	});
	//搜索
	function doSearch(value){
		alert('You input: ' + value);
	}
	//添加属性
	$('.add_shu').on('click',function(){
		var shu = "<ul><li class='shuxing_li'><input class='shu_tag' type='text'><span class='back_icon shu_del'>&#xf003e;</span><span class='shu_con'>确定</span><span class='add_detail'>分类</span></li><li class='var' style='display:none;''><ul><li class='var_li'><input type='text'><span class='back_icon var_del'>&#xf003e;</span><span class='var_con'>确定</span></li><li class='add_var'>+</li></ul></li></ul>";
    	$(this).before(shu);
    	//删除
    	$('.shu_del').on('click',function(){
			$(this).parents('ul').remove();
		});
		$('.shu_con').on('click',function(){
			$(this).parent().find('input').attr('disabled','disabled').css('text-align','center');
			$(this).css('display','none');
			$(this).next().css('display','block');	
			$('.add_detail').on('click',function(){
				var text = $(this).parents('ul').find('.var').html();
				$('.show_shu').html(text);
				$('.var_con').on('click',function(){
					$(this).parent().find('input').attr('disabled','disabled').css('text-align','center');
					$(this).css('display','none');
				});
				$('.var_del').on('click',function(){
					$(this).parent().remove();
				});
				$('.add_var').on('click',function(){
					var var_li = "<li class='var_li'><input type='text'><span class='back_icon var_del'>&#xf003e;</span><span class='var_con'>确定</span></li>";
					$(this).before(var_li);
				});
			});
		});
	});
	$('.shu_del').on('click',function(){
		$(this).parents('ul').remove();
	});
	$('.shu_con').on('click',function(){
		$(this).parent().find('input').attr('disabled','disabled').css('text-align','center');
		$(this).css('display','none');
		$(this).next().css('display','block');	
		$('.add_detail').on('click',function(){
			var text = $(this).parents('ul').find('.var').html();
			$('.show_shu').html(text);
			$('.var_con').on('click',function(){
				$(this).parent().find('input').attr('disabled','disabled').css('text-align','center');
				$(this).css('display','none');
			});
			$('.var_del').on('click',function(){
				$(this).parent().remove();
			});
			$('.add_var').on('click',function(){
				var var_li = "<li class='var_li'><input type='text'><span class='back_icon var_del'>&#xf003e;</span><span class='var_con'>确定</span></li>";
				$(this).before(var_li);
			});
		});
	});
	//shop_del
	$('.shop_del').on('click',function(){
		$('.back_icon').css('display','block');
	});
	//提交
	$('.submit_').on('click',function(){
		$('.submit').trigger('click');
	});
</script>
</html>