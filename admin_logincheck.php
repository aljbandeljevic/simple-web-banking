<?php
session_start();
if (isset($_SESSION['admin_id'])) {
    $user_id = $_SESSION['admin_id'];
    $user_name = $_SESSION['admin_username'];
} else {
    header("Location: admin_login.php");
    die();
}
