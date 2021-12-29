<?php
// 注释：setcookie() 函数必须位于 <html> 标签之前。
// 语法
// setcookie(name, value, expire, path, domain);---key=value


// 设置 Cookie
// var_dump($_POST("name"));  為什麽不行?
// setcookie("name", $_POST["name"], time() + 60*60);
// setcookie("age", $_POST["age"], time() + 60*60);

// // 网页刷新后，打印出以下内容
// if (isset($_COOKIE['cookie'])) {
//     foreach ($_COOKIE['cookie'] as $name => $value) {
//         $name = htmlspecialchars($name);
//         $value = htmlspecialchars($value);
//         echo "$name : $value <br />\n";
//     }
// }
// cookie 常用于识别用户
if (isset($_COOKIE['name'])) {
        $name = htmlspecialchars($_COOKIE['name']);
        echo "name : $name <br />\n";
    }
// 刪除cookie,貌似不加時間也是可以刪除
// setcookie("cookie[one]", "", time() - 3600);
// setcookie("cookie[two]", "");
?>
