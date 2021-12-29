<?php
//每一次循环，
// 当前数组元素的键与值就都会被赋值给 $key 和 $value 变量（数字指针会逐一地移动），
// 在进行下一次循环时，你将看到数组中的下一个键与值。
$x=array(1=>"Google", 2=>"Runoob", 3=>"Taobao");
foreach ($x as $k => $v)
{
    echo "key  为 " . $k . "，对应的 value 为 ". $v . PHP_EOL;
}


//普通的for
for ($i=1; $i<=5; $i++)  //foreach ($x as $value)
{
    echo "数字为 " . $i . PHP_EOL;
}
?>