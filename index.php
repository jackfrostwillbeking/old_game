<?php
require_once('define.inc');
//URIチェック&転送
$str_uri = rtrim($_SERVER["REQUEST_URI"], '/');
foreach(GameDefine::$dir as $url => $file){
    if(strcmp($url,$str_uri) == 0){
        header("Location: " . GameDefine::FRONT_SERVER_URL ."/typing/". $file);
        exit();
    }else{
        header("Location: " . GameDefine::FRONT_SERVER_URL ."/typing/top.html");
        exit();
    }
}
