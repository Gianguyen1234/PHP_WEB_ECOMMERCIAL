<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Detail</title>
    <style>
        .detail-container {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            background-color: #f5f5f5;
            max-width: 1200px;
            margin: 120px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
        }

        .detail-heading {
            font-size: 24px;
            color: #333;
            margin-bottom: 16px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 8px;
        }

        .detail-info-section {
            margin-bottom: 16px;
        }

        .detail-info-section h3 {
            font-size: 18px;
            color: #333;
            margin-bottom: 8px;
        }

        .detail-info-section p {
            color: #666;
            margin-top: 0;
        }

        .detail-btn {
            padding: 10px 20px;
            background-color: #1890ff;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
            display: inline-flex;
            align-items: center;
            text-decoration: none;
        }

        .detail-btn i {
            margin-right: 5px;
        }

        .detail-btn:hover {
            background-color: #40a9ff;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            color: #333;
            background-color: #fff;
            transition: border-color 0.3s, box-shadow 0.3s;
            margin-bottom: 16px;
        }

        select:focus {
            border-color: #1890ff;
            box-shadow: 0 0 8px rgba(24, 144, 255, 0.2);
            outline: none;
        }

        option {
            padding: 10px;
            font-size: 16px;
            color: #333;
        }

        /* Responsive styles */
        @media (max-width: 600px) {
            .detail-container {
                padding: 10px;
            }

            .detail-heading {
                font-size: 20px;
            }

            .detail-info-section h3 {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <?php

    function getOrderStatus($status)
    {
        switch ($status) {
            case 0:
                return "Đơn hàng mới";
            case 1:
                return "Đang giao hàng";
            case 2:
                return "Hoàn tất";
            default:
                return "Đơn hàng mới";
        }
    }
    $customer = $orderDetail["bill_name"] . '
            <br> ' . $orderDetail["bill_tel"] . '
            <br> ' . $orderDetail["bill_email"] . '
            <br> ' . $orderDetail["bill_address"];
    $countsp = count_total_quantity($orderDetail['id']);
    ?>
    <div class="detail-container">
        <div class="detail-heading">Thông tin chi tiết đơn hàng</div>

        <div class="detail-info-section">
            <h3>MÃ LOẠI</h3>
            <p id="order-code"><?= $orderDetail['id'] ?></p>
        </div>

        <div class="detail-info-section">
            <h3>THÔNG TIN KHÁCH HÀNG</h3>
            <p id="customer-info"><?= $customer ?></p>
        </div>

        <div class="detail-info-section">
            <h3>SỐ LƯỢNG</h3>
            <p id="quantity"><?= $countsp ?></p>
        </div>

        <div class="detail-info-section">
            <h3>TỔNG GIÁ TRỊ</h3>
            <p id="total-value"><?= $orderDetail['grandtotal'] ?></p>
        </div>

        <div class="detail-info-section">
            <h3>TÌNH TRẠNG ĐƠN HÀNG</h3>
            <form action="index.php?act=updatettdh" method="POST">
                <input type="hidden" name="iddh" value="<?= $orderDetail['id'] ?>">
                <select id="order-status" name="order_status">
                    <option value="0" <?= $orderDetail['bill_status'] == 0 ? 'selected' : '' ?>>Đơn hàng mới</option>
                    <option value="1" <?= $orderDetail['bill_status'] == 1 ? 'selected' : '' ?>>Đang giao hàng</option>
                    <option value="2" <?= $orderDetail['bill_status'] == 2 ? 'selected' : '' ?>>Hoàn tất</option>
                </select>
                <button type="submit" class="detail-btn" name="capnhattt">Cập nhật trạng thái</button>
            </form>
        </div>

        <div class="detail-info-section">
            <h3>NGÀY ĐẶT HÀNG</h3>
            <p id="order-date"><?= $orderDetail['bill_date'] ?></p>
        </div>

        <div class="detail-info-section">
            <h3>PHƯƠNG THỨC THANH TOÁN</h3>
            <p id="payment-method"><?= $orderDetail['payment_method'] ?></p>
        </div>

        <a href="index.php?act=listbill" class="detail-btn"><i class="fas fa-list"></i> Danh sách đơn hàng</a>
    </div>
</body>

</html>