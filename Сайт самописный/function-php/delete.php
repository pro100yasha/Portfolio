<?php 
require('connect_db.php');

$id = $_GET['id'];
$item = mysqli_query($connect, "SELECT * FROM `items` WHERE `id` = '$id'");
$item = mysqli_fetch_assoc($item);


unlink("../".$item['img']);

mysqli_query($connect,  "DELETE FROM items WHERE `items`.`id` = '$id'");

header("Location: /editor.php");
?>