<?php
require_once("define.inc");
require_once("fw/Curl.php");
class Game{
    public function save($name,$score){
        try{
            $url= GameDefine::DB_SERVER . 'score.php';
            $POST_DATA = [
                'mode' => 'insert',
                'name'  => $name,
                'score' => $score,
            ];
            $curl = new CurlPost($url,$POST_DATA);
            $ary_result = $curl->get_result();
            if($ary_result['status'] !== 200){
                error_log(print_r($ary_result, true).$name.$score."insert失敗"."\n", 3, '/var/www/html/log');
                exit();
            }        
        } catch (Exception $e) {
            header('Content-Type: application/json; charset=utf-8');
            echo '捕捉した例外: ',  $e->getMessage(), "\n";
        }
    }
    public function getscore($name){
        try{
            $url= GameDefine::DB_SERVER . 'score.php';
            $POST_DATA = [
                'mode' => 'select',
                'name'  => $name,
            ];
            $curl = new CurlPost($url,$POST_DATA);
            $ary_result = $curl->get_result();
            if($ary_result['status'] !== 200){
                error_log(print_r($ary_result, true)."select失敗"."\n", 3, '/var/www/html/log');
                exit();
            } 
            return $ary_result;
        } catch (Exception $e) {
            header('Content-Type: application/json; charset=utf-8');
            echo '捕捉した例外: ',  $e->getMessage(), "\n";
        }
    }
}