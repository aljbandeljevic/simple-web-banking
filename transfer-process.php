<?php
session_start();
require_once ("database.php");
$fromid = filter_var($_POST['from-account'], FILTER_SANITIZE_STRING);
$toid = filter_var($_POST['to-account'], FILTER_SANITIZE_STRING);
$value = filter_var($_POST['money'], FILTER_SANITIZE_STRING);
$userid = $_SESSION['user_id'];
$type = 'Transfer';

$sql = "SELECT * FROM accounts WHERE account_id='$fromid'";
$result = $conn->query($sql, PDO::FETCH_ASSOC);
if ($result->rowCount() > 0) {
    $row = $result->fetch();
    $owner_user_id = $row['owner_user_id'];
    $owner_username = $row['owner_username'];
    $account_id = $row['account_id'];
    $amount = $row['amount'];
    $active = $row['active'];
    if ($amount >= $value) {
        $newvalue = $amount - $value;
    } else {
        die(header("Location: transfer.php?msg=nomoney"));
    }
    $update1 = "update accounts set amount='$newvalue' where account_id='$fromid'";
    $conn->exec($update1);
}

$sql2 = "SELECT * FROM accounts WHERE account_id='$toid'";
$result2 = $conn->query($sql2, PDO::FETCH_ASSOC);
if ($result2->rowCount() > 0) {
    $row = $result2->fetch();
    $owner_user_id = $row['owner_user_id'];
    $owner_username = $row['owner_username'];
    $account_id = $row['account_id'];
    $amount = $row['amount'];
    $active = $row['active'];
    $newvalue = $amount + $value;
    $update2 = "update accounts set amount='$newvalue' where account_id='$toid'";
    $conn->exec($update2);
}

$update3="INSERT INTO transactions (user_id, from_account_id, to_account_id, amount, transaction_type) VALUES ('$userid', '$fromid', '$toid', '$value','$type')";
$conn->exec($update3);
die(header("Location: transfer.php?msg=transfered"));