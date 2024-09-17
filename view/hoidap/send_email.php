
<?php
// Email của admin (địa chỉ nhận tin nhắn)
$admin_email = "thaianhvan2349@gmail.com";

// Lấy dữ liệu từ form
$sender_email = $_POST['sender_email'];
$message = $_POST['message'];

// Tiến hành gửi email
$subject = "Tin nhắn từ $sender_email";
$headers = "From: $sender_email";
mail($admin_email, $subject, $message, $headers);

// Chuyển hướng người dùng sau khi gửi email thành công
header('Location: http://localhost/client(webbanhang)/index.php?act=hoidap');

?>
