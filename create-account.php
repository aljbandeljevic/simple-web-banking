<?php
session_start();
require_once ("database.php");
$owner_user_id = $_SESSION['user_id'];
$owner_username = $_SESSION['user_name'];
$amount = 0;
$active = 1;

$sql = "INSERT INTO accounts (owner_user_id, owner_username, amount, active) VALUES ('$owner_user_id', '$owner_username', '$amount', '$active')";
$conn->exec($sql);
die(header("Location: my-accounts.php?msg=created"));

