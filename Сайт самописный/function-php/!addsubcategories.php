<?php

require('connect_db.php');

$id = $_GET['id'];
$sybcategory = $_GET['subcategory'];
$sub = mysqli_query($connect, "SELECT * FROM `subcategories`");
$sub = mysqli_fetch_all($sub);

$item_sub = mysqli_query($connect, "SELECT * FROM `items` WHERE `subcategory` = '$sybcategory'");
$item_sub = mysqli_fetch_all($item_sub);

mysqli_query($connect,  "DELETE FROM `subcategories` WHERE `subcategories`.`id` = '$id'");


foreach($item_sub as $items_sub){
    mysqli_query($connect,  "DELETE FROM items WHERE `items`.`id` = '$items_sub[0]'");
}

header("Location: /option.php");
?>