<?php
require_once("database.php");
$select_id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);
$sql = "DELETE FROM news WHERE id='$select_id'";
$result = $conn->query($sql, PDO::FETCH_ASSOC);
die(header("Location: admin_news.php?msg=deleted"));
