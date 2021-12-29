<html>
<?php

// 函数检查 HTTP 报头是否发送/已发送到何处
// 语法
// headers_sent(file,line)
// file,line 	可选。如果设置 file 和 line 参数，
// headers_sent() 会把输出开始的 PHP 源文件名和行号存入 file 和 line 变量中。
if (!headers_sent())
{
    setcookie("TestCookie", "SomeValue");

    // header(string,replace,http_response_code) 
    // string 	必需。规定要发送的报头字符串。
    // replace 	可选。指示该报头是否替换之前的报头，或添加第二个报头。默认是 TRUE（替换）。FALSE（允许相同类型的多个报头）。
    // http_response_code 	可选。把 HTTP 响应代码强制为指定的值。（PHP 4.3 以及更高版本可用）
    header("X-Sample-Test: foo");
    header('Content-type: text/plain');
}
?>

<html>

<body>

    <?php
    // headers_list() 函数返回已发送的（或待发送的）响应头部的一个列表。
    // 该函数返回包含报头的数组。
    // What headers are to be sent?
    var_dump(headers_list());
    ?>

</body>

</html>