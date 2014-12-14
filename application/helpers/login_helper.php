<?php
function setcheck()
{
    $lim = mt_rand(5, 20);
    $str = "";
    for ($a = 0; $a < $lim; $a++)
        $str .= chr(mt_rand(33, 126));
    return md5($str);
}

function check($p){
    $check=substr($p,2,10).substr($p,-12);
    return md5($check);
}
?>