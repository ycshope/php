<?php
$auth = '0';
extract($_GET);
// extract(array,extract_rules,prefix) 
// extract_rules
// EXTR_OVERWRITE - 默认。如果有冲突，则覆盖已有的变量。
// EXTR_SKIP - 如果有冲突，不覆盖已有的变量。

// payload=extract_var_cover.php?auth=1
if($auth == 1){
    echo "private!";
}else{
    echo "public!";
}

// 解决方法:
// 1.EXTR_SKIP
// 2.register_globals=OFF
?>