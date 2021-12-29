<?php
$flag1="flag1";
$flag2="flag2";

//危險函數,可能會造成getshell

// 1.eval 把字符串当成 PHP 代码来计算
// payload : system("ls");
// 常用的poc phpinfo();
eval($_GET["cmd2"]);

// 2.passthru  直接執行系統命令
// payload : id
$cmd1=$_GET["cmd1"];
if($cmd1)
{
    // https://www.runoob.com/w3cnote/php-safe-collection.html
    passthru($cmd1);
}

// 函數繞過
// 鬆散比較
// https://www.runoob.com/php/php-types-comparisons.html
$a=$_GET['a']; 
$b=$_GET['b']; 
if($a==0 and $a){ 
    echo $flag1; 
}
echo var_dump($b); 
if(is_numeric($b)){ 
    exit(); 
} 
if($b>1234){ 
    // php的"1234s" == 1234
    echo $flag2; 
} 
?>