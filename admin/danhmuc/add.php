<div class="main-content">
    <div class="form-container row">
        <div class="row frmtitle">
            <h1>ADD NEW PRODUCT</h1>
        </div>
        <div class="row form-content">
            <form action="index.php?act=adddm" method="post">
                <div class="row ">
                    ID <br>
                    <input type="text" name="maloai" disabled>
                </div>
                <div class="row">
                    PRODUCT NAME <br>
                    <input type="text" name="tenloai">
                </div>
                <div class="row mb ">
                    <input type="submit" name="themmoi" value="ADD NEW">
                    <input type="reset" value="RESET">
                    <a href="index.php?act=listdm"> <input type="button" value="LIST OF PRODUCTS"></a>
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