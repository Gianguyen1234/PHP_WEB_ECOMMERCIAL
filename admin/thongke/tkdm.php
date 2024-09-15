<head>
    <link rel="stylesheet" href="internalcss/rowcss.css">
</head>

<div class="main-container">
    <div class="rowkhac">
        <div class="rowkhac frmtitle mb">
            <H1>DANH SÁCH ĐƠN HÀNG</H1>
        </div>

        <div class="rowkhac frmcontent">
            <div class="rowkhac mb10 frmdsloai">
                <table>
                    <tr>
                        <th>MÃ TT</th>
                        <th>LOẠI HÀNG</th>
                        <th>SỐ LƯỢNG </th>
                        <th>GIÁ CAO NHẤT</th>
                        <th>GIÁ THẤP NHẤT</th>
                        <th>GIÁ TRUNG BÌNH</th>
                    </tr>
                    <?php
                    foreach ($list_tkdm as $tk) {
                        //khai khac data tu bang sanpham
                        extract($tk);
                        echo '  <tr>
                                <td>DMSP:' . $madm . '</td>
                                <td>' . $tendm . '</td>
                                <td>' . $countdmsp . '</td>
                                <td>' . $maxprice . '</td>
                                <td>' . $minprice . '</td>
                                <td>' . $avgprice . '</td>
                            </tr>';
                    }
                    ?>
                </table>
            </div>
            <div class="rowkhac mb10">
                <a href="index.php?act=charttkdm"><input type="button" value="Thống kê sản phẩm"></a>
                <a href="index.php?act=tkdmsp"><input type="button" value="Thống kê danh mục sản phẩm"></a>

            </div>
        </div>
    </div>
</div>