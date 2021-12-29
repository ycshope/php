<?php
// PHP 过滤器
// PHP 过滤器用于验证和过滤来自非安全来源的数据，比如用户的输入。
// ref:https://www.runoob.com/php/php-filter.html

// 函数和过滤器
// 如需过滤变量，请使用下面的过滤器函数之一：
// filter_var() - 通过一个指定的过滤器来过滤单一的变量
// filter_var_array() - 通过相同的或不同的过滤器来过滤多个变量
// filter_input - 获取一个输入变量，并对它进行过滤
// filter_input_array - 获取多个输入变量，并通过相同的或不同的过滤器对它们进行过滤

$filters = array
(
    // 類似schema
    "name" => array
    (
        "filter"=>FILTER_SANITIZE_STRING
    ),
    "age" => array
    (
        "filter"=>FILTER_VALIDATE_INT,
        "options"=>array
        (
            "min_range"=>1,
            "max_range"=>120
        )
    ),
    "email"=> FILTER_VALIDATE_EMAIL,
    // "http://www.ruåånoøøob.com/"，则净化后的 $url 变量如下所示：->http://www.runoob.com/
    "url"=>FILTER_SANITIZE_URL
);
 
$result = filter_input_array(INPUT_GET, $filters);
 
if (!$result["age"])
{
    echo("年龄必须在 1 到 120 之间。<br>");
}
elseif(!$result["email"])
{
    echo("E-Mail 不合法<br>");
}
else
{
    echo("输入正确");
}
// /ADV/php-filter.php?age=100&name=z&email=1@qq.com


// Filter Callback
function convertSpace($string)
{
    return str_replace("_", ".", $string);
}
 
$string = "www_runoob_com!";
 
echo filter_var($string, FILTER_CALLBACK,
array("options"=>"convertSpace"));
?>