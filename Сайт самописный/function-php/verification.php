<?php

session_start();

$connect = mysqli_connect("localhost","Yakov","admin123","lego");
//$connect = mysqli_connect("localhost","yasha","Admin123","lego");
$admin = mysqli_query($connect, "SELECT * FROM `admin`");
$admin = mysqli_fetch_assoc($admin);
$login = $_POST['login'];
$password = $_POST['password'];
$password = md5($password);

if (($login == $admin['login']) && ($password == $admin['password'])){
    $_SESSION["admin"] = true;
    header("Location: ../editor.php");
} else {
    header("Location: ../admin.php");
}
?>