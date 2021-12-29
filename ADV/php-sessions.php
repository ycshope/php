<?php
// Session 变量
// 您在计算机上操作某个应用程序时，您打开它，做些更改，然后关闭它。
// 这很像一次对话（Session）。计算机知道您是谁。它清楚您在何时打开和关闭应用程序。
// 然而，在因特网上问题出现了：由于 HTTP 地址无法保持状态，Web 服务器并不知道您是谁以及您做了什么。
// PHP session 解决了这个问题，它通过在服务器上存储用户信息以便随后使用（比如用户名称、购买商品等）。
// 然而，会话信息是临时的，在用户离开网站后将被删除。如果您需要永久存储信息，可以把数据存储在数据库中。
// Session 的工作机制是：为每个访客创建一个唯一的 id (UID)，并基于这个 UID 来存储变量。UID 存储在 cookie 中，或者通过 URL 进行传导。
//應該是這麽理解:cookie雖然可以用於記錄用戶是誰,但是無法確定用戶是否登錄,session更多是用來確認用戶在綫和用戶當前的狀態信息

// session_start() 函数必须位于 <html> 标签之前：
session_start();
//  一旦設置cookie,就會在cookie添加一個sessionid的key-value

// ref:https://www.runoob.com/php/php-sessions.html
if(isset($_SESSION['views']))
{
    $_SESSION['views']=$_SESSION['views']+1;
}
else
{
    $_SESSION['views']=1;
    // 销毁 Session
    // unset($_SESSION['views']);
    // session_destroy();
}
?>
<html>
<head>
<meta charset="utf-8">
<title>菜鸟教程(runoob.com)</title>
</head>
<body>
 
<?php
// 检索 session 数据
echo "浏览量：". $_SESSION['views'];
?>
</body>
</html>

