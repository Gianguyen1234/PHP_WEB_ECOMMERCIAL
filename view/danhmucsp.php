<!-- cart container -->
<div class="cart-icon">
    <a href="index.php?act=viewcart">
        <i style="color: white;" class="fas fa-shopping-cart"></i>
        <span><?=$num_items_in_cart?></span>
    </a>
</div>
<!--border under -->

<!-- test total pages -->
<div class="sidebar-container">
    <button class="expand-btn" onclick="toggleSidebar()"><i class="fas fa-history"></i></button>
    <div class="sidebar">
        <div class="sidebar-content">
            <h3>Most Recently</h3>
            <ul>
                <li><?=$totalPages?></li>
                <li>Clothes 2</li>
                <li>Clothes 3</li>             
            </ul>
        </div>
    </div>
    <!-- end sidebar -->
    <div class="main-content">
        <div class="product-container margin-top">
            <!-- Hien danh muc san pham -->
            <div class="border-under">
                <h1><i class="fas fa-font-awesome"></i> Product <?= $tendm ?></h1>
            </div>
            <div class="product-row">
                <?php
                foreach ($dmsp as $product) {
                    extract($product);
                    $linkct = "index.php?act=sanphamct&idsp=" . $id;
                    $images = "uploads/" . $image;
                    echo '
                            <div class="product-card">
                            <a href="' . $linkct . '"><img src="' . $images . '" alt="Clothes"></a>
                            <div class="product-info">
                            <a href="' . $linkct . '"><h3>' . $name . '</h3></a>
                            <p class="price">$' . $price . '</p>
                            <p class="voucher">Use code <span class="code">COOL10</span> for 10% off</p>
                        </div>
                        </div>';
                }

                ?>

            </div>
            <!-- Phan trang -->
            <div class="boxpage">
                <div class="pagination " id="pagination">
                    <?php  
                    // Previous button
                    if ($page > 1) {
                        echo '<a href="index.php?act=danhmucsp&iddm=' . $iddm . '&pages=' . ($page - 1) . '" class="pagination-btn"><button>Prev</button></a>';
                    }
                    // Display pagination links
                    for ($i = 1; $i <= $totalPages; $i++) {
                        echo '<a href="index.php?act=danhmucsp&iddm=' . $iddm . '&pages=' . $i . '" class="pagination-btn';
                        echo $page == $i ? ' active' : ''; // Add 'active' class to current page link
                        echo '"><button>' . $i . '</button></a>';
                    }
                    // Next button
                    if ($page < $totalPages) {
                        echo '<a href="index.php?act=danhmucsp&iddm=' . $iddm . '&pages=' . ($page + 1) . '" class="pagination-btn"><button>Next</button></a>';
                    }
                    ?>
                </div>
            </div>
            <!-- end phan trang -->
        </div>
    </div>
</div>

<!-- chat bot  -->
<div class="chat-icon" onclick="toggleChat()">
    <i class="fas fa-comments"></i>
    <div class="tooltip">Chat</div>
</div>
<div class="chat-container">
    <div class="chat-header">
        <i class="fas fa-comments"></i> Chat Messenger
        <span class="close" onclick="toggleChat()">×</span>
    </div>
    <!-- chat questions -->
   <div class="chat-messages" id="chatMessages">
        <button onclick="showAnswer('origin')">Where are the products sourced from?</button>
        <br>
        <button onclick="showAnswer('quality')">Are the products here of good quality?</button>
        <br>
        <button onclick="showAnswer('quytrinh')">What is the order process?</button>
        <br>
        <button onclick="showAnswer('timegiaohang')">What is the estimated delivery time?</button>
        <br>
        <button onclick="showAnswer('thanhtoan')">Is installment payment supported?</button>
        <br>
        <button onclick="showAnswer('discount')">How can I use a discount code?</button>
   </div>
    <div class="chat-input">
        <input type="text" placeholder="Type your message...">
        <button onclick="sendMessage()">Send</button>
    </div>
</div>