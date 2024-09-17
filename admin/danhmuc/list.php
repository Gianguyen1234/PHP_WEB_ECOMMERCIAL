<head>
    <link rel="stylesheet" type="text/css" href="internalcss/styles.css">
</head>
<div class="main-container">
    <div class="row">
        <div class="row frmtitle">
            <H1>SHOW LIST OF PRODUCTS</H1>
        </div>
        <a href="index.php?act=adddm" class="btn-custom">
            <i class="fas fa-plus"></i>
            <input type="button" value="Nhập thêm">
        </a>

        <div class="rowkhac frmcontent">
            <div class="rowkhac mb10 frmdsloai">
                <table>
                    <tr>
                        <th></th>
                        <th>PRODUCT ID</th>
                        <th>PRODUCT NAME</th>
                        <th>ACTION</th>
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