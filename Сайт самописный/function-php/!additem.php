<?php

$item = $_GET['id'];

foreach($_COOKIE['id'] as $id => $items){
    if($id == $item){
        if($items > 1){
            $i = (int)$items - 1;
            setcookie('id['.$item.']', $i, time() + 604800,"/");
        } else {
            require("delete_item.php");
        }
    } 
}

$redicet = $_SERVER['HTTP_REFERER'];
@header ("Location: $redicet");
die;
?>