<?php
require_once ("database.php");

$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

if (empty($username) || empty($password)) {
    header("Location: admin_admins.php?msg=failed");
}
else {
    $sql = "INSERT INTO admins (admin_username, admin_password) VALUES ('$username', MD5('$password'))";
    $conn->exec($sql);

    header("Location: admin_admins.php?msg=register-success");
    die();
}
