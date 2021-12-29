<?php
echo "\n变量\n";
$x=1;$y=2;
$z=$x+$y;
echo "$z\n";

echo "\nglobal关键字\n";
$x=5;
$y=10;
 
function myTest()
{
    // 写法1
    // global $x,$y; 
    // $y=$x+$y;

    // 写法2
    $GLOBALS['y']=$GLOBALS['x']+$GLOBALS['y'];
}
 
myTest();
echo "$y\n"; // 输出 15

echo "\nStatic 作用域\n";
function myTest2()
{
    
    static $x=0;
    echo $x; //0
    $x++;
    echo PHP_EOL;    // 换行符
}
 
myTest2(); //0
myTest2(); //1
myTest2(); //2

echo "\n参数作用域\n";
function myTest3($x)
{
    echo $x . PHP_EOL; 
}
myTest3(5); //5

$a = 1;
{
    // 注：PHP 变量只有一个作用域(函数中除外)
    $a = 2;
}
echo $a . PHP_EOL;
?>