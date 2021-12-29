<?php
// PHP支持的由Daniel Stenberg创建的libcurl库
// 允许你与各种的服务器使用各种类型的协议进行连接和通讯。
// libcurl目前支持http、https、ftp、gopher、telnet、dict、file和ldap协议。
// libcurl同时也支持HTTPS认证、HTTP POST、
// HTTP PUT、 FTP 上传(这个也能通过PHP的FTP扩展完成)、HTTP 基于表单的上传、代理、cookies和用户名+密码的认证。
// PHP中使用cURL实现Get和Post请求的方法

// 因为需要在 php 开发中对接其它接口需要用 php curl 去对接其它接口 我把他们封装成函数 希望能对大家有所帮助。
// 这里面是封装好的会自动把 data 进行转成 json 格式，同时解码成 php 数组输出。
function geturl($url){
        $headerArray =array("Content-type:application/json;","Accept:application/json");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headerArray);
        $output = curl_exec($ch);
        curl_close($ch);
        $output = json_decode($output,true);
        return $output;
}


function posturl($url,$data){
        $data  = json_encode($data);    
        $headerArray =array("Content-type:application/json;charset='utf-8'","Accept:application/json");
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,FALSE);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl,CURLOPT_HTTPHEADER,$headerArray);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return json_decode($output，true);
}


function puturl($url,$data){
    $data = json_encode($data);
    $ch = curl_init(); //初始化CURL句柄 
    curl_setopt($ch, CURLOPT_URL, $url); //设置请求的URL
    curl_setopt ($ch, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); //设为TRUE把curl_exec()结果转化为字串，而不是直接输出 
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"PUT"); //设置请求方式
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//设置提交的字符串
    $output = curl_exec($ch);
    curl_close($ch);
    return json_decode($output,true);
}

function delurl($url,$data){
    $data  = json_encode($data);
    $ch = curl_init();
    curl_setopt ($ch,CURLOPT_URL,$put_url);
    curl_setopt ($ch, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "DELETE");   
    curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
    $output = curl_exec($ch);
    curl_close($ch);
    $output = json_decode($output,true);
}

function patchurl($url,$data){
    $data  = json_encode($data);
    $ch = curl_init();
    curl_setopt ($ch,CURLOPT_URL,$url);
    curl_setopt ($ch, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "PATCH");  
    curl_setopt($ch, CURLOPT_POSTFIELDS,$data);     //20170611修改接口，用/id的方式传递，直接写在url中了
    $output = curl_exec($ch);
    curl_close($ch);
    $output = json_decode($output);
    return $output;
}
?>