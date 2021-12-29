<?php
   class Emp {
       public $name = "";
       public $birthdate = "";
       public $url = "";
   }
   $e = new Emp();
   $e->name = "sachin";
   $e->birthdate = date('m/d/Y h:i:s a', "8/5/1974 12:20:03 p");
   $e->url = array('taobao' => '淘宝网');

   //php object to json
   echo json_encode($e); // 编码中文
    // {"name":"sachin","birthdate":"01\/01\/1970 12:00:08 am","url":{"taobao":"\u6dd8\u5b9d\u7f51"}} 
   echo PHP_EOL;
   echo json_encode($e, JSON_UNESCAPED_UNICODE);  // 不编码中文
   echo PHP_EOL;
   // {"name":"sachin","birthdate":"01\/01\/1970 12:00:08 am","url":{"taobao":"淘宝网"}}



    // PHP json_decode() 函数用于对 JSON 格式的字符串进行解码，并转换为 PHP 变量。
    // 语法
    // mixed json_decode ($json_string [,$assoc = false [, $depth = 512 [, $options = 0 ]]])
    // 参数
    //     json_string: 待解码的 JSON 字符串，必须是 UTF-8 编码数据
    //     assoc: 当该参数为 TRUE 时，将返回数组，FALSE 时返回对象。
    //     depth: 整数类型的参数，它指定递归深度
    //     options: 二进制掩码，目前只支持 JSON_BIGINT_AS_STRING 。
    $json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
    var_dump(json_decode($json, true));
?>