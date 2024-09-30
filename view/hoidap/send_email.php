<?php
// Email của admin 
$admin_email = "thaianhvan2349@gmail.com";

$sender_email = $_POST['sender_email'];
$message = $_POST['message'];

$subject = "Tin nhắn từ $sender_email";
$headers = "From: $sender_email";
mail($admin_email, $subject, $message, $headers);

header('Location: http://localhost/client(webbanhang)/index.php?act=hoidap');

?>
