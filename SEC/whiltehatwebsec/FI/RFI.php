<?php
//原因:php的配置選項allow_url_include為NO,那麽include/require函數可以加載遠程文件
// 危害:命令執行

//寫法1.限定文件類型
//繞過:
// 1.\0截斷
// 2.?截斷
// background info:
// ?後面的代碼會被解釋成URL的querystring
if($route=="share"){
    require_once $basePath . '/action/m_share.php';
}elseif ($route=="sharelink"){
    require_once $basePath . '/action/m_sharelink.php';
}

// c2的payload，
echo system("ver;");


//防禦方法:
// 1.設置php的allow_url_include 為OFF
?>