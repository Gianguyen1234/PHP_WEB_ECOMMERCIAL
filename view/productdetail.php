<style>
  .product-detail {
    margin-top: 30px;
    margin-bottom: 10px;
    background: linear-gradient(to bottom, rgb(29, 229, 196), rgb(22, 108, 137));
    padding: 50px 0;
  }

  .product-info {
    display: flex;
    align-items: start;
    justify-content: space-between;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    overflow: hidden;
  }

  .product-image {
    flex: 1;
    margin-top: 50px;
  }

  .product-image img {
    width: 100%;
    height: auto;
    display: block;
    border-radius: 10px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    box-shadow: 5px 10px lightseagreen;
  }

  .product-details {
    flex: 1;
    padding: 30px;
  }

  .product-name {
    font-size: 28px;
    margin-bottom: 10px;
    color: rgb(88, 162, 247);
  }

  .product-price {
    font-size: 24px;
    font-weight: bold;
    color: #ff5733;
    margin-bottom: 20px;
  }

  .product-description {
    font-size: 18px;
    color: #666;
    margin-bottom: 20px;
  }

  .product-views {
    font-size: 16px;
    color: #666;
  }

  @media only screen and (max-width: 768px) {
    .product-info {
      flex-direction: column;
    }

    .product-image img {
      border-radius: 10px 10px 0 0;
    }
  }

  .btn {
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
    animation: pulse 1.5s infinite;
  }


  .btn-add-to-cart {
    background-color: #3498db;
    color: white;
  }

  .btn:hover {
    background-color: lawngreen;
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

  .main-content {
    flex: 1;
    background-color: #f4f4f4;
    overflow-y: auto;
  }

  .boxcenter {
    width: 60%;
    margin: 0 auto;
  }

  .border-under-dt {
    background-color: none;
    inline-size: 100%;
    border-block-end: 2px black solid;
  }

  .mt {
    margin-top: 100px;
  }

  .wrapper {
    max-width: 1100px;
    width: 100%;
    position: relative;
  }

  .wrapper i {
    top: 50%;
    height: 50px;
    width: 50px;
    cursor: pointer;
    font-size: 1.25rem;
    position: absolute;
    text-align: center;
    line-height: 50px;
    background: #fff;
    border-radius: 50%;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.23);
    transform: translateY(-50%);
    transition: transform 0.1s linear;
  }

  .wrapper i:active {
    transform: translateY(-50%) scale(0.85);
  }

  .wrapper i:first-child {
    left: -22px;
  }

  .wrapper i:last-child {
    right: -22px;
  }

  .wrapper .carousel {
    display: grid;
    grid-auto-flow: column;
    grid-auto-columns: calc((100% / 3) - 12px);
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    gap: 16px;
    border-radius: 8px;
    scroll-behavior: smooth;
    scrollbar-width: none;
  }

  .carousel::-webkit-scrollbar {
    display: none;
  }

  .carousel.no-transition {
    scroll-behavior: auto;
  }

  .carousel.dragging {
    scroll-snap-type: none;
    scroll-behavior: auto;
  }

  .carousel.dragging .card {
    cursor: grab;
    user-select: none;
  }

  .carousel :where(.card, .img) {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .carousel .card {
    scroll-snap-align: start;
    height: 342px;
    list-style: none;
    background: #fff;
    cursor: pointer;
    padding-bottom: 15px;
    flex-direction: column;
    border-radius: 8px;
  }

  .carousel .card .img {
    background: #1de2f0;
    height: 148px;
    width: 148px;
    border-radius: 50%;
  }

  .card .img img {
    width: 140px;
    height: 140px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #fff;
  }

  .carousel .card h2 {
    font-weight: 500;
    font-size: 1.56rem;
    margin: 30px 0 5px;
  }

  .carousel .card span {
    color: rgb(103, 217, 237);
    font-size: 1.31rem;
  }

  @media screen and (max-width: 900px) {
    .wrapper .carousel {
      grid-auto-columns: calc((100% / 2) - 9px);
    }
  }

  @media screen and (max-width: 600px) {
    .wrapper .carousel {
      grid-auto-columns: 100%;
    }
  }

  .carousel {
    background-color: #666;
    padding: 20px;
    border-radius: 8px;
    overflow: hidden;
  }

  .carousel li a {
    text-decoration: none;
  }

  .comment-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 20px;
  }

  .comment {
    width: 100%;
    max-width: 1100px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    padding: 20px;
    display: flex;
    gap: 10px;
  }

  .user-image {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
  }

  .user-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .comment-content {
    flex-grow: 1;
  }

  .comment-text {
    margin-bottom: 10px;
  }

  .comment-author {
    font-weight: bold;
  }

  textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    resize: vertical;
  }

  input[type="submit"] {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  @media screen and (max-width: 768px) {
    .comment {
      padding: 15px;
    }

    .user-image {
      width: 40px;
      height: 40px;
    }
  }

  @media screen and (max-width: 600px) {
    .comment {
      padding: 10px;
      flex-direction: column;
      align-items: flex-start;
    }

    .comment-content {
      margin-top: 10px;
    }

    input[type="submit"] {
      padding: 8px 16px;
    }
  }

  .login-message {
    background-color: #f8d7da;
    color: #721c24;
    padding: 50px; 
    border: 1px solid #f5c6cb;
    border-radius: 5px;
    margin-bottom: 100px;
  }

  .login-message a {
    color: #721c24;
    text-decoration: underline;
    font-weight: bold;

  }

  .info-item {
    margin-bottom: 20px;
  }

  .info-item h3 {
    margin: 0;
    font-size: 15px;
    color: #333;
  }

  .info-item h3,
  .info-item p {
    display: inline-block;
    margin: 0;
  }

  .info-item p {
    margin: 5px 0 0;
    font-size: 14px;
    color: #666;
  }

  .container-giaohang {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
  }

  .sizes {
    margin: 10px 0;
  }

  .size {
    display: inline-block;
    padding: 10px 20px;
    margin-right: 10px;
    cursor: pointer;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  .size.selected {
    background-color: #007bff;
    color: #fff;
  }

  .color-slider-container {
    display: flex;
    margin-top: 30px;
    align-items: center;
    justify-content: center;
  }

  .color-slider {
    display: flex;
    overflow: hidden;
    width: 300px;
  }

  .color-slider .thumbnail {
    min-width: 60px;
    height: 60px;
    border: 1px solid #ccc;
    cursor: pointer;
    transition: transform 0.3s ease;
  }

  .color-slider .thumbnail:hover {
    transform: scale(1.1);
  }

  button {
    background-color: #fff;
    border: 1px solid #ccc;
    cursor: pointer;
    padding: 5px 10px;
    font-size: 18px;
  }

  button:disabled {
    opacity: 0.5;
    cursor: not-allowed;
  }

  .content-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 50px;
    width: 60%;
    margin-left: 400px;

  }

  .content-box {
    background: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
    transition: box-shadow 0.3s ease;
    padding: 20px;
  }

  .box:hover {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
  }

  .content-dropdown {
    text-align: left;
  }

  .more-content {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.5s ease-out, opacity 0.5s ease-out;
    opacity: 0;
  }

  .more-content.open {
    max-height: 500px;
    opacity: 1;
  }

  .content-toggle-btn {
    color: #007bff;
    cursor: pointer;
    display: block;
    margin-top: 10px;
    text-align: right;
    font-weight: bold;
  }

  .toggle-btn:hover {
    text-decoration: underline;
  }

  h3 {
    margin-top: 20px;
    margin-bottom: 10px;
    color: #333;
  }
</style>
<?php
session_start();
extract($onesp);
$images = "uploads/" . $image;
if (isset($_SESSION['user'])) {
  $userid = $_SESSION['user']['id'];
  $idproduct = $onesp['id'];
  $productname = $onesp['name'];
  insert_history($userid, $idproduct, $productname);
}
?>
<div class="main-content">
  <!-- detail product -->
  <div class="product-detail">
    <div class="container">
      <div class="product-info">
        <div class="product-image">
          <?php
          echo '<img id="product-image"  src="' . $images . '" alt="Product Image">';
          ?>
          
          <!-- relative images -->
          <div class="color-slider-container">
            <button id="prev-btn">&lt;</button>
            <div class="color-slider">
              <?php
              $file_names = show_file_names($onesp['id']);
              foreach ($file_names as $hinhtuongtu) {
                $hinh = "uploads/" . $hinhtuongtu;
              ?>
                <img class="thumbnail" src="<?= $hinh ?>" alt="Color 1" onmouseover="changeImage('<?= $hinh ?>')">
            
              <?php
              }
              ?>
            </div>
            <button id="next-btn">&gt;</button>
          </div>
          <!-- kết thúc -->
        </div>
        <!-- end product-image -->

        <div class="product-details">
          <h2 class="product-name"><?= $name ?></h2>
          <p class="product-price">$<?= $price ?></p>
          <p class="product-description"><?= $description ?></p>
          <div class="product-actions">
            <p class="product-views"><i class="fas fa-eye"></i><?= $view ?>Views</p>
            <form action="index.php?act=addtocart" method="post">
              <input type="hidden" name="id" value="<?= $id ?>">
              <input type="hidden" name="images" value="<?= $images ?>">
              <input type="hidden" name="name" value="<?= $name ?>">
              <input type="hidden" name="price" value="<?= $price ?>">
              <div class="sizes">
                <div id="M" class="size" onclick="selectSize('M')">M</div>
                <div id="L" class="size" onclick="selectSize('L')">L</div>
                <div id="XL" class="size" onclick="selectSize('XL')">XL</div>
                <div id="2XL" class="size" onclick="selectSize('2XL')">2XL</div>
                <div id="3XL" class="size" onclick="selectSize('3XL')">3XL</div>
              </div>
              <button class="btn btn-add-to-cart" name="addtocart">Add to Cart</button>
            </form>
            <div class="container-giaohang">
              <div class="info-item">
                <h3> <i class="fa-solid fa-truck"></i> Free Shipping:</h3>
                <p>For orders over $199</p>
              </div>
              <div class="info-item">
                <h3> <i class="fa-regular fa-clock"></i> Delivery:</h3>
                <p>3 - 5 days nationwide</p>
              </div>
              <div class="info-item">
                <h3> <i class="fa-solid fa-right-left"></i> Free Returns:</h3>
                <p>At 267+ stores within 15 days</p>
              </div>
              <div class="info-item">
                <h3> <i class="fa-solid fa-ticket"></i> Use Discount Code:</h3>
                <p>At checkout</p>
              </div>
              <div class="info-item">
                <h3><i class="fa-solid fa-user-shield"></i> Privacy and Encryption Information</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- product information with  parsedown -->
  <div class="content-container">
    <div id="product-info" class="content-box">
      <h2>Product Information</h2>
      <div class="content-dropdown">
        <p>This is a brief description of the product.</p>
        <div id="more-content" class="more-content">
          <?php
          // show  product desscription 
          $Parsedown = new Parsedown();
          $html = $Parsedown->text($info);

          echo $html;

          ?>
        </div>
        <span id="content-toggle-btn" class="content-toggle-btn" onclick="toggleContent()">See more &darr;</span>
      </div>
    </div>
  </div>
  <!-- relative products -->
  <div class="boxcenter">
    <div class="border-under-dt">
      <h1><i class="fa-solid fa-equals"></i> Related Products</h1>
    </div>
    <div class="wrapper">
      <ul class="carousel">
        <i id="left" class="fa-solid fa-angle-left"></i>
        <?php
        foreach ($sp_cungloai as  $spcungloai) {
          extract($spcungloai);
          $linkct = "index.php?act=sanphamct&idsp=" . $id;
          $hinh = "uploads/" . $image;
          echo '<li class="card">
        <div class="img">
        <a href="' . $linkct . '"><img src="' . $hinh . '" alt=" Same Product"></a>
        </div>
        <a href="' . $linkct . '"><h2>' . $name . '</h2></a>
        <a href="' . $linkct . '"><span>$' . $price . '</span></a>
        </li>';
        }
        ?>
        <i id="right" class="fa-solid fa-angle-right"></i>
      </ul>
    </div>
  </div>
  <!-- comment -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#binhluan").load("view/binhluan/binhluanform.php", {
        idpro: <?= $onesp['id'] ?>
      });
    });
  </script>
  <div class="boxcenter mt" id="binhluan">

  </div>

