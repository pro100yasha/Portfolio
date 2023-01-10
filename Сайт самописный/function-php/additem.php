<?php

$item = $_GET['id'];
$boolean = true;

if(isset($_COOKIE['id'])){
    foreach($_COOKIE['id'] as $id => $items){
        if($id == $item){
            $i = (int)$items + 1;
            setcookie('id['.$item.']', $i, time() + 604800,"/");
            $boolean = false;
        } 
    }
}

if($boolean){
    setcookie('item['.$item.']', 1 , time() + 604800,"/");
    setcookie('id['.$item.']', 1, time() + 604800,"/");
    if(isset($_COOKIE['counter'])){
        setcookie('counter', (int)$_COOKIE['counter'] + 1, time() + 604800,"/");
    } else {
        setcookie('counter', 1 , time() + 604800,"/");
    }
}
    
$redicet = $_SERVER['HTTP_REFERER'];
@header ("Location: $redicet");
die;
?>
