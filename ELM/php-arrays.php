<?php
echo "\n数组\n";
$cars=array("Volvo","BMW","Toyota");
#count方法计算长度
$arrlength=count($cars);
 
for($x=0;$x<$arrlength;$x++)
{
    echo $cars[$x];
    echo "<br>";
}

echo "\n关联数组(字典)\n";

$age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
 
#遍历字典
foreach($age as $x=>$x_value)
{
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}

?>