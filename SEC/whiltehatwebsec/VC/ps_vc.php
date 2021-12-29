<?php
// payload:?var=new
$var='init';
parse_str($_SERVER['QUERY_STRING']);

// refer:https://www.runoob.com/php/func-string-parse-str.html
// 定义和用法
// parse_str() 函数把查询字符串解析到变量中。
// 注释：如果未设置 array 参数，由该函数设置的变量将覆盖已存在的同名变量。
// 注释：php.ini 文件中的 magic_quotes_gpc 设置影响该函数的输出。如果已启用，那么在 parse_str() 解析之前，变量会被 addslashes() 转换。
print $var;


// 防御思路:
// 指定第二个参数
?>