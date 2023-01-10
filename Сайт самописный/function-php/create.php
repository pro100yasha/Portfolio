<?php
require('connect_db.php');

$image = $_FILES['img'];
$filename = time() .$image['name'];
$img = "images/".$filename;
move_uploaded_file($image['tmp_name'], "../images/".$filename);
$title = $_POST['title'];
$category = $_POST['category'];
$subcategory = $_POST['subcategory'];
$age = $_POST['age'];
$price = $_POST['price'];
$description = $_POST['description'];



mysqli_query($connect, "INSERT INTO `items` (`id`, `title`, `price`, `description`, `category`, `subcategory`, `img`, `min-age`) VALUES (NULL, '$title', '$price', '$description', '$category', '$subcategory', '$img', '$age')");

header("Location: ../editor.php");
?>

