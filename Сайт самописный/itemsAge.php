<?php 
    require('header.php');
    require("function-php/connect_db.php");

    $item_age = $_GET['min-age'];
    $items_age2 = mysqli_query($connect, "SELECT * FROM `items` WHERE `min-age` = '$item_age' AND `category` = 'Конструкторы'");
    $items_sub = mysqli_fetch_all($items_age2);
?>


<body>
    <h1 class="about-h1">Наборы LEGO <?=$item_age?>+</h1>
    <div class="body">
        <div class="items">
            <?php foreach($items_sub as $item_one){?>
            <div class="item">
                <a href="item.php?id=<?=$item_one[0]?>" class="item-link">
                <div class="item-img"><img class="item-img" src="<?= $item_one[6]?>" alt="<?= $item_one[1]?>"></div>
                <div class="item-title"><?=$item_one[1]?></div>
                <div class="item-price"><?=$item_one[2]?></div>
                </a>
                <a class="item-button" href="item.php?id=<?=$item_one[0]?>">Купить</a>
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