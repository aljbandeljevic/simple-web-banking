<?php

if($_POST) {
    $name = "";
    $email = "";
    $text = "";

    if(isset($_POST['name'])) {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }

    if(isset($_POST['email'])) {
        $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    if(isset($_POST['text'])) {
        $text = htmlspecialchars($_POST['text']);
    }

    $headers  = 'MIME-Version: 1.0' . "\r\n"
        .'Content-type: text/html; charset=utf-8' . "\r\n"
        .'From: ' . $email . "\r\n";

    if(mail('contact@domain.com', "Contact", $text, $headers)) {
       header("Location: contact-us.php?msg=sent");
    } else {
        header("Location: contact-us.php?msg=failed");
    }

} else {
    header("Location: contact-us.php?msg=failed");
}
?>