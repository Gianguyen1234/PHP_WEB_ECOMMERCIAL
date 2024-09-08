<div class="signin-container">
    <h2 style="color:#0056b3;">Sign In</h2>
    <?php
    $thatbai = "Cảnh báo (Warning)!";
    if (isset($thongbao) && $thongbao != "") {
        echo "<div id='notification-error' class='notification-error'>
        $thatbai<br>
        $thongbao
        <button class='close-btn' onclick='hideErrorMessage()'>Tắt thông báo</button>
        </div>";
    }
    ?>
    <form action="index.php?act=dangnhap" method="POST">
        <div class="form-group">
            <label style="color:#0056b3;" for="username">Username</label>
            <input type="text" id="username" name="user" placeholder="Enter your username" required>
        </div>
        <div class="form-group">
            <label style="color:#0056b3;" for="password">Password</label>
            <input type="password" id="password" name="pass" placeholder="Enter your password" required>
        </div>
        <a style="text-decoration: none;" href="index.php?act=quenmatkhau"><span style="font-size: small;">Forgot you password?</span></a>
        <button type="submit" class="btn-primary" name="dangnhap" onclick="return validateLoginForm();">Sign In</button>
    </form>
</div>










