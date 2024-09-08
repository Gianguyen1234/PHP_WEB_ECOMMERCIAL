
<div class="signin-container">
<div class="forgot-password-form">
    <h2>Forgot Password</h2>
    <form action="index.php?act=quenmatkhau" method="POST">
        <input type="email" name="email" placeholder="Enter your email" required>
        <input type="submit" name="guiemail" value="Submit">
    </form>
    <div class="back-to-login">Remembered your password? <a href="index.php?act=dangnhap">Back to Login</a></div>
</div>
<?php
 $thatbai = "Thông báo!";
 if (isset($thongbao) && $thongbao != "") {
     echo "<div id='notification-error' class='notification-error'>
     $thatbai<br>
     $thongbao
     <button class='close-btn' onclick='hideErrorMessage()'>Tắt thông báo</button>
     </div>";
 }
 ?>
</div>