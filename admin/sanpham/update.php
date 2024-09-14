<style>
    select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        margin-top: 5px;
        background-color: #fff;
        color: #333;
        font-size: 16px;
        cursor: pointer;
    }

    option[selected] {
        background-color: orange;
        color: #fff;
    }

    option {
        background-color: #fff;
        color: #333;
    }
</style>
<?php
if (is_array($sanpham)) {
    extract($sanpham);
}
$img_path = "../uploads/" . $image;
// Check if the img_path is accessible
if (is_file($img_path)) {
    $images = "<img src='" . $img_path . "' height='80'>";
} else {
    $images = "Image path is not found";
}
?>
<div class="form-container row">
    <div class="row frmtitle">
        <h1>UPDATE PRODUCT</h1>
    </div>
    <div class="row form-content">
        <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
            <div class="row">
                <label for="danhmucsanpham">CATEGORY</label><br>
                <select name="iddm">
                    <option value="0">All</option>
                    <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        $s = ($iddm == $danhmuc['id']) ? "selected" : ""; // Check if $iddm matches the current $danhmuc id
                        echo '<option value="' . $danhmuc['id'] . '" ' . $s . '>' . $danhmuc['name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="row">
                PRODUCT NAME<br>
                <input type="text" name="tensp" value="<?= $name ?>">
            </div>
            <div class="row">
                PRICE<br>
                <input type="text" name="giasp" value="<?= $price ?>">
            </div>
            <div class="row">
                IMAGE<br>
                <?= $images ?>
                <input type="file" name="hinh">
            </div>
            <div class="row">
                DESCRIPTION<br>
                <textarea name="mota" cols="30" rows="10"><?= $description ?></textarea>
            </div>
            <div class="row mb10">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="submit" name="capnhat" value="UPDATE">
                <input type="reset" value="RESET">
                <a href="index.php?act=listsp"><input type="button" value="LIST"></a>
            </div>
            <?php
            $successMessage = "Successfully!";
            if (isset($thongbao) && $thongbao != "") {
                echo "<div id='notification' class='notification'>
                    $successMessage<br>
                    $thongbao
                    </div>";
            }
            ?>
        </form>
    </div>
    <!-- </div> -->
</div>
