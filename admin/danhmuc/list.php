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

    /* Form title styles */
    .frmtitle h1 {
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    /* Form content styles */
    .frmcontent {
        margin-top: 20px;
    }

    /* Table styles */
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

    /* Button styles */
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

    /* Link button styles */
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


    .btn-custom {
        display: inline-flex;
        align-items: center;
        padding: 0.5rem 1rem;
        font-size: 1rem;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        cursor: pointer;
        color: #fff;
        background-color: #28a745;
        border: 1px solid transparent;
        border-radius: 0.25rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
        text-decoration: none;

    }


    .btn-custom:hover {
        background-color: #218838;
        border-color: #1e7e34;

    }

    .btn-custom input[type="button"] {
        border: none;
        background: none;
        color: inherit;
        padding: 0;
        font: inherit;
        cursor: pointer;
    }

    .btn-custom i {
        margin-right: 0.5rem;
    }
</style>
<div class="main-container">
    <div class="row">
        <div class="row frmtitle">
            <H1>DANH SÁCH LOẠI HÀNG</H1>
        </div>
        <!-- <div class="form-container"> -->
        <a href="index.php?act=adddm" class="btn-custom">
            <i class="fas fa-plus"></i>
            <input type="button" value="Nhập thêm">
        </a>
        <!-- </div> -->
        <div class="rowkhac frmcontent">
            <div class="rowkhac mb10 frmdsloai">
                <table>
                    <tr>
                        <th></th>
                        <th>MÃ LOẠI</th>
                        <th>TÊN LOẠI</th>
                        <th>THAO TÁC</th>
                    </tr>
                    <?php

                    foreach ($listdanhmuc as $danhmuc) {
                        //khai khac data tu bang danhmuc
                        extract($danhmuc);
                        // action sua va xoa danh muc
                        $suadm = "index.php?act=suadm&id=" . $id;
                        $xoadm = "index.php?act=xoadm&id=" . $id;

                        echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>' . $id . '</td>
                                <td>' . $name . '</td>
                                <td>
                                <a href="' . $suadm . '" class="icon-button blue"><i class="fas fa-edit"></i> Sửa</a>
                                <a href="' . $xoadm . '" class="icon-button red"><i class="fas fa-trash-alt"></i> Xóa</a>                                
                                </td>  
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