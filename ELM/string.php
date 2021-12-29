<?php
echo <<<EOF
        字符串变量
EOF;

echo "并置运算符";
$txt1="Hello world!";
$txt2="What a nice day!";
echo $txt1 . " " . $txt2; #Hello world! What a nice day!

echo "strlen() 函数";
echo strlen("Hello world!"); #12

echo "strpos() 函数";
echo strpos("Hello world!","world"); #6
echo strpos("Hello world!","nihao"); #没有输出,大但是返回值应该是false
?>