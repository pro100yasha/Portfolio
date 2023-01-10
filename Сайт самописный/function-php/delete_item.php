<?php

$id = $_GET['id'];
setcookie('id['.$id.']', null, -1, "/");
setcookie('item['.$id.']', null, -1, "/");

if($_COOKIE['counter']>1){
    setcookie('counter', (int)$_COOKIE['counter'] - 1, time() + 604800,"/");
}else{
    setcookie('counter', null, -1, "/");
}

$redicet = $_SERVER['HTTP_REFERER'];
@header ("Location: $redicet");
die;
?>