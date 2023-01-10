<?php 
    require('header.php');
    require("function-php/connect_db.php");

    $item_category = $_GET['category'];
    $items_category = mysqli_query($connect, "SELECT * FROM `items` WHERE `category` = '$item_category'");
    $items_category2 = mysqli_query($connect, "SELECT * FROM `items` WHERE `category` = '$item_category'");
    $item = mysqli_fetch_assoc($items_category);
    $items_category = mysqli_fetch_all($items_category2);
?>


<body>
    <h1 class="about-h1">Все <?=$item['category']?></h1>
    <div class="body">
        <div class="items">
            <?php foreach($items_category as $item_one){?>
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