</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
  function selectSize(size) {
    var sizes = document.querySelectorAll('.size');
    sizes.forEach(function(element) {
      element.classList.remove('selected');
    });
    document.getElementById(size).classList.add('selected');
    document.getElementById('selectedSize').value = size;
  }
</script>
<script>
  let originalImageSrc = document.getElementById('product-image').src;

  function changeImage(imageSrc) {
    const mainImage = document.getElementById('product-image');
    mainImage.src = imageSrc;
  }

  function resetImage() {
    const mainImage = document.getElementById('product-image');
    mainImage.src = originalImageSrc;
  }

  const slider = document.querySelector('.color-slider');
  const prevBtn = document.getElementById('prev-btn');
  const nextBtn = document.getElementById('next-btn');

  let scrollAmount = 0;
  const scrollStep = 60;

  prevBtn.addEventListener('click', () => {
    slider.scrollBy({
      top: 0,
      left: -scrollStep,
      behavior: 'smooth'
    });
    scrollAmount -= scrollStep;
    checkButtons();
  });

  nextBtn.addEventListener('click', () => {
    slider.scrollBy({
      top: 0,
      left: scrollStep,
      behavior: 'smooth'
    });
    scrollAmount += scrollStep;
    checkButtons();
  });

  function checkButtons() {
    if (scrollAmount <= 0) {
      prevBtn.disabled = true;
    } else {
      prevBtn.disabled = false;
    }

    if (scrollAmount >= slider.scrollWidth - slider.clientWidth) {
      nextBtn.disabled = true;
    } else {
      nextBtn.disabled = false;
    }
  }
  checkButtons();


  function toggleContent() {
    const moreContent = document.getElementById('more-content');
    const toggleBtn = document.getElementById('content-toggle-btn');

    if (moreContent.style.maxHeight) {
      moreContent.style.maxHeight = null;
      moreContent.style.opacity = '0';
      toggleBtn.innerHTML = "See more &darr;";
    } else {
      moreContent.style.maxHeight = moreContent.scrollHeight + "px";
      moreContent.style.opacity = '1';
      toggleBtn.innerHTML = "Collapse &uarr;";
    }
  }
</script>