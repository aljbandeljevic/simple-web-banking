<?php
require_once ("database.php");

$select_id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);
$suspend = 0;

$sql = "SELECT * FROM accounts WHERE account_id='$select_id'";
$result = $conn->query($sql, PDO::FETCH_ASSOC);

if ($result->rowCount() > 0) {
    $row = $result->fetch();
    $owner_user_id= $row['owner_user_id'];
    $owner_username = $row['owner_username'];
    $account_id = $row['account_id'];
    $amount = $row['amount'];
    $active = $row['active'];
    $update="update accounts set owner_user_id='$owner_user_id', owner_username='$owner_username', amount='$amount', active='$suspend' where account_id='$select_id'";
    $conn->exec($update);
    die(header("Location: admin_accounts.php?msg=suspended"));
} else {
    die(header("Location: admin_accounts.php?msg=error"));
}
