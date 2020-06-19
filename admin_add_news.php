<?php
require_once ("database.php");

$text = filter_var($_POST['text'], FILTER_SANITIZE_STRING);

if (empty($text)) {
    header("Location: admin_news.php?msg=failed");
}
else {
    $sql = "INSERT INTO news (text) VALUES ('$text')";
    $conn->exec($sql);

    header("Location: admin_news.php?msg=register-success");
    die();
}
