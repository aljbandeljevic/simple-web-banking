<?php
session_start();
header('Content-Type: application/json');
require_once ("display_errors.php");
require_once("account.php");
$input_userid = $_SESSION['user_id'];
$accounts = Account::get_accounts_user($input_userid);
echo json_encode($accounts);