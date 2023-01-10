<?php

require("connect_db.php");
    $sub = mysqli_query($connect, "SELECT * FROM `subcategories`");
    $sub = mysqli_fetch_all($sub);

    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];

    mysqli_query($connect, "INSERT INTO `subcategories` (`id`, `subcategory`, `category`) VALUES (NULL, '$subcategory', '$category')");
    header("Location: ../option.php");
?>