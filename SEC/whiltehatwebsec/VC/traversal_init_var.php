<?php
#覆盖$chs即可
$chs='';
if($_GET && $charset !='utf-8'){
    $chs= new Chinese('UTF-8',$charset);
    foreach($_GET as $key=>$value){
        // $$k可能覆盖已有的变量
        $$key=$chs->Convert($value);
    }
    unset($chs);
}
?>