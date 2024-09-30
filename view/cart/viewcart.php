<style>
    .cart-mother {
        margin-top: 100px;
        display: flex;
        color: #38cff0;
        font-size: 48px;
        font-weight: bold;
        justify-content: center;
        text-decoration: underline;
    }

    .cart-container {
        margin-top: 30px;
        display: flex;
        justify-content: space-between;
        margin-bottom: 50px;
        margin-right: 20px;
        margin-left: 20px;
    }

    .left-box {
        width: 48%;
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .box-header {
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    .box-header h2 {
        margin-bottom: 10px;
    }

    .header-row {
        display: flex;
        justify-content: space-between;
        font-weight: bold;
        text-align: center;
        align-items: center;
    }

    .header-row span {
        flex: 0.5;
        text-align: center;
    }

    .header-row span:nth-child(2) {
        flex: 2.5;        
    }

    .header-row span:nth-child(3) {
        flex: 1.5;       
    }

    .header-row span:nth-child(4) {
        flex: 2;     
    }

    .header-row span:nth-child(5) {
        flex: 2.5;
        
    }

    .header-row span:last-child {
        flex: 2;
       
    }

    .cart-product {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
        margin-bottom: 10px;
    }

    .cart-product-details {
        display: flex;
        align-items: center;
    }

    .cart-product-details img {
        width: 80px;
        height: auto;
        margin-right: 20px;
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .cart-product-info {
        flex: 1;
    }


    .cart-product-info span {
        margin-right: 40px;

    }

    .cart-product-name {
        display: inline-block;
        width: 100px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .cart-delete-btn {
        margin-left: 70px;
        margin-right: 70px;
        background-color: #ff4d4d;
        color: #fff;
        border: none;

        padding: 5px 10px;
        border-radius: 4px;
        cursor: pointer;
    }

    .delete-btn:hover {
        background-color: #ff3333;
    }

    .quantity {
        width: 60px;
        padding: 5px;
        margin-right: 30px;
        margin-left: 30px;
    }

    .right-box {
        width: 48%;
        height: fit-content;
        margin-left: 30px;
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .right-box .summary {
        margin-bottom: 20px;
    }

    .right-box .summary div {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .right-box .summary .subtotal,
    .right-box .summary .shipping,
    .right-box .summary .grand-total {
        font-weight: bold;
    }

    /* phương thức thanh toán */
    .payment-method {
        margin-top: 20px;
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .payment-method span {
        font-weight: bold;
        margin-right: 10px;
    }

    .payment-method label {
        margin-right: 15px;
    }

    .right-box button {
        float: inline-end;
        margin-top: 20px;
        margin-left: 10px;
        background-color: #15d167;
        padding: 10px;
        color: floralwhite;
        font-weight: 1f;
        border-radius: 4px;
        border: 1px solid #38cff0;
        animation: pulse 1.5s infinite;
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

    .payment-method {
        margin-top: 20px;
    }

    .payment-options {
        display: flex;
        gap: 20px;
        margin-top: 10px;
    }

    .payment-option {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 10px;
        border: 2px solid transparent;
        border-radius: 8px;
        cursor: pointer;
        transition: border-color 0.3s ease, background-color 0.3s ease;
    }

    .payment-option img {
        width: 100px;
        height: auto;
        margin-bottom: 8px;
    }

    .payment-option span {
        font-weight: bold;
        color: #333;
    }

    .payment-option.selected {
        border-color: #15d167;
        background-color: #f0f0f0;
    }

    .payment-option:hover {
        border-color: #15d167;
    }

    .size {
        display: inline-block;
        padding: 3px 6px;
        margin: 5px;
        cursor: pointer;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
</style>
<div class="cart-mother">Shopping cart</div>
<div class="cart-container">
    <div class="left-box">
        <div class="box-header">
            <div class="header-row">
                <span>Image</span>
                <span>Product</span>
                <span>Price</span>
                <span>Quantity</span>
                <span>Remove</span>
                <span>Size</span>
                <span>Total</span>
            </div>
        </div>
        <?php

        $subtotal = 0;
        $phiship = 15;
        $i = 0;
        $grandtotal = $phiship;
        if (isset($_SESSION['mycart']) && !empty($_SESSION['mycart'])) {
            foreach ($_SESSION['mycart'] as $product) {
                $id = $product[0];
                $hinh = $product[1];
                $ttien = $product[4] * $product[3];
                $subtotal += $ttien;

        ?>
                <div class="cart-product">
                    <div class="cart-product-details">
                        <img src="<?= $hinh ?>" alt="Product Image" class="product-image" id="hinh<?= $i ?>">
                        <div class="cart-product-info">
                            <span class="cart-product-name"><?= $product[2] ?></span>
                            <span class="price" id="price<?= $i ?>">$<?= $product[3] ?></span>
                            <input type="number" class="quantity" data-id="<?= $id ?>" value="<?= $product[4] ?>" min="1" id="quantity<?= $i ?>">
                            <a href="index.php?act=dlcart&idcart=<?= $i ?>"><button class="cart-delete-btn" id="xoa">Delete</button></a>
                        </div>
                        <select class="selected size" id="size<?= $i ?>">
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="2XL">2XL</option>
                            <option value="3XL">3XL</option>
                        </select>

                    </div>
                    <span style="margin-right: 30px;" class="total-price" id="total<?= $i ?>">$<?= $ttien ?></span>
                </div>
        <?php

                $i += 1;
            }
            $grandtotal += $subtotal;
        } else {
            echo "<p>Your cart is empty</p>";
        }
        ?>
    </div>
    <div class="right-box">
        <div class="summary">

            <div class="subtotal">
                <span>Subtotal:</span>
                <span class="subtotal-amount" id="subtotal">$<?= $subtotal ?></span>
            </div>
            <div class="shipping">
                <span>Shipping:</span>
                <span> $15 </span>
            </div>
            <div class="grand-total">
                <span>Grand Total:</span>
                <span class="total-amount" id="grandtotal">$<?= $grandtotal ?></span>
                <input type="hidden" id="grandtotallast" value="<?= $grandtotal ?>">
            </div>
        </div>
        <div class="payment-method">
            <span>Select payment method:</span>
            <div class="payment-options">
                <div class="payment-option" data-method="cash">
                    <img src="path/to/cash-icon.svg" alt="Cash on Delivery">
                    <span>Cash on Delivery</span>
                </div>
                <div class="payment-option" data-method="stripe">
                    <img src="image/stripe.png" alt="Stripe Payment">
                    <span>Stripe Payment</span>
                </div>
            </div>
        </div>
        <a href="index.php?act=bill"><button type="submit">CONTINUE ORDERING</button></a>
        <a href="index.php?act=dlall"><button id="xoagiohang">Delete All</button></a>
    </div>

</div>

<script>
    //update total price when quantity changes;
    document.addEventListener('DOMContentLoaded', function() {
        var quantities = document.querySelectorAll('.quantity');
        quantities.forEach(function(quantity, index) {
            quantity.addEventListener('input', function() {
                var price = parseFloat(document.getElementById('price' + index).innerText.replace('$', ''));
                var quantityValue = parseInt(this.value);
                var totalPrice = price * quantityValue;
                document.getElementById('total' + index).innerText = '$' + totalPrice.toFixed(2);
                updateSubtotalAndGrandTotal();

                document.cookie = ('quantity' + quantity.getAttribute('data-id') + '=' + quantityValue);

            });
        });

        function updateSubtotalAndGrandTotal() {
            var subtotal = 0;
            var grandtotal = 0;
            var prices = document.querySelectorAll('.total-price');
            prices.forEach(function(price) {
                subtotal += parseFloat(price.innerText.replace('$', ''));
            });
            grandtotal = subtotal + <?= $phiship ?>;
            sessionStorage.setItem('subtotal', subtotal.toFixed(2));
            sessionStorage.setItem('grandtotal', grandtotal.toFixed(2));

            document.getElementById('subtotal').innerText = '$' + subtotal.toFixed(2);
            document.getElementById('grandtotal').innerText = '$' + grandtotal.toFixed(2);
            document.getElementById('xoagiohang').addEventListener('click', function() {
                sessionStorage.clear();
            });
        }
      
    });
</script>