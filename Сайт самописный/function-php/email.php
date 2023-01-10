<?php

require('connect_db.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require('../vendor/autoload.php');
$name = $_POST["name"];
$surname = $_POST["surname"];
$email = $_POST["email"];
$number = $_POST["number"];
$srok = $_POST["srok"];
$svv = $_POST["svv"];
$total = 0;
$list = "";

foreach ($_COOKIE['id'] as $id => $items) {
    $itemid = mysqli_query($connect, "SELECT * FROM `items` WHERE `id` = '$id'");
    $itemid = mysqli_fetch_assoc($itemid);
    $list .= "\n- " . $itemid['title'] . " (". $items." шт.) " .$items * $itemid['price']."₽";
    $total = $total + (int)$items * (int)$itemid['price'];
    setcookie('id['.$id.']', null, -1, "/");
}



$title = "Оформление заказа для $name";
$content = "Был оформлен заказ от $name ($email) на следующие предметы: " . $list;

// print_r($_POST);
$mail = new PHPMailer();
$mail->isSMTP();
// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->CharSet = "UTF-8";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->SMTPAuth = true;
$mail->Username = 'i79182603499@gmail.com';
$mail->Password = 'jgosszohlairnyip';
$mail->setFrom('i79182603499@gmail.com', 'Lego shop');
$mail->addReplyTo('no-reply@pro100yasha.ru', 'Lego shop');
$mail->addAddress('i79182603499@gmail.com', 'Lego shop');
$mail->Subject = 'Новый заказ!';
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

$mail->Body = '<h3>К нам пришел новый заказ</h3> 
                    <h4>Подробности заказа:</h4>
                        Клиент: '.$surname." ".$name.'<br>
                        Email клиента: '.$email.'<br>
                        Номер карты: '.$number.'<br>
                        Срок карты: '.$srok.'<br>
                        SVV: '.$svv.'<br>
                        '.$list.'<br>
                        <h4>Итог: '.$total.' ₽</h4>
                    '.date('Y-m-d H:i:s').' ';

$mail->AltBody = 'This is a plain-text message body';


if (!$mail->send()) {
    echo 'Не удалось отправить сообщение, проверьте введенная вами почту';
} else {
    echo '<div class="bought">Заявка на покупку успешно отправлена! Скоро с вами свяжутся для продолжения оформления.</div>';
}

setcookie('counter', null, -1, "/");

$redicet = $_SERVER['HTTP_REFERER'];
@header ("Location: $redicet");
die;
?>