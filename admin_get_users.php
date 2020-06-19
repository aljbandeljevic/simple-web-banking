<?php
header('Content-Type: application/json');
require_once ("display_errors.php");
require_once("user.php");

$users = User::get_users();

echo json_encode($users);