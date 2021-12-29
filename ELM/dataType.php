<?php
echo "\n\n\n数据类型";
echo "\n基本的數據類型都一樣:整形;浮點型;字符串;布爾值;NULL值;數組;對象";
echo  "\nvar_dump可以顯示函數類型\n";

echo "整形\n";
$x = 047; // 八进制数
var_dump($x); //int(39)

echo "浮點型\n";
$x = 10.365;
var_dump($x); //float(10.365)

echo "布爾值\n";
$x=true;
var_dump($x); //bool(true)

echo "數組\n";
$cars=array("Volvo","BMW","Toyota");
var_dump($cars); //array(3)

echo "對象\n";
class Car
{
  var $color;
  //虛構函數
  function __construct($color="green") {
    $this->color = $color;
  }
  function what_color() {
    return $this->color;
  }
}

$car = new Car("yellow");
echo $car->what_color();  #調用方法 yellow
var_dump($car); //object(Car)

echo "null\n";
$x="Hello world!";
$x=null;
var_dump($x);


echo "\n\n类型比较";
echo "
    松散比较：使用两个等号 == 比较，只比较值，不比较类型。
    严格比较：用三个等号 === 比较，除了比较值，也比较类型。
";

if(42 == "42") {
    echo '1、值相等';  
}
 
echo PHP_EOL; // 换行符
 
if(42 === "42") {
    echo '2、类型相等';
} else {
    echo '3、类型不相等';  #類型不同
}

echo "\nPHP中 比较 0、false、null、空字符串
    結論:4者的值都相同,但是類型不同
"
?>