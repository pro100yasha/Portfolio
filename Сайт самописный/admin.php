<?php
require('header.php');


if(isset($_SESSION["admin"])){
    header("Location: editor.php");
    return;
}
?>
<body>
    <div class="admin-div">
        <form action="function-php/verification.php" method="post">
            <fieldset class="fieldset-admin">
                <legend>Вход в редактор</legend>
                <input type="text" name="login" id="log-in" placeholder="Логин" required class="log-in"> <br>
                <input type="password" name="password" id="password" placeholder="Пароль"  required class="password"> <br>
                <input type="submit" value="Войти">
            </fieldset>
        </form>
    </div>
</body>
<?php
require('footer.php');
?>