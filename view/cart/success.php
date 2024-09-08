<?php
session_start();
$billct = $_SESSION['billct'] ?? [];
// Calculate grand total
$grand_total = 0;
foreach ($billct as $product) {
    $grand_total += $product['totalprice'];
}
// Customer information
$customer_info = $_SESSION['customer_info'] ?? [];
$order_date = $customer_info['bill_date'] ??'';
$customer_name = $customer_info['bill_name'] ?? '';
$email = $customer_info['bill_email'] ?? '';
$address = $customer_info['bill_address'] ?? '';
$phone = $customer_info['bill_tel'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="css/invoice.css">
</head>

<body>
    <div class="container">
        <h1>Invoice</h1>
        <div class="customer-info">
            <p>Order Date: <?= $order_date ?></p>
            <p>Name: <?= $customer_name ?></p>
            <p>Email: <?= $email ?></p>
            <p>Address: <?= $address ?></p>
            <p>Phone: <?= $phone ?></p>
        </div>
        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
            <?php foreach ($billct as $product) : ?>
                <tr>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['quantity'] ?></td>
                    <td>$<?= number_format($product['totalprice'] / $product['quantity'], 2) ?></td>
                    <td>$<?= number_format($product['totalprice'], 2) ?></td>
                </tr>
            <?php endforeach; ?>
            <tr class="total">
                <td colspan="3">Grand Total:</td>
                <td>$<?= number_format($grand_total, 2) ?></td>
            </tr>
        </table>
        <div class="thank-you">
            <p>Thank you for your purchase!</p>
            <a href="http://localhost/client(webbanhang)/index.php" class="button">Return to Main Page</a>
            <a href="#" class="button" onclick="printInvoice()">Print Invoice</a>
        </div>
    </div>
</body>
<script src="invoice/script.js"></script>
</html>