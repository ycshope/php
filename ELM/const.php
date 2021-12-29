<?php
echo "常量的特点
        1.不需要加 $ 修饰符
        2.全局可见
        3.不可修改";

define("a",123);

function myTest() {
    echo a;
}

myTest();

?>
