<?php
session_start();
require_once("database.php");

$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

$sql = "SELECT * FROM users WHERE username='$username' AND password=MD5('$password')";

$result = $conn->query($sql, PDO::FETCH_ASSOC);

if ($result->rowCount() > 0) {
    // User found, LOGIN SUCCESFULL
    // Move to index.php
    $row = $result->fetch();
    $_SESSION['activity'] = $row['active'];
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_name'] = $row['username'];
    $_SESSION['currentpassword'] = $row['password'];
    header("Location: index.php");
} else {
    // User not found, LOGIN UNSUCCESFULL
    // Move to login.php again!
    header("Location: login.php?msg=failed");
}
