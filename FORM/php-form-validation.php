<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>菜鸟教程(runoob.com)</title>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>

    <?php
    // 定义变量并默认设置为空值
    $nameErr = $emailErr = $genderErr = $websiteErr = "";
    $name = $email = $gender = $comment = $website = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "名字是必需的";
        } else {
            $name = test_input($_POST["name"]);
            // 检测名字是否只包含字母跟空格

            //preg_match — 进行正则表达式匹配。
            // 语法：
            // int preg_match ( string $pattern , string $subject [, array $matches [, int $flags ]] )
            // 在 subject 字符串中搜索与 pattern 给出的正则表达式相匹配的内容。
            // 如果提供了 matches ，则其会被搜索的结果所填充。
            // $matches[0] 将包含与整个模式匹配的文本，
            // $matches[1] 将包含与第一个捕获的括号中的子模式所匹配的文本，以此类推。
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $nameErr = "只允许字母和空格";
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "邮箱是必需的";
        } else {
            $email = test_input($_POST["email"]);
            // 检测邮箱是否合法
            if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
                $emailErr = "非法邮箱格式";
            }
        }

        if (empty($_POST["website"])) {
            $website = "";
        } else {
            $website = test_input($_POST["website"]);
            // 检测 URL 地址是否合法
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
                $websiteErr = "非法的 URL 的地址";
            }
        }

        if (empty($_POST["comment"])) {
            $comment = "";
        } else {
            $comment = test_input($_POST["comment"]);
        }

        if (empty($_POST["gender"])) {
            $genderErr = "性别是必需的";
        } else {
            $gender = test_input($_POST["gender"]);
        }
    }

    //輸入過濾,去掉空字符,過濾反斜杠,特殊字符編碼
    function test_input($data)
    {
        //過濾不必要的空字符
        $data = trim($data);
        // 過濾反斜杠\
        $data = stripslashes($data);
        // 編碼
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>PHP 表单验证实例</h2>
    <p><span class="error">* 必需字段。</span></p>
    <!-- 什么是 $_SERVER["PHP_SELF"] 变量? 
        $_SERVER["PHP_SELF"]是超级全局变量，返回当前正在执行脚本的文件名，与 document root相关。 
        所以， $_SERVER["PHP_SELF"] 会发送表单数据到当前页面，而不是跳转到不同的页面。 -->

    <!--
        $_SERVER["PHP_SELF"] 变量有可能会被黑客使用！
     假設網站的文件名為test_from.php,那麽當用戶訪問時網站會變成
    <form method="post" action="test_form.php"> 

    當用戶訪問下面的url時
    http://localhost/test_form.php/%22%3E%3Cscript%3Ealert('hacked')%3C/script%3E
    =>"><script>alert('hacked')</script>
    以上的 URL 中，将被解析为如下代码并执行：
    <form method="post" action="test_form.php/"><script>alert('hacked')</script>

    解決方案:php編碼處理
     htmlspecialchars() 函数把一些预定义的字符转换为 HTML 实体。
    预定义的字符,PHP編碼,防止XSS    & => &amp  " => &quot; ' => &#039; < => &lt
    -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <!-- 	必须。 +只能包含字母和空格 -->
        名字: <input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error">* <?php echo $nameErr; ?></span>
        <br><br>
        <!-- 必须。 + 必须是一个有效的电子邮件地址（包含'@'和'.'） -->
        E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error">* <?php echo $emailErr; ?></span>
        <br><br>
        <!-- 	可选。如果存在，它必须包含一个有效的URL -->
        网址: <input type="text" name="website" value="<?php echo $website; ?>">
        <span class="error"><?php echo $websiteErr; ?></span>
        <br><br>
        <!-- 可选。多行输入字段（文本域） -->
        备注: <textarea name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea>
        <br><br>
        <!-- 必须。 必须选择一个 -->
        性别:
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">女
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">男
        <span class="error">* <?php echo $genderErr; ?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    echo "<h2>您输入的内容是:</h2>";
    echo $name;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $website;
    echo "<br>";
    echo $comment;
    echo "<br>";
    echo $gender;
    ?>

</body>

</html>