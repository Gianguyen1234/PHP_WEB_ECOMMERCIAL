
<div class="main-content">
<div class="form-container row">
    <div class="row frmtitle">
        <h1>THÊM MỚI TÀI KHOẢN</h1>
    </div>
    <div class="row form-content">
        <form action="index.php?act=addtk" method="post" >
            <div class="row">
                 TÀI KHOẢN <br> 
            </div>
            <div class="row">
                TÊN (USERNAME) <br>
                <input type="text" name="ten">
            </div>
            <div class="row">
                EMAIL<br>
                <input type="email" name="email">
            </div>
            <div class="row">
                MẬT KHẨU (PASWORD) <br>
                <input type="password" name="matkhau" >
            </div>
            <div class="row">
                ROLE (VAI TRÒ: ADMIN OR USER) <br>
                <input type="text" name="vaitro">
            </div>
            <div class="row mb10">
                <input type="submit" name="themmoi" value="THÊM MỚI">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=dskh"> <input type="button" value="DANH SÁCH"></a>
            </div>

            <?php
                $thanhcong = "Successfully!";
                if (isset($thongbao) && $thongbao != "") {
                    echo "<div id='notification' class='notification'>
                    $thanhcong<br>
                    $thongbao
                    </div>";
                }
            ?>
        </form>
    </div>
</div>
</div>