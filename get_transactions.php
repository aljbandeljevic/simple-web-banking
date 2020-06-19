<?php
session_start();
header('Content-Type: application/json');
require_once ("display_errors.php");
require_once ("account.php");
require_once("transaction.php");
$input_userid = $_SESSION['user_id'];
$transactions = Transaction::get_transactions();
echo json_encode($transactions);
