<?php
function foo()
{
    // unset只能销毁局部变量,销毁要用全局关键字
    unset($GLOBALS['bar']);
}
$bar="something";
foo();
echo $bar;

$auth='0'
?>