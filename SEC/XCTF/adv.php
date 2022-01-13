<?php
// strstr() 函数搜索字符串在另一字符串中是否存在，如果是，返回该字符串及剩余部分，否则返回 FALSE。
// 该函数是区分大小写的。如需进行不区分大小写的搜索，请使用 stristr() 函数。

echo strstr("Hello world!","world") . PHP_EOL ;  //world!
//如果是數字那麽就當作ascii來處理
print strstr("Hello world!",111) . PHP_EOL; //o world!
//返回第一次匹配之前的
print strstr("Hello world!","world",true) . PHP_EOL;  //Hello

$_GET['id'] = urldecode($_GET['id']); 
if($_GET['id'] == "admin") 
{
    print "Access granted!"; 
    print "Key: xxxxxxx"; 
}
?>