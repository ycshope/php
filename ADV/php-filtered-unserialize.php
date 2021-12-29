<?php
class MyClass1 { 
   public $obj1prop;   
}
class MyClass2 {
   public $obj2prop;
}


$obj1 = new MyClass1();
$obj1->obj1prop = 1;
$obj2 = new MyClass2();
$obj2->obj2prop = 2;

$serializedObj1 = serialize($obj1);
$serializedObj2 = serialize($obj2);

#PHP 7 增加了可以为 unserialize() 提供过滤的特性，可以防止非法数据进行代码注入，提供了更安全的反序列化数据。
print($serializedObj1); #O:8:"MyClass1":1:{s:8:"obj1prop";i:1;}
print(PHP_EOL);
// 默认行为是接收所有类
// 第二个参数可以忽略
// 如果 allowed_classes 设置为 false, unserialize 会将所有对象转换为 __PHP_Incomplete_Class 对象
$data = unserialize($serializedObj1 , ["allowed_classes" => true]);

// 转换所有对象到 __PHP_Incomplete_Class 对象，只允许 MyClass1 和 MyClass2 转换到 __PHP_Incomplete_Class
$data2 = unserialize($serializedObj2 , ["allowed_classes" => ["MyClass1", "MyClass2"]]);

print($data->obj1prop); #1
print(PHP_EOL);
print($data2->obj2prop); #2
?> 