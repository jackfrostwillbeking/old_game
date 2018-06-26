<?php
require_once("define.inc");
require_once("./game/scoreinsert.php");
$array_check_param = [ 'mode','name' ];
//必須チェック
foreach($array_check_param as $str_need){
    if(!array_key_exists($str_need,$_POST)){ 
        error_log(print_r($key, true)."がありません\n", 3, '/var/www/html/log');
        error_log(print_r($val, true)."がありません\n", 3, '/var/www/html/log');
        return;
    }
}
$hoge=new GameRecord;
$hoge->exec();