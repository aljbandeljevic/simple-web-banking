<?php
header('Content-Type: application/json');
require_once ("display_errors.php");
require_once("news.php");

$news = News::get_news();

echo json_encode($news);
