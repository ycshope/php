<html>

<body>
    <h1>PHP 文件处理</h1>
    <?php
    // 讀取文件
    // 注释：如果 fopen() 函数无法打开指定文件，则返回 0 (false)。
    // 在 w 、a 和 x 模式下，您无法读取打开的文件！
    $file = fopen("welcome.txt", "r") or exit("Unable to open file!");

    // feof($file) 檢測文件結束
    while (!feof($file)) {

        // 读取文件每一行，直到文件结尾
        echo fgets($file) . "<br>";

        // 逐字符地读取文件，直到文件末尾为止
        // echo fgetc($file);
    }
    fclose($file);
    ?>

</body>

</html>