<?php 
show_source(__FILE__); 
include("flag.php"); 
$a=@$_GET['a']; 
$b=@$_GET['b']; 
if($a==0 and $a){
    // payload=s 
    echo $flag1; 
} 
if(is_numeric($b)){ 
    exit(); 
} 
if($b>1234){ 
	// payload="1234s"
    echo $flag2; 
}
// extend:// https://www.runoob.com/php/php-types-comparisons.html 
?> 