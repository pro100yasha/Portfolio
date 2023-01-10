<?php
require('header.php');
require('function-php/connect_db.php');

$item_id = $_GET['id'];
$item = mysqli_query($connect, "SELECT * FROM `items` WHERE `id` = '$item_id'");
$item = mysqli_fetch_assoc($item);

if(!isset($_SESSION["admin"])){
    header("Location: admin.php");
    return;
}

?>
<body>
    <div class="div-editor">
        <form action="function-php/update.php" class="form-editor" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Редактор</legend>
                <div class="fieldset-editor">
                    <input type="hidden" name="id" value="<?= $item['id']?>">
                    <span class="span-id">id:</span>
                    <input type="number" class="id" disabled value="<?=$item['id']?>">
                    <input type="hidden" name="image" value="<?= $item['img']?>">
                    <input type="file" name="img" id="">
                    <input type="text" name="title" id="" placeholder="Название" value="<?= $item['title']?>" maxlength="30">
                    <select name="category" id="category" required>
                        <option value="<?= $item['category']?>" hidden><?= $item['category']?></option>
                        <option value="Конструкторы">Конструкторы</option>
                        <option value="Аксессуары">Аксессуары</option>
                    </select>
                    <select name="subcategory" id="subcategory" required>
                        <div class="constructor-option">
                            <option value="<?= $item['subcategory']?>" id="hidden" hidden><?= $item['subcategory']?></option>
                            <?php
                            foreach($subc as $subcs){
                            ?>
                            <option class="constructors" value="<?= $subcs[1]?>"><?= $subcs[1]?></option>
                            <?php }?>
                            
                        </div>
                        <div class="accessories-option">
                        <?php
                            foreach($suba as $subas){
                        ?>
                            <option class="accessories" value="<?= $subas[1]?>"><?= $subas[1]?></option>
                        <?php }?>
                        </div>
                    </select>
                <select name="age" id="">
                    <option value="<?=$item['min-age']?>" selected><?= $item['min-age']?></option>
                    <option value="1.5">1.5+</option>
                    <option value="4">4+</option>
                    <option value="6">6+</option>
                    <option value="9">9+</option>
                    <option value="13">13+</option>
                    <option value="18">18+</option>
                </select>
                <input type="number" name="price" id="" placeholder="Цена в рублях" required value="<?= $item['price']?>"min="0" max="9999999">
                <textarea name="description" id="" cols="30" rows="10" placeholder="Описание" required><?= $item['description']?></textarea>
                <input type="submit" value="Сохранить">
                <input type="reset" value="Сбросить">
            </div>
            <div class="item example">
                <div class="item-img"><img class="item-img" src="<?= $item['img']?>" alt=""></div>
                <div class="item-title"><?= $item['title']?></div>
                <div class="item-price"><?= $item['price']?></div>
                <div class="item-button"><a>Купить</a></div>
            </div>
            </fieldset>
        </form>
    </div>
    <div class="div-option">
        <a href="editor.php" class="option"><img src="img/back.png"><span>Назад</span></a>
    </div>
    <script src="editor.js"></script>
</body>
<?php
require('footer.php');
?>