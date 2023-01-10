<?php 
    require('header.php');
    require("function-php/connect_db.php");

    $item_id = $_GET['id'];
    $item = mysqli_query($connect, "SELECT * FROM `items` WHERE `id` = '$item_id'");
    $item = mysqli_fetch_assoc($item);
?>
    


<body>
    <div class="card">
        <div class="card-img">
            <img src="<?=$item['img']?>" alt="<?=$item['title']?>">
        </div>
        <div class="card-info">
            <h2><?=$item['title']?> <div class="item-age"><div><?= $item['min-age']?>+</div></div></h2>
            <h3 class="card-price">Цена: <?=$item['price']?></h3>
            <div><a class="card-button" href="function-php/additem.php?id=<?=$item["id"]?>&price=<?= $item["price"]?>">Купить</a></div>
            <h2>Описание:</h2>
            <p class="card-description"><?=$item['description']?></p>
        </div>
    </div>
</body>
<?php
require('footer.php');
?>