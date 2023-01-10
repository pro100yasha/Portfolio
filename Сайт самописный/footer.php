<?php 
require("function-php/connect_db.php");
$subc = mysqli_query($connect, "SELECT * FROM `subcategories` WHERE `category` = 'Конструкторы'");
$subc = mysqli_fetch_all($subc);

$suba = mysqli_query($connect, "SELECT * FROM `subcategories` WHERE `category` = 'Аксессуары'");
$suba = mysqli_fetch_all($suba);
?>
<footer>
    <div class="footer-info">
        <div class="logo-box">
            <a href="."><img src="img/logo.png" alt="" class="footer-logo"></a>
        </div>
        <ul>
            <li><p class="footer-head">Конструкторы</p></li>
            <?php   
                foreach($subc as $subcs){
            ?>
            <li><a href="items.php?subcategory=<?=$subcs[1]?>"><?=$subcs[1]?></a></li>
            <?php }?>
        </ul>
        <ul>
            <li><p class="footer-head">Аксессуары</p></li>
            <?php 
                foreach($suba as $subas){
            ?>
            <li><a href="items.php?subcategory=<?=$subas[1]?>"><?=$subas[1]?></a></li>
            <?php }?>
        </ul>
        <ul>
            <li><p class="footer-head">Дополнительная информация</p></li>
            <li><a href="about.php">О нас</a></li>
            <li><a href="delivery.php">Доставка</a></li>
        </ul>
    </div>
    <div class="copyright">
        <p>© Исаков Яков. Официальный поставщик продукции Lego. Сайт используется в образовательных целях*.</p>   
    </div>
        <script src="menu.js"></script>
        <script src="menu-category.js"></script>
</footer>