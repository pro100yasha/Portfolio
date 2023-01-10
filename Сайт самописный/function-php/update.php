<?php 
require('connect_db.php');

$image = $_FILES['img'];
$filename = $_POST['image'];
move_uploaded_file($image['tmp_name'], "../" .$filename);
$title = $_POST['title'];
$category = $_POST['category'];
$subcategory = $_POST['subcategory'];
$age = $_POST['age'];
$price = $_POST['price'];
$description = $_POST['description'];
$id = $_POST['id'];

mysqli_query($connect, "UPDATE `items` SET `title` = '$title', `price` = '$price', `description` = '$description', `category` = '$category', `subcategory` = '$subcategory', `min-age` = '$age' WHERE `items`.`id` = $id");

header("Location: /update_items.php?id=$id");
?>