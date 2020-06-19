<?php
//Connecting to database:
//Database: web_banking
//User: web_banking_user    Password: web_banking_user

$conn = new PDO("mysql:host=localhost;dbname=web_banking", "web_banking_user", "web_banking_user");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);