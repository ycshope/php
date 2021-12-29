<?php
namespace MyProject;


echo '这是第 " '  . __LINE__ . ' " 行';
echo '该文件位于 " '  . __FILE__ . ' " ';
echo '该文件位于 " '  . __DIR__ . ' " ';

class test2 {
    function _print() {
        echo '类名为：'  . __CLASS__ . "<br>";
        echo  '函数名为：' . __FUNCTION__ ;
    }
}
$t = new test2();
$t->_print();

function test3() {
    echo  '函数名为：' . __METHOD__ ;
}
test3();


echo '命名空间为："', __NAMESPACE__, '"'; // 输出 "MyProject"
?>