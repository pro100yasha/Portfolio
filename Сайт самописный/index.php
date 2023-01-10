<?php
require('header.php');
require("function-php/connect_db.php");
?>

<body class="index">
    <div class="popular">
        <h1 class="about-h1">Популярные серии</h1>
        <div class="popular-type">
            <a href="items.php?subcategory=Minecraft"><img src="img/minecraft.png" alt="Mincraft" class="minecraft"></a>
            <a href="items.php?subcategory=City"><img src="img/city.png" alt="City" class="city"></a>
            <a href="items.php?subcategory=Star Wars"><img src="img/star_wars.png" alt="Star Wars" class="star"></a>
            <a href="items.php?subcategory=Harry Potter"><img src="img/harry_potter.png" alt="Harry Potter" class="harry"></a>
        </div>
    </div> 
    <h1 class="about-h1">Новые товары</h1>
    <div class="body">
        <div class="items">
            <?php for($i = count($items) - 1; $i > count($items) - 17; $i--) {
                $item = $items[$i]; ?>
            <div class="item">
            <a href="item.php?id=<?=$item[0]?>" class="item-link">
            <div class="item-img"><img class="item-img" src="<?=$item[6]?>" alt="<?= $item[1]?>"></div>
                <div class="item-title"><?= $item[1]?></div>
                <div class="item-price"><?= $item[2]?></div>
                </a>   
                <a class="item-button" href="item.php?id=<?=$item[0]?>">Купить</a>
            </div>
            <?php 
            }
            ?>
        </div>
    </div>
</body>
<?php
require('footer.php');
?>