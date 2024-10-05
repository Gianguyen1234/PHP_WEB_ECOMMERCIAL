<?php
session_start();
require __DIR__ . "/vendor/autoload.php";

$stripe_secret_key = "YOUR_STRIPE_SECRET_API_KEY";

\Stripe\Stripe::setApiKey($stripe_secret_key);

// Tạo mảng line_items từ thông tin sản phẩm
$line_items = [];
foreach ($billct as $product) {
    $total_price_cents = (($product['totalprice'] * 100)/2);
    $line_items[] = [
        "quantity" => $product['quantity'],
        "price_data" => [
            "currency" => "usd",
            "unit_amount" => $total_price_cents, 
            "product_data" => [
                "name" => $product['name']
            ]
        ]
    ];
}


// Tạo session thanh toán
$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost/client(webbanhang)/view/cart/success.php",
    "cancel_url" => "http://localhost/client(webbanhang)/view/cart/cancelbill.php",
    "locale" => "auto",
    "allow_promotion_codes" => true,
    "line_items" => $line_items 
]);
// gan gia tri thong tin bill va thong tin nguoi dat hang
$_SESSION['billct'] = $billct;
$_SESSION['customer_info'] = $bill;
http_response_code(303);
header("Location: " . $checkout_session->url);
?>
