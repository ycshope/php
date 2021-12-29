 <!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
Name: <input type="text" name="fname">
<input type="submit">
<a href="test_get.php?subject=PHP&web=runoob.com">Test $GET</a>
</form>
<?php 
// PHP 超级全局变量
// PHP中预定义了几个超级全局变量（superglobals） ，
// 这意味着它们在一个脚本的全部作用域中都可用。 你不需要特别说明，就可以在函数及类中使用。

// PHP 超级全局变量列表:

// $GLOBALS
// $_SERVER
// $_REQUEST
// $_POST
// $_GET
// $_FILES
// $_ENV
// $_COOKIE
// $_SESSION
echo "PHP \$_SERVER主要是回显server的信息\n";
echo $_SERVER['PHP_SELF'];  //脚本位置
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
echo $_SERVER['HTTP_REFERER'];
echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME']; 

echo "PHP \$_REQUEST 用于收集HTML表单提交的数据。";
$name = htmlspecialchars($_REQUEST['fname']); 
echo $name; 

echo "PHP \$_POST 用于提交HTML表单的数据。";
$name = htmlspecialchars($_POST['fname']); 
echo $name;

// apache+php加深理解
echo "PHP \$_GET 用于收集HTML表单的数据。";
// <a href="test_get.php?subject=PHP&web=runoob.com">Test $GET</a>
echo "Study " . $_GET['subject'] . " @ " . $_GET['web'];
// Study PHP @ runoob.com  获得了subject和web携带的参数
?>
</body>
</html>