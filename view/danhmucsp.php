<!-- cart container -->
<div class="cart-icon">
    <a href="index.php?act=viewcart">
        <i style="color: white;" class="fas fa-shopping-cart"></i>
        <span><?=$num_items_in_cart?></span>
    </a>
</div>
<!--border under -->
<!-- Add your content here -->
<div class="sidebar-container">
    <button class="expand-btn" onclick="toggleSidebar()"><i class="fas fa-history"></i></button>
    <div class="sidebar">
        <div class="sidebar-content">
            <h3>Most Recently</h3>
            <ul>
                <li><?=$totalPages?></li>
                <li>Clothes 2</li>
                <li>Clothes 3</li>
                <!-- Add more items here -->
            </ul>
        </div>
    </div>
    <div class="main-content">
        <div class="product-container margin-top">
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

                // echo '</div>';
                ?>

            </div>
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
        </div>
    </div>
</div>
<!-- chat -->
<div class="chat-icon" onclick="toggleChat()">
    <i class="fas fa-comments"></i>
    <div class="tooltip">Chat</div>
</div>
<div class="chat-container">
    <div class="chat-header">
        <i class="fas fa-comments"></i> Chat Messenger
        <span class="close" onclick="toggleChat()">×</span>
    </div>
    <div class="chat-messages" id="chatMessages">
        <button onclick="showAnswer('origin')">Sản phẩm có nguồn gốc từ đâu?</button>
        <br>
        <button onclick="showAnswer('quality')">Sản phẩm ở đây có chất lượng không?</button>
        <br>
        <button onclick="showAnswer('quytrinh')">Quy trình đặt hàng như thế nào?</button>
        <br>
        <button onclick="showAnswer('timegiaohang')">Thời gian giao hàng dự kiến là bao lâu?</button>
        <br>
        <button onclick="showAnswer('thanhtoan')">Có hỗ trợ trả góp không?</button>
        <br>
        <button onclick="showAnswer('discount')">Làm thế nào để sử dụng mã giảm giá?</button>

    </div>
    <div class="chat-input">
        <input type="text" placeholder="Type your message...">
        <button onclick="sendMessage()">Send</button>
    </div>
</div>