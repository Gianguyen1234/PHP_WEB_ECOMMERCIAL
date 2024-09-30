<head>
    <link rel="stylesheet" href="css/viewcart.css">
</head>
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