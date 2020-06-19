<?php
session_start();
require_once ("database.php");
$id = filter_var($_GET['accountid'], FILTER_SANITIZE_STRING);
$value = filter_var($_GET['money'], FILTER_SANITIZE_STRING);
$userid = $_SESSION['user_id'];
$type = 'Deposit';

$sql = "SELECT * FROM accounts WHERE account_id='$id'";
$result = $conn->query($sql, PDO::FETCH_ASSOC);
if ($result->rowCount() > 0) {
    $row = $result->fetch();
    $owner_user_id = $row['owner_user_id'];
    $owner_username = $row['owner_username'];
    $account_id = $row['account_id'];
    $amount = $row['amount'];
    $active = $row['active'];
    $newvalue = $amount + $value;
    $update="update accounts set amount='$newvalue' where account_id='$id'";
    $conn->exec($update);
    $update2="INSERT INTO transactions (user_id, to_account_id, amount, transaction_type) VALUES ('$userid', '$id','$value','$type')";
    $conn->exec($update2);
    die(header("Location: deposit.php?msg=deposited"));
}