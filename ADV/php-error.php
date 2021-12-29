<?php
// 错误处理函数
function customError($errno, $errstr)
{
    echo "<b>Error:</b> [$errno] $errstr<br>";
    echo "已通知网站管理员";
    // 错误记录
    // 在默认的情况下，根据在 php.ini 中的 error_log 配置，
    // PHP 向服务器的记录系统或文件发送错误记录。
    // 通过使用 error_log() 函数，您可以向指定的文件或远程目的地发送错误记录
    error_log("Error: [$errno] $errstr",1,
    "someone@example.com","From: webmaster@example.com");
}

// 设置错误处理函数
set_error_handler("customError",E_USER_WARNING);
// 错误报告级别

// 这些错误报告级别是用户自定义的错误处理程序处理的不同类型的错误：
// 值 	常量 	描述
// 2 	E_WARNING 	非致命的 run-time 错误。不暂停脚本执行。
// 8 	E_NOTICE 	run-time 通知。在脚本发现可能有错误时发生，但也可能在脚本正常运行时发生。
// 256 	E_USER_ERROR 	致命的用户生成的错误。这类似于程序员使用 PHP 函数 trigger_error() 设置的 E_ERROR。
// 512 	E_USER_WARNING 	非致命的用户生成的警告。这类似于程序员使用 PHP 函数 trigger_error() 设置的 E_WARNING。
// 1024 	E_USER_NOTICE 	用户生成的通知。这类似于程序员使用 PHP 函数 trigger_error() 设置的 E_NOTICE。
// 4096 	E_RECOVERABLE_ERROR 	可捕获的致命错误。类似 E_ERROR，但可被用户定义的处理程序捕获。（参见 set_error_handler()）
// 8191 	E_ALL 	所有错误和警告。（在 PHP 5.4 中，E_STRICT 成为 E_ALL 的一部分）

// 触发错误
$test=2;
if ($test>1)
{
    trigger_error("变量值必须小于等于 1",E_USER_WARNING);
}
?>