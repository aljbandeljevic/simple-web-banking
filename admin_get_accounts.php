<?php
header('Content-Type: application/json');
require_once ("display_errors.php");
require_once("account.php");
$accounts = Account::get_accounts();

echo json_encode($accounts);