<?php
echo "\n\necho 和 print \n";
// echo - 可以输出一个或多个字符串,无返回值
// print - 只允许输出一个字符串，返回值总为 1

echo "这是一个", "字符串，", "使用了", "多个", "参数。";
$txt1="学习 PHP";
$txt2="RUNOOB.COM";
$cars=array("Volvo","BMW","Toyota"); //数组的使用
 
print $txt1;
print("<br>");  //print "" 或者print()都可以,echo也一样
print "在 $txt2 学习 PHP ";
print "<br>";
print "我车的品牌是 {$cars[0]}\n";  //是否加{}区别看起来不大,print不会换行
// 这是一个字符串，使用了多个参数。学习 PHP<br>在 RUNOOB.COM 学习 PHP <br>我车的品牌是 Volvo

?>