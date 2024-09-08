<style>
    .detail-container {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
        max-width: 1200px;
        margin: 120px auto;
        margin-right:200px;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        border-radius: 4px;
    }

    .detail-heading {
        font-size: 24px;
        color: #333;
        margin-bottom: 16px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 8px;
    }

    .detail-info-section {
        margin-bottom: 16px;
    }

    .detail-info-section h3 {
        font-size: 18px;
        color: #333;
        margin-bottom: 8px;
    }

    .detail-info-section p {
        color: #666;
        margin-top: 0;
    }

    .detail-images {
        display: flex;
        flex-wrap: wrap;
    }

    .detail-images img {
        max-width: 100%;
        height: auto;
        margin-right: 10px;
        margin-bottom: 10px;
        border-radius: 4px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .detail-additional-info {
        margin-left: 24px;
    }
    .detail-btn {
    padding: 10px 20px;
    background-color: #1890ff;
    color: #fff;
    border: none;
    cursor: pointer;
    border-radius: 4px;
    transition: background-color 0.3s;
    display: inline-flex; /* Display as inline-flex to align with text */
    align-items: center; /* Center icon vertically */
    text-decoration: none; /* Remove default underline for links */
}

.detail-btn i {
    margin-right: 5px; /* Add spacing between icon and text */
}

.detail-btn:hover {
    background-color: #40a9ff;
}
    /* Responsive styles */
    @media (max-width: 600px) {
        .detail-container {
            padding: 10px;
        }

        .detail-heading {
            font-size: 20px;
        }

        .detail-info-section h3 {
            font-size: 16px;
        }
    }
</style>
<?php
    if (isset($detail)) {
        extract($detail);
    }
    $hinh = "../uploads/".$image;
?>
<div class="detail-container">
    <div class="detail-heading">Thông tin chi tiết sản phẩm</div>

    <div class="detail-info-section">
        <h3>TÊN SẢN PHẨM</h3>
        <p id="product-name"><?=$name?></p>
    </div>

    <div class="detail-info-section">
        <h3>GIÁ</h3>
        <p id="product-price"><?=$price?></p>
    </div>

    <div class="detail-info-section">
        <h3>MÔ TẢ</h3>
        <p id="product-description"><?=$description?></p>
    </div>

    <div class="detail-info-section">
        <h3>HÌNH ẢNH</h3>
        <div class="detail-images">
            <!-- Placeholder for images -->
            <img src="<?=$hinh?>" alt="Image 1">            
            <!-- Add more images as needed -->
        </div>
    </div>

    <div class="detail-info-section">
        <h3>Thông tin sản phẩm</h3>
        <?php
            if (isset($info)) {
              
            
        ?>
        <div class="detail-additional-info" id="additional-info">
            <p><?=$info?></p>
        </div>
        <?php
            }else{
                echo "No information!";
            }
        ?>
    </div>

    <a href="index.php?act=listsp" class="detail-btn"><i class="fas fa-list"></i> Danh sách</a>
</div>




















