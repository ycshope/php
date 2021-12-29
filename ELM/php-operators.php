<?php
echo "运算符";
echo PHP_EOL;

echo " intdiv()#返回值为第一个参数除于第二个参数的值并取整（向下取整）";
echo PHP_EOL;
echo var_dump(intdiv(10, 3)); #3

echo "++, +=, 这些基本都和c++一样,";
echo PHP_EOL;
$x=100; 
$y="100";
var_dump($x !== $y); #bool(true)
echo PHP_EOL;

echo "比较运算符";
echo PHP_EOL;
$a=90;
$b=90;
 
var_dump($a >= $b); #bool(true)
echo PHP_EOL;

echo "比较运算符";
echo PHP_EOL;
$x=6;
$y=3;

var_dump($x==6 or $y==1); # 也可以用||
echo PHP_EOL;

var_dump($x==6 and $y==3); # 也可以用&&
echo PHP_EOL;

var_dump($x==6 xor $y==3);
echo PHP_EOL;

var_dump(!$x);
echo PHP_EOL;

echo "同样还支持<=>和?:运算符"
?>