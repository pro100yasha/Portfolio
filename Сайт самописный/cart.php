<?php
require('header.php');
require('function-php/connect_db.php');
?>


<body>
    <div class="div-cart">
        
        <h1 class="about-h1">Корзина</h1>
        <?php 
        if(isset($_COOKIE['id'])){
            $GLOBALS['total'] = 0;
            foreach($_COOKIE['item'] as $itemid => $yes){
        foreach($_COOKIE['id'] as $id => $items){
            if($itemid == $id){
            $itemid = mysqli_query($connect, "SELECT * FROM `items` WHERE `id` = '$id'");
            $itemid = mysqli_fetch_assoc($itemid);
            ?>
            <div class="cart-items">
                <img class="" src="<?=$itemid['img']?>" alt="<?=$itemid['title']?>">
                <div class="cart-title"><a href="item.php?id=<?=$itemid['id']?>" class="cart-title"><?=$itemid['title']?></a></div>
                <div class="cart-numbers">
                <a href="function-php/!additem.php?id=<?=$id?>" class="cart-buttons">-</a>
                <div class="cart-quantity"><input id="inp" min="1" max="99" type="number" value="<?= $items?>" readonly></div>
                <a href="function-php/additem.php?id=<?=$id?>" class="cart-buttons">+</a>
                </div>
                <div id="num" class="cart-price"> <?= $items * $itemid['price']?>₽</div>
                <a href="function-php/delete_item.php?id=<?=$id?>" class="cart-delete">&#10006 удалить</a>
                <?php $GLOBALS['total'] = (int)$GLOBALS['total'] + ($items * $itemid['price'])?>
            </div>
            
            <?php }}}?>
            <div class="cart-total">
                <p id="sum">Итого: <?=$GLOBALS['total']?>₽</p>
                <a class="place-an-order">Оформить заказ</a>
            </div>
            <div class="cart-popup">
                <h2>Оформить заказ</h2>
                <form action="function-php/email.php" method="post">
                    <input type="email" name="email" placeholder="Email"required>
                    <input type="text" name="name" placeholder="Имя" required>
                    <input type="text" name="surname" placeholder="Фамилия" required>
                    <input type="number" name="number" max="1000000000000000" min="9999999999999999" placeholder="Номер карты" required>
                    <input type="number" name="srok" max="9999" min="1000" placeholder="Срок карты" required>
                    <input type="number" name="svv" max="999" min="100" placeholder="SVV код" required>
                    <input type="submit" value="Отправить">
                    <a class="close-popup">&#10006</a>
                </form>
            </div>
            <?php } else {?>
                <div class="cart-span">Корзина пуста</div>
                <?php }?>
    </div>
            <script src="cart-popup.js"></script>
</body>

<?php
    require('footer.php');
?>