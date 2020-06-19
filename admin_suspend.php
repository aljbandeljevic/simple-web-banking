<?php
require_once ("database.php");

$select_id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);
$suspend = 0;

$sql = "SELECT * FROM users WHERE id='$select_id'";
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

    $update="update users set id='".$id."', name='".$name."', email='".$email."', date='".$date."', username='".$username."', password='".$password."', balance='".$balance."', active='".$suspend."' where id='".$select_id."'";
    $conn->exec($update);
    die(header("Location: admin_users.php?msg=suspended"));
} else {
    die(header("Location: admin_users.php?msg=error"));
}