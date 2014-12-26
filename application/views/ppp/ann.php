<!--<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/> 
<title>公告列表</title>
<meta name="description" content="">
<link rel="stylesheet" type="text/css" href="/css/announce.css">
<?php include(APPPATH.'views/top.php');?>
	<div id="main">
		<span class="main_nav"><a href="">首页 </a>> <a href="">公告列表</a></span>
		<h1>最新公告</h1>
		<ul class="announce_list">
			<li>1<span>2014-1-1</span></li>
			<li>2<span>2014-1-1</span></li>
			<li>3<span>2014-1-1</span></li>
			<li>4<span>2014-1-1</span></li>
			<li>5<span>2014-1-1</span></li>
			<li>6<span>2014-1-1</span></li>
			<li>7<span>2014-1-1</span></li>
			<li>8<span>2014-1-1</span></li>
			<li>9<span>2014-1-1</span></li>
			<li>10<span>2014-1-1</span></li>
		</ul>
		<div class="page">
			<a href="" class="first_page">首页</a>
				<a href="" class="page_pre">上一页</a>
				<a href="">1</a>
				<a href="">2</a>
				<a href="">3</a>
				<a href="">4</a>
				<a href="">5</a>
				<a href="" class="page_next">下一页</a>
				<a href="" class="last_page">末页</a>
		</div>
	</div>
<?php include(APPPATH.'views/foot.php');?>-->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/> 
<title>公告列表</title>
<meta name="description" content="">
<link rel="stylesheet" type="text/css" href="/css/announce.css">
<?php include(APPPATH.'views/top.php');?>
	<div id="main">
		<span class="main_nav"><a href="/ppp/main">首页 </a>> <a href="">公告列表</a></span>
		<h1>最新公告</h1>
		<ul class="announce_list">
			<?php 
				for($i=0;$i<$num1;$i++){
					echo '<li>'.($i+1).' '.$result1[$i]['title'].'<span>'.$result1[$i]['time'].'</span></li>';
				}
				
			?>
			
		</ul>
		<div class="page"></div>
	</div>
	    <script type="text/javascript">
        function showData(data){
            var res='';
            for (x in data){
                res+='<li>';
                res+='<a href="" class="first_page">首页</a>';
                res+='<a href="" class="page_pre">上一页</a>';
                res+='<a href="" class="page_next">下一页</a>';
                res+='<a href="" class="last_page">末页</a>';
                res+='</li>';
            }
            $('.page').html(res);
        }
        //function beforeLoad(){
          //  $('.page').html('数据载入中，请稍候……');
        }
    </script>
    <script type="text/javascript" src="/js/listview.js"></script>
<?php include(APPPATH.'views/foot.php');?>