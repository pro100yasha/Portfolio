<?php
require('header.php');
require("function-php/connect_db.php");

if(!isset($_SESSION["admin"])){
    header("Location: admin.php");
    return;
}

?>
<body>
    <div class="div-editor">
        <form action="function-php/create.php" class="form-editor" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Редактор</legend>
                <div class="window-editor">
                        <table class="table-editor">
                            <tr>
                                <th>id</th>
                                <th>Название</th>
                                <th colspan="2">Действия</th>
                            </tr>
                            <?php foreach($items as $item){ ?>
                                <tr>
                                    <td class="td-id"><?= $item[0]?></td>
                                    <td class="td-title"><?=$item[1]?></td>
                                    <td class="td-update"> <a href="./update_items.php?id=<?= $item[0]?>" class="update">&#9998</a> </td>
                                    <td class="td-delete"> <a href="function-php/delete.php?id=<?= $item[0]?>" class="delete">&#10006</a> </td>
                                </tr>
                                <?php }?>
                        </table>
                </div>
                <div class="fieldset-editor">
                    <input type="file" name="img" id="" required>
                    </form>
                    <input type="text" name="title" id="" placeholder="Название" required maxlength="30">
                    <select name="category" id="category" required>
                        <option value="" hidden>Категория</option>
                        <option value="Конструкторы">Конструкторы</option>
                        <option value="Аксессуары">Аксессуары</option>
                    </select>
                    <select name="subcategory" id="subcategory" required>
                        <div class="constructor-option">
                            <option value="" hidden>Подкатегория</option>
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
                <select name="age" id="" required>
                    <option value="" hidden>Возрастное ограничение</option>
                    <option value="1.5">1.5+</option>
                    <option value="4">4+</option>
                    <option value="6">6+</option>
                    <option value="9">9+</option>
                    <option value="13">13+</option>
                    <option value="18">18+</option>
                </select>
                <input type="number" name="price" id="" placeholder="Цена в рублях" required min="0" max="9999999">
                <textarea name="description" id="" cols="30" rows="10" placeholder="Описание" required></textarea>
                <input type="submit" value="Создать">
                <input type="reset" value="Сбросить">
                <a href="function-php/exit.php" class="exit">Выход из редактора</a>
            </div>
            </fieldset>
        </form>
        
    </div>
    <div class="div-option">
        <a href="option.php" class="option"><img src="img/option.png"><span>Настройка подкатегорий</span></a>
    </div>
</body>
<script src="editor.js"></script>
<?php
require('footer.php');
?>