<?php
session_start();
require_once("database.php");

$admin_username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$admin_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

$sql = "SELECT * FROM admins WHERE admin_username='$admin_username' AND admin_password=MD5('$admin_password')";

$result = $conn->query($sql, PDO::FETCH_ASSOC);

if ($result->rowCount() > 0) {
    // User found, LOGIN SUCCESFULL
    // Move to index.php
    $row = $result->fetch();
    $_SESSION['admin_id'] = $row['admin_id'];
    $_SESSION['admin_username'] = $row['admin_username'];
    header("Location: admin_index.php");
} else {
    // User not found, LOGIN UNSUCCESFULL
    // Move to login.php again!
    header("Location: admin_login.php?msg=failed");
}