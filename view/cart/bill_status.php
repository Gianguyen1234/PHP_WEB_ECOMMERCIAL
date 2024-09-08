<style>
        /* Main content container */
.main-container {
    width: 60%;
    margin: 50px auto; /* Centers the content horizontally */
    background-color: #f9f9f9;
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
</style>
<div class="main-container">
<div class="row">
    <div class="row frmtitle">
        <H1>ĐƠN HÀNG CỦA BẠN</H1>
    </div>
    <div class="rowkhac frmcontent">
        <div class="rowkhac mb10 frmdsloai">
            <table>
                <tr>
                    
                    <th>MÃ ĐƠN HÀNG</th>
                    <th>NGÀY ĐẶT HÀNG</th>
                    <th>TỔNG SỐ LƯỢNG</th>
                    <th>TỔNG GIÁ TRỊ ĐƠN HÀNG</th>
                    <th>TÌNH TRẠNG ĐƠN HÀNG</th>
                   
                    
                </tr>
                <?php
                    if (is_array($listbill)) {
                        foreach($listbill as $listbill){
                            //khai khac data tu bang danhmuc
                           $ttdh = get_ttdh($listbill['bill_status'])  ;  
                           $totalquantity = count_total_quantity($listbill['id']); 
                          
                            echo '<tr>
                                    <td>MDH:'.$listbill['id'].'</td>
                                    <td>'.$listbill['bill_date'].'</td>
                                    <td>'.$totalquantity.'</td>
                                    <td>'.$listbill['grandtotal'].'</td>
                                    <td>'.$ttdh.'</td>
                                   
                                </tr>';
                        }   
                    }                            

                ?>
               </table>
        </div>
    </div>
</div>
</div>
