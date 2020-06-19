<?php
require_once ("database.php");

$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
$date = filter_var($_POST['date'], FILTER_SANITIZE_STRING);
$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

if (empty($name) || empty($email) || empty($date) || empty($username) || empty($password)) {
    header("Location: register.php?msg=failed");
}
else {
    $sql = "INSERT INTO users (name, email, date, username, password) VALUES ('$name', '$email', '$date', '$username', MD5('$password'))";
    $conn->exec($sql);

    header("Location: login.php?msg=register-success");
    die();
}