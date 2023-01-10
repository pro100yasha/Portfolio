<?php

$connect = mysqli_connect("localhost","Yakov","admin123","lego");
//$connect = mysqli_connect("localhost","yasha","Admin123","lego");
$items = mysqli_query($connect, "SELECT * FROM `items`");
$items = mysqli_fetch_all($items);

?>