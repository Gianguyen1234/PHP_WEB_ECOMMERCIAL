<style>
    .main-container {
        width: 80%;
        margin: 0 auto;
        background-color: #f9f9f9;
        margin-top: 100px;
        margin-right: 30px;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .frmtitle h1 {
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    .frmcontent {
        margin-top: 20px;
    }

    .frmdsloai table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        border-radius: 0.375rem;
        overflow: hidden;
        box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.05), 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    }

    .frmdsloai th,
    .frmdsloai td {
        border: 1px solid #edf2f7;
        padding: 1rem;
        text-align: left;
    }

    .frmdsloai th {
        background-color: #edf2f7;
        font-weight: 600;
    }

    .rowkhac.mb10 {
        margin-bottom: 10px;
    }

    .rowkhac.mb10 input[type="button"] {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #2196f3;
        color: white;
        cursor: pointer;
        margin-right: 10px;
        transition: background-color 0.3s ease;
    }

    .rowkhac.mb10 input[type="button"]:hover {
        background-color: #0b7dda;
    }

    .rowkhac.mb10 a input[type="button"] {
        background-color: #4caf50;
    }

    .rowkhac.mb10 a input[type="button"]:hover {
        background-color: #45a049;
    }

    .icon-button {
        display: inline-block;
        padding: 8px 16px;
        margin: 5px;
        text-decoration: none;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .icon-button i {
        margin-right: 5px;
    }

    .blue {
        background-color: #007bff;

    }

    .red {
        background-color: #dc3545;

    }

    .green {
        background-color: #28a745;

    }

    .icon-button:hover {
        opacity: 0.8;

    }
</style>
<div class="main-container">
    <div class="row">
        <div class="row frmtitle">
            <H1>DANH SÁCH BÌNH LUẬN</H1>
        </div>
        <div class="rowkhac frmcontent">
            <div class="rowkhac mb10 frmdsloai">
                <table>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>NỘI DUNG</th>
                        <th>ID SẢN PHẨM</th>
                        <th>USER</th>
                        <th>NGÀY BÌNH LUẬN</th>
                        <th></th>
                    </tr>
                    <?php
                    // $fetch_list_BL= fetch_list_binhluan();
                    foreach ($fetch_list_bl as $listbl) {
                        //khai khac data tu bang danhmuc
                        extract($listbl);
                        // action sua va xoa danh muc
                        // $suatk="index.php?act=suatk&id=".$id;
                        $xoabl = "index.php?act=xoabl&id=" . $id;
                        // <a href="'.$suatk.'"><input type="button" value="Sửa"></a> 

                        echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>' . $id . '</td>
                                <td>' . $content . '</td>
                                <td>' . $idpro . '</td>
                                <td>' . $iduser . '</td>
                                <td>' . $commentdate . '</td>
                                <td>
                                <a href="' . $xoabl . '" class="icon-button red"><i class="fas fa-trash-alt"></i> Xóa</a>
                            </tr>';
                    }
                    ?>
                </table>
            </div>
            <div class="rowkhac mb10">
                <input type="button" value="Chọn tất cả">
                <input type="button" value="Bỏ chọn tất cả">
                <input type="button" value="Xóa các mục đã chọn">
            </div>
        </div>
    </div>
</div>