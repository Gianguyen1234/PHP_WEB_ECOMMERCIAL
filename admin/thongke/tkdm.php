<style>
    .main-container {
        float: right;
        width: 80%;
        margin: 50px auto;
        background-color: #f9f9f9;
        margin-right: 40px;
        margin-top: 100px;
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
</style>
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