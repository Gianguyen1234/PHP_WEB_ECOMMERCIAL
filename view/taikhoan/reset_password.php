
<div class="signin-container">
<div class="reset-container">
    <h2>Reset Your Password</h2>
    <form  action="index.php?act=updatepassword" method="post" onsubmit="return validateForm()">
        <input type="hidden" name="email" value="<?=$email?>">
        <input type="hidden" name="token" value="<?=$token?>">
        <input type="password" name="new_password" placeholder="Enter your new password" required>
        <input type="password" name="confirm" placeholder="Confirm your password" required>
        <button type="submit" name="capnhatmk" >Reset Password</button>
    </form>
</div>
</div>
<?php
   $thatbai = "Successfully!";
   if (isset($thongbao) && $thongbao != "") {
       echo "<div id='notification-error' class='notification-error'>
       $thatbai<br>
       $thongbao
       <button class='close-btn' onclick='hideErrorMessage()'>Tắt thông báo</button>
       </div>";
   }
 ?>