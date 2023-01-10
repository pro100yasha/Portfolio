<?php
require('header.php');
require("function-php/connect_db.php");
    $sub = mysqli_query($connect, "SELECT * FROM `subcategories`");
    $sub = mysqli_fetch_all($sub);

if(!isset($_SESSION["admin"])){
    header("Location: admin.php");
    return;
}

?>
<body>
<div class="div-editor">
        <form action="function-php/addsubcategories.php" class="form-editor" method="post">
            <fieldset>
                <legend>Редактор</legend>
                <div class="window-editor window-option">
                        <table class="table-editor">
                            <tr>
                                <th>id</th>
                                <th>Название</th>
                                <th>Категория</th>
                                <th>Действия</th>
                            </tr>
                            <?php foreach($sub as $subs){ ?>
                                <tr>
                                    <td class="td-id"><?= $subs[0]?></td>
                                    <td class="td-title td-title1"><?=$subs[1]?></td>
                                    <td><?=$subs[2]?></td>
                                    <td class="td-delete"> <a href="function-php/!addsubcategories.php?id=<?= $subs[0]?>&subcategory=<?=$subs[1]?>" class="delete">&#10006</a> </td>
                                </tr>
                                <?php }?>
                        </table>
                </div>
                <div class="fieldset-editor">
                    <select name="category" name="category" required>
                        <option value="" hidden>Категория</option>
                        <option value="Конструкторы">Конструкторы</option>
                        <option value="Аксессуары">Аксессуары</option>
                    </select>
                    <input type="text" name="subcategory" placeholder="Подкатегория">
                    <input type="submit" value="Создать">
                    <div class="attention"><span class="attention-span">Внимание!</span> При удалении подкатегории, удалятся и товары этой подкатегории</div>
            </div>
            </fieldset>
        </form>
    </div>
    </div>
    <div class="div-option">
        <a href="editor.php" class="option"><img src="img/back.png"><span>Назад</span></a>
    </div>
</body>
<?php
require('footer.php');
?>