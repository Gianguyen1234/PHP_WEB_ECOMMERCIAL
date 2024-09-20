    <!-- cart container contains number of item in cart -->
    <div class="cart-icon">
        <a href="index.php?act=viewcart">
            <i style="color: white;" class="fas fa-shopping-cart"></i>
            <span><?= $num_items_in_cart ?></span>
        </a>
    </div>
    <!-- end item in cart -->

    <!--Side bar contains history -->
    <div class="sidebar-container">
        <button class="expand-btn" onclick="toggleSidebar()"><i class="fas fa-history"></i></button>
        <div class="sidebar">
            <div class="sidebar-content">
                <h3>History</h3>
                <?php
                if (isset($_SESSION['user'])) {
                    $userid = $_SESSION['user']['id'];
                    $history = show_history($userid);

                    foreach ($history as $history) {
                        extract($history);
                ?>
                        <ul>
                            <li><a href="<?= $linkct ?>" class="history"><?= $product_name ?></a></li>
                         
                        </ul>
                    <?php
                    }
                } else {
                    ?>
                    <p>You must <a href="index.php?act=dangnhap" style="color: cyan; font-size: 20px; text-decoration:none;">Login</a> to see the history of click!</p>
                <?php } ?>
            </div>
        </div>
        <div class="main-content">
        <!-- slide show -->
            <!-- Slideshow container -->
            <div class="slideshow-container">
                <!-- Full-width images with number and caption text -->
                <div class="mySlides slide">

                    <img src="images/slide.png" style="width:100%">
                    <div class="slide-text">Men's Fashion</div>
                </div>

                <div class="mySlides slide">

                    <img src="images/slide2.png" style="width:100%">
                    <div class="slide-text">Be the first to have this item</div>
                </div>

                <div class="mySlides slide">

                    <img src="images/slide3.png" style="width:100%">
                    <div class="slide-text">Up To 50% OFF</div>
                </div>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>

            <!-- The dots/circles -->
            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>
            <!-- The end of dots/circles -->

        <!-- end slideshow -->

            <!-- Mở đầu cho New Release -->
            <div class="product-container margin-top">
                <div class="border-under">
                    <h1><i class="fas fa-font-awesome"></i> New Release</h1>
                </div>
                <div class="product-row">
                    <?php
                    include "pagination_func.php";
                    $perPage = 8; // Number of products per page
                    $page = isset($_GET['page']) ? $_GET['page'] : 1; 
                    $totalProducts = getTotalProductsCount();
                    // Calculate total pages
                    $totalPages = ceil($totalProducts / $perPage); 
                    // Get products for the current page
                    $products = getProductsByPage($page, $perPage); 
                    foreach ($products as $product) {
                        extract($product);
                        $linkct = "index.php?act=sanphamct&idsp=" . $id;
                        $images = "uploads/" . $image;
                        echo ' 
                            <div class="product-card">
                            <a href="' . $linkct . '"><img src="' . $images . '" alt="Clothes"></a>
                            <div class="product-info">
                                <a href="' . $linkct . '"><h3>' . $name . '</h3></a>
                                <p class="price">$' . $price . '</p>
                                <p class="voucher">Use code <span class="code">FRIENDS20</span> for 50% off</p>
                            </div>
                            </div>
                            ';
                    }
                    ?>
                </div>

                <div class="boxpage">

                    <div class="pagination " id="pagination">
                        <?php
                        // Previous button
                        if ($page > 1) {
                            echo '<a href="index.php?page=' . ($page - 1) . '" class="pagination-btn"><button>Prev</button></a>';
                        }
                        // Display pagination links
                        for ($i = 1; $i <= $totalPages; $i++) {
                            echo '<a href="index.php?page=' . $i . '" class="pagination-btn';
                            echo $page == $i ? ' active' : ''; 
                            echo '"><button>' . $i . '</button></a>';
                        }
                        // Next button
                        if ($page < $totalPages) {
                            echo '<a href="index.php?page=' . ($page + 1) . '" class="pagination-btn"><button>Next</button></a>';
                        }
                        ?>
                    </div>

                </div>
            </div>
            <div class="product-container ">
                <div class="border-under">
                    <h1><i class="fas fa-heart"></i> Top Viewers</h1>
                </div>
                <div class="product-row">
                    <?php
                    foreach ($topsp as $topsp) {
                        extract($topsp);
                        $linkct = "index.php?act=sanphamct&idsp=" . $id;
                        $images = "uploads/" . $image;
                        echo '<div class="product-card">
                        <a href="' . $linkct . '"><img src="' . $images . '" alt="Clothes"></a>
                        <div class="product-info">
                            <a href="' . $linkct . '"><h3>' . $name . '</h3></a>
                            <p class="price">$' . $price . '</p>
                            <p class="voucher">Use code <span class="code">FRIENDS20</span> for 50% off</p>
                        </div>
                        </div>';
                    }
                    ?>
                </div>
                <!-- <div class="product-row"> -->
                <!-- <div class="product-card"> -->
                <!-- <img src="product.jpg" alt="Clothes 1"> -->
                <!-- <div class="product-info"> -->
                <!-- <h3>Cool Shirt</h3> -->
                <!-- <p class="price">$29.99</p> -->
                <!-- <p class="voucher">Use code <span class="code">COOL10</span> for 10% off</p> -->
                <!-- </div> -->
                <!-- </div> -->
                <!-- </div> -->
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
            <button onclick="showAnswer('origin')">Where is the product sourced from?</button>
            <br>
            <button onclick="showAnswer('quality')">Are the products here of good quality?</button>
            <br>
            <button onclick="showAnswer('quytrinh')">What is the ordering process?</button>
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
    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            for (let i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 2000); 
        }

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }
    </script>