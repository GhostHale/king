<?php
/*
 * 页面跳转函数
 * 参数：$str为字符串(警示信息)，警示框输出$str值；$url为跳转的目标地址
 */
function jump($str, $url)
{
    header("Content-type: text/html; charset=utf-8");
    header("Refresh:0.1;url=$url");
    echo "<script type=\"text/javascript\">alert('$str')</script>";
    exit();
}

function jumpback($str){
    header("Content-type: text/html; charset=utf-8");
    echo "<script>alert('$str');history.back(-1);</script>";
    exit();
}
?>