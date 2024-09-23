<head>
    <link rel="stylesheet" href="css/billstyle.css">
</head>
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
                if (this.value === "1") {
                    form.action = "index.php?act=billconfirm";
                }
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
            document.getElementById("order-form").submit();
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