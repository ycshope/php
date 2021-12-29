<html>
<head>
<meta charset="utf-8">
<title>PHP 包含文件</title>
</head>
<body>
<div class="leftmenu">
<?php require 'menu.php'; ?>
</div>
<h1>欢迎来到我的主页!</h1>
<?php 
// include 和 require 除了处理错误的方式不同之外，在其他方面都是相同的：
// require 生成一个致命错误（E_COMPILE_ERROR），在错误发生后脚本会停止执行。
// include 生成一个警告（E_WARNING），在错误发生后脚本会继续执行。
// 因此，如果您希望继续执行，并向用户输出结果，即使包含文件已丢失，那么请使用 include

include 'vars.php';
echo "I have a $color $car"; // I have a red BMW
?>

</body>
</html>