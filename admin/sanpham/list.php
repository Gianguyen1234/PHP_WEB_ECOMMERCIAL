<style>
    /* Main content container */
    .main-container {
        width: 80%;
        margin: 50px auto;
        /* Centers the content horizontally */
        background-color: #f9f9f9;
        margin-right: 30px;
        margin-top: 100px;
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
        border-radius: 0.375rem; /* 6px */
        overflow: hidden; /* Ensure rounded borders are visible */
        box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.05), 0 1px 2px 0 rgba(0, 0, 0, 0.05); /* Shadow for the table */
    }

    .frmdsloai th,
    .frmdsloai td {
        border: 1px solid #edf2f7; /* Light gray border */
        padding: 1rem; /* Padding for cells */
        text-align: left;
    }

    .frmdsloai th {
        background-color: #edf2f7; /* Light gray background for header */
        font-weight: 600; /* Bold text for header */
    }
    /* Button container styles */
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

    .rowkhac form input[type="submit"] {
        background-color: #4caf50;
        color: white;
        cursor: pointer;
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
        /* Blue background */
    }

    .red {
        background-color: #dc3545;
        /* Red background */
    }

    .green {
        background-color: #28a745;
        /* Green background */
    }

    .icon-button:hover {
        opacity: 0.8;
        /* Reduce opacity on hover */
    }

    .form-inline {
        display: flex;
        gap: 10px;
        /* Adjust the gap between elements */
        align-items: center;
        /* Center items vertically */
    }

    .custom-input {
        flex: 1;
        /* Take up remaining space */
        padding: 0.5rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: 0.375rem;
        /* 6px */
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .custom-input:focus {
        outline: 0;
        border-color: #4d90fe;
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
    }

    .custom-select {
        flex: 1;
        /* Take up remaining space */
        padding: 0.5rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: 0.375rem;
        /* 6px */
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .custom-select:focus {
        outline: 0;
        border-color: #4d90fe;
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
    }

    .custom-submit {
        padding: 0.5rem 1rem;
        font-size: 1rem;
        line-height: 1.5;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        cursor: pointer;
        user-select: none;
        background-color: #007bff;
        border: 1px solid transparent;
        border-radius: 0.375rem;
        /* 6px */
        color: #fff;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
    }

    .custom-submit:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>
<div class="main-container">
    <div class="rowkhac">
        <div class="rowkhac frmtitle mb">
            <H1>DANH SÁCH SẢN PHẨM</H1>
        </div>
        <form action="index.php?act=listsp" method="post">
            <div class="form-inline">
                <input type="text" name="keyword" placeholder="Nhập tên sản phẩm" class="custom-input">
                <select name="iddm" class="custom-select">
                    <option value="0" selected>Tất cả</option>
                    <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        echo '<option value="' . $id . '">' . $name . '</option>';
                    }
                    ?>
                </select>
                <input type="submit" value="Tìm Kiếm" name="submit" class="custom-submit">
            </div>
        </form>
        <div class="rowkhac frmcontent">
            <div class="rowkhac mb10 frmdsloai">
                <table>
                    <tr>
                        <th></th>
                        <th>MÃ LOẠI</th>
                        <th>TÊN SẢN PHẨM</th>
                        <th>GIÁ</th>
                        <th>HÌNH</th>
                        <th>MÔ TẢ</th>
                        <th>LƯỢT XEM</th>
                        <th>THAO TÁC</th>
                    </tr>
                    <?php
                    foreach ($listsanpham as $sanpham) {
                        //khai khac data tu bang sanpham
                        extract($sanpham);
                        // action sua va xoa san pham
                        $suasp = "index.php?act=suasp&id=" . $id;
                        $xoasp = "index.php?act=xoasp&id=" . $id;
                        $xemct = "index.php?act=xemct&id=" . $id;
                        $img_path = "../uploads/" . $image;
                        //ktra xem img_path co dc xuat tu file hay ko
                        if (is_file($img_path)) {
                            $images = "<img src='" . $img_path . "' height='80'>";
                        } else {
                            $images = "Image path is not found";
                        }

                        echo '  <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>' . $id . '</td>
                                <td>' . $name . '</td>
                                <td>' . $price . '</td>
                                <td>' . $images . '</td>
                                <td>' . $description . '</td>
                                <td>' . $view . '</td>
                                <td>
                                <a href="' . $suasp . '" class="icon-button blue"><i class="fas fa-edit"></i> Sửa</a>
                                <a href="' . $xoasp . '" class="icon-button red"><i class="fas fa-trash-alt"></i> Xóa</a>
                                <a href="' . $xemct . '" class="icon-button green"><i class="fas fa-info-circle"></i> Xem chi tiết</a>
                                </td>
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
                <a href="index.php?act=addsp"><input type="button" value="Nhập thêm"></a>
            </div>
        </div>
    </div>
</div>