<?php
header('Content-Type: application/json');
require_once ("display_errors.php");
require_once("admin.php");

$admins = Admin::get_admins();

echo json_encode($admins);
