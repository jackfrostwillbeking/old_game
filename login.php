<?php
session_start();
require_once('define.inc');  
require_once('fw/CurlManager.php');
require_once('fw/Smarty.php');
require_once('input.php');
//ログインしてなくてログインページからのPOSTも無い場合
if (!isset($_COOKIE[session_name()]) && !isset($_POST['name'])){
    header('Location: ' . GameDefine::FRONT_SERVER_URL .'/typing');
    exit();
}
//ログインページかゲームページからのpostがあった場合
if(isset($_POST['name'])){
    $_SESSSION['username'] = $_POST['name'];
}
//ログインしてる場合
if(isset($_SESSSION['username']) && isset($_COOKIE[session_name()])){
    $name = isset($_SESSSION['username']) ? $_SESSSION['username'] : $_COOKIE[session_name()];
    $url = GameDefine::DB_SERVER . 'score.php';
    if(isset($_POST['score'])){//ajaxからpostでスコアが来た時は記録
        Game::save($name,$_POST['score']);
    }
    if(isset($_POST['name'])){
        $tmp_ary_result = Game::getscore($name);
        $ary_result = json_decode($tmp_ary_result['raw'],true);
    }
    $tpl = new View();
    $tpl->assign('ary_result',$ary_result['response']);
    $tpl->assign('user_name',$name);
    $tpl->display('template/game.html');
}
?>
