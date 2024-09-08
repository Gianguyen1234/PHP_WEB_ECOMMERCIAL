<style>
    /* Style for select element */
    select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        margin-top: 5px;
        background-color: #fff;
        /* Background color */
        color: #333;
        /* Text color */
        font-size: 16px;
        /* Font size */
        cursor: pointer;
    }

    /* Style for selected option */
    option[selected] {
        background-color: orange;
        /* Selected option background color */
        color: #fff;
        /* Selected option text color */
    }

    /* Style for options */
    option {
        background-color: #fff;
        /* Options background color */
        color: #333;
        /* Options text color */
    }
</style>
<?php
    if (is_array($sanpham)) {
        extract($sanpham);
    }
    $img_path = "../uploads/" . $image;
    //ktra xem img_path co dc xuat tu file hay ko
    if (is_file($img_path)) {
        $images = "<img src='" . $img_path . "' height='80'>";
    } else {
        $images = "Image path is not found";
    }
?>
<div class="form-container row">
    <div class="row frmtitle">
        <h1>CẬP NHẬT LẠI HÀNG HÓA</h1>
    </div>
    <div class="row form-content">
        <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
            <div class="row ">
                <label for="danhmucsanpham">DANH MỤC</label><br>
                <select name="iddm">
                    <option value="0">Tất cả</option>
                    <?php
                        foreach ($listdanhmuc as $danhmuc) {
                            $s = ($iddm == $danhmuc['id']) ? "selected" : ""; // Check if $iddm matches the current $danhmuc id
                            echo '<option value="' . $danhmuc['id'] . '" ' . $s . '>' . $danhmuc['name'] . '</option>';
                            
                        }
                    ?>
                </select>

            </div>
            <div class="row">
                TÊN SẢN PHẨM<br>
                <input type="text" name="tensp" value="<?=$name?>">
            </div>
            <div class="row">
                GIÁ<br>
                <input type="text" name="giasp" value="<?=$price?>">
            </div>
            <div class="row">
                HÌNH<br>
                <?=$images?>
                <input type="file" name="hinh">
            </div>
            <div class="row">
                MÔ TẢ<br>
                <textarea name="mota" cols="30" rows="10"><?=$description?></textarea>
            </div>
            <div class="row mb10">
                <input type="hidden" name="id" value="<?=$id?>">
                <input type="submit" name="capnhat" value="CẬP NHẬT">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
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
    <!-- </div> -->
</div>