<?php
$auth = '0';
// import_request_variables() 函数将 GET／POST／Cookie 变量导入到全局作用域中。该函数在最新版本的 PHP 中已经不支持。
// 版本要求：PHP 4 >= 4.1.0, PHP 5 < 5.4.0
import_request_variables('G');

if($auth == 1){
    echo "private!";
}else{
    echo "public!";
}
?>