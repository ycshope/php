<?php
// 二维数组:
$cars = array
(
    array("Volvo",100,96),
    array("BMW",60,59),
    array("Toyota",110,100)
);

$sites = array
(
    // 创建了一个自动分配 ID 键的多维数组
    "runoob"=>array
    (
        "菜鸟教程",
        "http://www.runoob.com"
    ),
    "google"=>array
    (
        "Google 搜索",
        "http://www.google.com"
    ),
    "taobao"=>array
    (
        "淘宝",
        "http://www.taobao.com"
    )
);
print("<pre>"); // 格式化输出数组
print_r($sites);
print("</pre>");

// 试着显示上面数组中的某个值
echo $sites['runoob'][0] . '地址为：' . $sites['runoob'][1];
// 菜鸟教程地址为：http://www.runoob.com 
?> 