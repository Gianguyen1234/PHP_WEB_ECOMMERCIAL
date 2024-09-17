<head>
    <link rel="stylesheet" href="internalcss/customlist.css">
</head>
<div class="main-container">
    <div class="row">
        <div class="row frmtitle">
            <H1>LIST OF COMMENTS</H1>
        </div>
        <div class="rowkhac frmcontent">
            <div class="rowkhac mb10 frmdsloai">
                <table>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>CONTENT</th>
                        <th>PRODUCT ID</th>
                        <th>USER</th>
                        <th>COMMENT DATE</th>
                        <th></th>
                    </tr>
                    <?php
                    // $fetch_list_BL= fetch_list_binhluan();
                    foreach ($fetch_list_bl as $listbl) {
                        //khai khac data tu bang danhmuc
                        extract($listbl);
                        // action sua va xoa danh muc
                        // $suatk="index.php?act=suatk&id=".$id;
                        $xoabl = "index.php?act=xoabl&id=" . $id;
                        // <a href="'.$suatk.'"><input type="button" value="Sửa"></a> 

                        echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>' . $id . '</td>
                                <td>' . $content . '</td>
                                <td>' . $idpro . '</td>
                                <td>' . $iduser . '</td>
                                <td>' . $commentdate . '</td>
                                <td>
                                <a href="' . $xoabl . '" class="icon-button red"><i class="fas fa-trash-alt"></i> Delete</a>
                            </tr>';
                    }
                    ?>
                </table>
            </div>
            <div class="rowkhac mb10">
                <input type="button" value="Select All">
                <input type="button" value="Deselect All">
                <input type="button" value="Delete Selected Items">
            </div>
        </div>
    </div>
</div>