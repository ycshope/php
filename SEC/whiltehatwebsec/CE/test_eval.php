<?php
$string = "beautiful";
$time = "winter";
 
$str = 'This is a $string $time morning!';
echo $str. PHP_EOL;
//解析了当中的变量
eval("\$str = \"$str\";"); //This is a beautiful winter morning! 
echo $str;
?>
