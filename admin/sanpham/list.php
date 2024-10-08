<head>
    <link rel="stylesheet" href="internalcss/customlist.css">
</head>
<style>
    .form-inline {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .custom-input {
        flex: 1;
        padding: 0.5rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: 0.375rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .custom-input:focus {
        outline: 0;
        border-color: #4d90fe;
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
    }

    .custom-select {
        flex: 1;
        padding: 0.5rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: 0.375rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .custom-select:focus {
        outline: 0;
        border-color: #4d90fe;
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
    }

    .custom-submit {
        padding: 0.5rem 1rem;
        font-size: 1rem;
        line-height: 1.5;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        cursor: pointer;
        user-select: none;
        background-color: #007bff;
        border: 1px solid transparent;
        border-radius: 0.375rem;
        color: #fff;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
    }

    .custom-submit:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>
<div class="main-container">
    <div class="rowkhac">
        <div class="rowkhac frmtitle mb">
            <h1>PRODUCT LIST</h1>
        </div>
        <form action="index.php?act=listsp" method="post">
            <div class="form-inline">
                <input type="text" name="keyword" placeholder="Enter product name" class="custom-input">
                <select name="iddm" class="custom-select">
                    <option value="0" selected>All</option>
                    <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        echo '<option value="' . $id . '">' . $name . '</option>';
                    }
                    ?>
                </select>
                <input type="submit" value="Search" name="submit" class="custom-submit">
            </div>
        </form>
        <div class="rowkhac frmcontent">
            <div class="rowkhac mb10 frmdsloai">
                <table>
                    <tr>
                        <th></th>
                        <th>TYPE CODE</th>
                        <th>PRODUCT NAME</th>
                        <th>PRICE</th>
                        <th>IMAGE</th>
                        <th>DESCRIPTION</th>
                        <th>VIEWS</th>
                        <th>ACTIONS</th>
                    </tr>
                    <?php
                    foreach ($listsanpham as $sanpham) {
                        // extract data from the product table
                        extract($sanpham);
                        // actions to edit and delete products
                        $suasp = "index.php?act=suasp&id=" . $id;
                        $xoasp = "index.php?act=xoasp&id=" . $id;
                        $xemct = "index.php?act=xemct&id=" . $id;
                        $img_path = "../uploads/" . $image;
                        // check if img_path exists
                        if (is_file($img_path)) {
                            $images = "<img src='" . $img_path . "' height='80'>";
                        } else {
                            $images = "Image path is not found";
                        }

                        echo '  <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>' . $id . '</td>
                                <td>' . $name . '</td>
                                <td>' . $price . '</td>
                                <td>' . $images . '</td>
                                <td>' . $description . '</td>
                                <td>' . $view . '</td>
                                <td>
                                <a href="' . $suasp . '" class="icon-button blue"><i class="fas fa-edit"></i> Edit</a>
                                <a href="' . $xoasp . '" class="icon-button red"><i class="fas fa-trash-alt"></i> Delete</a>
                                <a href="' . $xemct . '" class="icon-button green"><i class="fas fa-info-circle"></i> View Details</a>
                                </td>
                                </td>
                            </tr>';
                    }
                    ?>
                </table>
            </div>
            <div class="rowkhac mb10">
                <input type="button" value="Select All">
                <input type="button" value="Deselect All">
                <input type="button" value="Delete Selected">
                <input type="button" value="Add New">
            </div>
        </div>
    </div>
</div>
