<style>
    select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        margin-top: 5px;
        background-color: #fff;
        color: #333;
        font-size: 16px;
        cursor: pointer;
    }

    option[selected] {
        background-color: orange;
        color: orange;
    }

    option {
        background-color: #fff;

        color: #333;
    }

    button {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
        margin-bottom: 10px;

    }

    button:hover {
        background-color: #0056b3;
    }

    .product-info {
        background: #ffffff;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .product-info h3 {
        margin-top: 20px;
        margin-bottom: 10px;
        color: #333;
    }

    .product-info p,
    .product-info ul {
        margin-bottom: 10px;
    }

    .product-info ul {
        padding-left: 20px;
    }
</style>
<div class="main-content">
    <div class="form-container row">
        <div class="row frmtitle">
            <h1>THÊM MỚI SẢN PHẨM</h1>
        </div>
        <div class="row form-content">
            <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
                <div class="row">
                    DANH MỤC SẢN PHẨM <br>
                    <select name="iddm">
                        <option value="0">Tất cả</option>
                        <?php
                        foreach ($loaddanhmuc as $danhmuc) {
                            extract($danhmuc);
                            echo '<option value="' . $id . '">' . $name . '</option>';
                        }

                        ?>


                    </select>
                </div>
                <div class="row">
                    TÊN SẢN PHẨM <br>
                    <input type="text" name="tensp">
                </div>
                <div class="row">
                    GIÁ <br>
                    <input type="text" name="giasp">
                </div>
                <div class="row">
                    HÌNH <br>
                    <input type="file" name="hinh">
                </div>
                <div class="row">
                    HÌNH TƯƠNG TỰ <br>
                    <input type="file" name="hinh_khac[]" id="hinhkhac" multiple>
                </div>
                <div class="row">
                    MÔ TẢ (ngắn gọn) <br>
                    <textarea name="mota" cols="10" rows="10" placeholder="mô tả sản phẩm bằng 1 câu"></textarea>
                </div>
                <div class="row">
                    <div class="input-container">
                        <h2>Nhập thông tin sản phẩm (không bắt buộc)</h2>
                        <textarea id="product-input" name="info" rows="10" cols="50" placeholder="Nhập thông tin sản phẩm tại đây..."></textarea>
                        <button type="button" onclick="displayProductInfo()">Hiển thị</button>
                    </div>
                    <div id="product-info" class="product-info"></div>
                </div>
                <div class="row mb10">
                    <input type="submit" name="themmoi" value="THÊM MỚI">
                    <input type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=listsp"> <input type="button" value="DANH SÁCH"></a>
                </div>

                <?php
                $thanhcong = "Successfully!";
                if (isset($thongbao) && $thongbao != "") {
                    echo "<div id='notification' class='notification'>
                    $thanhcong<br>
                    $thongbao
                    </div>";
                }
                ?>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<script>
    function displayProductInfo() {
        const input = document.getElementById('product-input').value;
        const productInfoContainer = document.getElementById('product-info');

        const sections = input.split('\n\n');
        let formattedContent = '';

        sections.forEach(section => {
            const lines = section.split('\n');
            formattedContent += `<h3>${lines[0]}</h3>`;

            lines.slice(1).forEach(line => {
                if (line.trim().startsWith('-')) {

                    formattedContent += `<ul><li>${line.trim().slice(1).trim()}</li></ul>`;
                } else {

                    formattedContent += `<p>${line.trim()}</p>`;
                }
            });
        });

        productInfoContainer.innerHTML = formattedContent;
    }
</script>