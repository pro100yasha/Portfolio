<?php

session_start();

$admin = isset($_SESSION["admin"]);

require("function-php/connect_db.php");
    $subc = mysqli_query($connect, "SELECT * FROM `subcategories` WHERE `category` = 'Конструкторы'");
    $subc = mysqli_fetch_all($subc);

    $suba = mysqli_query($connect, "SELECT * FROM `subcategories` WHERE `category` = 'Аксессуары'");
    $suba = mysqli_fetch_all($suba);
?>

<!DOCTYPE html>
<html lang="ru">
<head class="html">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="delivery.css">
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="editor.css">
    <link rel="stylesheet" href="item.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Конструкторы lego для тебя и всей твоей семьи от 1.5 до 99 лет">
    <meta name="keywords" content="лего,lego,lego harry potter, lego duplo, lego marvel,lego classic,lego city">
    <title>Lego shop</title>
</head>
<header>
<div class="header">
    <div class="header-1">
        <a href="." class="logo-div"logo-box-head><img src="img/logo.png" alt="Lego shop" class="logo"></a>
        <div class="header-bottons">
            <button class="buttons constructor">Конструкторы</button>
            <div class="constructor-menu">
                <dl>
                <dt>
                    <input type="checkbox" name="check-menu" id="check-menu1" class="checkbox-menu1">
                    <label for="check-menu1">Наборы по сериям</label>
                </dt>
                <div class="dd1 displaynone">
                    <a href="all_items.php?category=Конструкторы">Все серии</a><br>
                    <?php 
                    foreach ($subc as $subcs) {
                    ?>
                    <a href="items.php?subcategory=<?=$subcs[1]?>"><?=$subcs[1]?></a><br>
                    <?php }?>
                </div>
                    <dt>
                    <input type="checkbox" name="check-menu2" id="check-menu2" class="checkbox-menu2">
                        <label for="check-menu2">Наборы по возрастам</label>
                    </dt>
                    <div class="dd2 displaynone">
                        <a href="itemsAge.php?min-age=1.5">1.5+</a><br>
                        <a href="itemsAge.php?min-age=4">4+</a><br>
                        <a href="itemsAge.php?min-age=6">6+</a><br>
                        <a href="itemsAge.php?min-age=9">9+</a><br>
                        <a href="itemsAge.php?min-age=13">13+</a><br>
                        <a href="itemsAge.php?min-age=18">18+</a><br>
                    </div>
                </dl>
            </div>
            <button class="buttons accessories">Аксессуары</button>
                <div class="accessories-menu">
                    <a class="menu-link" href="all_items.php?category=Аксессуары">Все акссеруары</a><br>
                    <?php 
                    foreach ($suba as $subas) {
                    ?>
                    <a class="menu-link" href="items.php?subcategory=<?=$subas[1]?>"><?=$subas[1]?></a><br>
                    <?php }?>
                </div>
            <a href="delivery.php">Доставка</a>
            <a href="about.php">О нас</a>
        </div>
    </div>
        <div class="header-bottons">
            <?php if(isset($_COOKIE['counter'])){?>
            <div class="header-number"><?= $_COOKIE['counter']?></div>
            <?php }?>
            <a href="cart.php" class="basket">Корзина</a>
            <?php if(!$admin){?>
            <a href="admin.php" class="log-in">Войти</a>
            <?php } else {?>
                <a href="editor.php" class="edit">Редактор</a>
            <?php }?>
        </div>
    </div>
    <?php
    require("buttonTop.php");
?>
</header>