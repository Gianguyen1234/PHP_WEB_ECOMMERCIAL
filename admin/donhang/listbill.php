<style>
        /* Main content container */
.main-container {
    float: right;
    width: 80%;
    margin: 50px auto; /* Centers the content horizontally */
    background-color: #f9f9f9;
    margin-right:40px;
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
                    <th>MÃ LOẠI</th>
                    <th>THÔNG TIN KHÁCH HÀNG</th>
                    <th>SỐ LƯỢNG </th>
                    <th>TỔNG GIÁ TRỊ</th>
                    <th>TÌNH TRẠNG ĐƠN HÀNG</th>
                    <th>NGÀY ĐẶT HÀNG</th>
                    <th>PHƯƠNG THỨC THANH TOÁN</th>
                    <th>THAO TÁC</th>
                   
                   
                </tr>
                <?php
                foreach ($all_bill as $bill) {
                    //khai khac data tu bang sanpham
                    extract($bill);
                    $customer = $bill["bill_name"].'
                    <br> '.$bill["bill_tel"].'
                    <br> '.$bill["bill_email"].'
                    <br> '.$bill["bill_address"]
                    ;
                    $countsp = count_total_quantity($bill['id']);
                    $suadh = "index.php?act=suadh&id=".$id;
                  
                    
                    $tthd = get_ttdh($bill['bill_status']);
                    echo '  <tr>
                                <td>MDH:' . $bill['id'] . '</td>
                                <td>' . $customer. '</td>
                                <td>' . $countsp . '</td>
                                <td>' . $bill['grandtotal'] . '</td>
                                <td>' . $tthd  . '</td>
                                <td>' . $bill['bill_date'] . '</td>
                                <td>' . $bill['payment_method'] . '</td>
                                <td>
                                <a href="' . $suadh . '" class="icon-button blue"><i class="fas fa-edit"></i> Sửa</a>
                                </td>
                            </tr>';
                }
                ?>
            </table>
        </div>
    </div>
</div>
</div>