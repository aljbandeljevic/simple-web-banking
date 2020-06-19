<?php
session_start();
require_once("database.php");

$currentpassword = filter_var($_POST['oldpassword'], FILTER_SANITIZE_STRING);
$changepassword = filter_var($_POST['newpassword'], FILTER_SANITIZE_STRING);
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql, PDO::FETCH_ASSOC);

if ($result->rowCount() > 0) {
    $row = $result->fetch();
    $id = $row['id'];
    $name = $row['name'];
    $email = $row['email'];
    $date = $row['date'];
    $username = $row['username'];
    $password = $row['password'];
    $balance = $row['balance'];
    $active = $row['active'];

    if ($password == MD5($currentpassword)) {
        $update = "update users set id='$id', name='$name', email='$email', date='$date', username='$username', password=MD5('$changepassword'), balance='$balance', active='$active' where id='$user_id'";
        $conn->exec($update);
        die(header("Location: my-profile.php?msg=changed"));
    }
    die(header("Location: my-profile.php?msg=error"));
}