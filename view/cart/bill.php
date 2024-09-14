<style>
    .main-container {
        width: 60%;
        margin: 50px auto;
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


    /* Button container  */
    .rowkhac.mb10 {
        margin-bottom: 10px;
    }


    .rowkhac.mb10 input[type="submit"] {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #2196f3;
        color: white;
        cursor: pointer;
        margin-left: 10px;
        transition: background-color 0.3s ease;
        float: right;
        animation: pulse 1.5s infinite;
    }

    .rowkhac.mb10 input[type="submit"]:hover {
        background-color: #0b7dda;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }

        100% {
            transform: scale(1);
        }
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

    input[type="text"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="text"]:focus {
        border-color: #007bff;
        outline: none;
    }

    .product-image {
        max-width: 50px;
        height: auto;
    }

    /*  cho tổng cộng */
    tfoot td {
        font-weight: bold;
    }

    /* phương thức thanh toán */
    .payment-method {
        margin-top: 20px;
        display: flex;
        flex-direction: row;
        align-items: center;
        padding: 12px;
        background-color: #f7fafc;
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .payment-method span {
        font-weight: 600;
        font-size: 20px;
        margin-right: 10px;
        color: #2d3748;
    }

    .payment-method label {
        margin-right: 15px;
        font-size: 16px;
        color: #4a5568;
    }
</style>
<div class="main-container">
    <div class="rowkhac">
        <div class="rowkhac frmtitle mb">
            <H1>ORDER INFORMATION</H1>
        </div>
        <form action="index.php?act=billconfirm" method="post" id="order-form">
            <div class="rowkhac frmcontent">
                <div class="rowkhac mb10 frmdsloai">
                    <table>
                        <?php
                        if (isset($_SESSION['user'])) {
                            $name = $_SESSION['user']['name'];
                            $telephone = $_SESSION['user']['telephone'];
                            $email = $_SESSION['user']['email'];
                            $address = $_SESSION['user']['address'];
                        } else {
                            $name = "";
                            $telephone = "";
                            $email = "";
                            $address = "";
                        }
                        ?>
                        <tr>
                            <td>
                                Name
                            </td>
                            <td>
                                <input type="text" name="name" value="<?= $name ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Address
                            </td>
                            <td>
                                <input type="text" name="address" value="<?= $address ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Email
                            </td>
                            <td>
                                <input type="text" name="email" value="<?= $email ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Phone
                            </td>
                            <td>
                                <input type="text" name="tel" value="<?= $telephone ?>" required>
                            </td>
                        </tr>

                    </table>

                </div>
                <div class="rowkhac mb10 frmdsloai">
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $phiship = 15;
                            $sum_money = 0 +  $phiship;

                            if (isset($_SESSION['mycart']) && !empty($_SESSION['mycart'])) {
                                foreach ($_SESSION['mycart'] as $item) {
                                    $image = $item[1];
                                    $productName = $item[2];
                                    $id = $item[0];
                                    $price = $item[3];
                                    $quantity = isset($_COOKIE["quantity{$id}"]) ? $_COOKIE["quantity{$id}"] : $item[4];
                                    $totalPrice = $quantity * $price;
                                    $sum_money += $totalPrice;
                            ?>
                                    <tr>
                                        <td><img src="<?= $image ?>" alt="Product Image" class="product-image" style="width: 50px;"></td>
                                        <td><?= $productName ?></td>
                                        <td>$<?= $price ?></td>
                                        <td><?= $quantity ?></td>
                                        <td>$<?= $totalPrice ?></td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "<tr><td colspan='5'>Your cart is empty</td></tr>";
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">Shipping fee:</td>
                                <td id="grandtotal">$15</td>
                            </tr>
                            <tr>
                                <td colspan="4">Grand Total:</td>
                                <td id="grandtotal">$<?= $sum_money  ?></td>
                            </tr>
                        </tfoot>
                    </table>
                    <input type="hidden" name="grandtotal" value="<?= $sum_money ?>">
                    <div class="payment-method">
                        <span>Select payment method:</span>
                        <label><input type="radio" name="payment_method" value="1"> Cash on delivery</label>
                        <label><input type="radio" name="payment_method" value="2"> Pay with Stripe(free shipping)</label>

                    </div>
                    <input type="submit" value="CONFIRM ORDER" name="accept" id="accept-button">
                </div>
            </div>
        </form>

    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var form = document.getElementById("order-form");
        var radioButtons = document.getElementsByName("payment_method");

        for (var i = 0; i < radioButtons.length; i++) {
            radioButtons[i].addEventListener("change", function() {
                // Nếu radio button 1 được chọn
                if (this.value === "1") {
                    form.action = "index.php?act=billconfirm";
                }
                // Nếu radio button 2 được chọn
                else if (this.value === "2") {
                    form.action = "index.php?act=checkout";
                } else if (this.value === "3") {
                    form.action = "link-to-paypal-payment";
                }

            });
        }
    });

    function validateAndSubmitForm() {
        var name = document.querySelector('input[name="name"]').value;
        var address = document.querySelector('input[name="address"]').value;
        var email = document.querySelector('input[name="email"]').value;
        var tel = document.querySelector('input[name="tel"]').value;


        if (!name || !address || !email || !tel) {
            alert("Vui lòng điền đầy đủ thông tin vào các trường bắt buộc .");
        } else {
            document.getElementById("order-form").submit(); // Gửi form nếu thông tin hợp lệ
        }
    }
    document.getElementById("accept-button").addEventListener("click", validateAndSubmitForm);
    document.getElementById("order-form").addEventListener("submit", function(event) {
        var paymentMethodRadios = document.getElementsByName("payment_method");
        var isChecked = false;
        for (var i = 0; i < paymentMethodRadios.length; i++) {
            if (paymentMethodRadios[i].checked) {
                isChecked = true;
                break;
            }
        }
        if (!isChecked) {
            alert("Vui lòng chọn một phương thức thanh toán trước khi gửi form.");
            event.preventDefault();

        }
    });
</script>