<div class="main-content">
    <div class="form-container row">
        <div class="row frmtitle">
            <h1>THÊM MỚI LOẠI HÀNG HÓA</h1>
        </div>
        <div class="row form-content">
            <form action="index.php?act=adddm" method="post">
                <div class="row ">
                    MÃ LOẠI <br>
                    <input type="text" name="maloai" disabled>
                </div>
                <div class="row">
                    TÊN LOẠI <br>
                    <input type="text" name="tenloai">
                </div>
                <div class="row mb ">
                    <input type="submit" name="themmoi" value="THÊM MỚI">
                    <input type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=listdm"> <input type="button" value="DANH SÁCH"></a>
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