<?php
require_once("database.php");
$select_id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);
$sql = "DELETE FROM admins WHERE admin_id='$select_id'";
$result = $conn->query($sql, PDO::FETCH_ASSOC);
die(header("Location: admin_admins.php?msg=deleted"));