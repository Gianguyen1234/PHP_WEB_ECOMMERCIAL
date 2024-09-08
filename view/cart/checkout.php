<?php
// Start session (if not already started)
session_start();
require __DIR__ . "/vendor/autoload.php";

$stripe_secret_key = "sk_test_51Mb3XwK7dDPJ3SY12lid9NH6XpcOcNRTFfIKKuz8HKD47jN8Jf7YGtwNYaREOgaZsRli82SE8Dl2AfTGebH3IGRZ00u4oVbZU3";

\Stripe\Stripe::setApiKey($stripe_secret_key);

// Tạo mảng line_items từ thông tin sản phẩm
$line_items = [];
foreach ($billct as $product) {
    //convert price to cents 49.99 * 100 = 4999 cents
    $total_price_cents = (($product['totalprice'] * 100)/2);
    $line_items[] = [
        "quantity" => $product['quantity'],
        "price_data" => [
            "currency" => "usd",
            "unit_amount" => $total_price_cents, // Số tiền của sản phẩm (đơn vị là dollars)
            "product_data" => [
                "name" => $product['name']
            ]
        ]
    ];
}
// Specify the coupon ID


// Tạo session thanh toán
$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost/client(webbanhang)/view/cart/success.php",
    "cancel_url" => "http://localhost/client(webbanhang)/view/cart/cancelbill.php",
    "locale" => "auto",
    "allow_promotion_codes" => true,
    "line_items" => $line_items // Sử dụng mảng line_items đã được tạo từ cơ sở dữ liệu
]);
// Assuming $billct is an array
$_SESSION['billct'] = $billct;
$_SESSION['customer_info'] = $bill;
// Chuyển hướng người dùng đến trang thanh toán của Stripe
http_response_code(303);
header("Location: " . $checkout_session->url);
?>
