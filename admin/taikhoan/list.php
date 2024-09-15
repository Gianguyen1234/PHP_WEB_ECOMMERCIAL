<head>
    <link rel="stylesheet" href="internalcss/customlist.css">
</head>
<div class="main-container">
    <div class="row">
        <div class="row frmtitle">
            <H1>CUSTOMER LIST</H1>
        </div>
        <div class="rowkhac frmcontent">

            <div class="rowkhac mb10 frmdsloai">

                <table>
                    <tr>
                       <th></th>
                       <th>Type Code</th>
                       <th>Customer Name</th>
                       <th>Password</th>
                       <th>Email</th>
                       <th>Address</th>
                       <th>Phone</th>
                       <th>Role</th>
                       <th></th>
                    </tr>
                    <?php
                    $fetch_list_tk = fetch_list_taikhoan();
                    foreach ($fetch_list_tk as $listtk) {
                        //khai khac data tu bang danhmuc
                        extract($listtk);
                        // action sua va xoa danh muc
                        // $suatk="index.php?act=suatk&id=".$id;
                        $xoatk = "index.php?act=xoataikhoan&id=" . $id;
                        // <a href="'.$suatk.'"><input type="button" value="Sửa"></a> 

                        echo '<tr>
                                <td>
                                <input type="checkbox" name="" value="' . $id . '">
                                </td>
                                <td>' . $id . '</td>
                                <td>' . $name . '</td>
                                <td>' . $password . '</td>
                                <td>' . $email . '</td>
                                <td>' . $address . '</td>
                                <td>' . $telephone . '</td>
                                <td>' . $role . '</td>
                                <td>
                                <a href="' . $xoatk . '" class="icon-button red"><i class="fas fa-trash-alt"></i> Xóa</a>
                            </tr>';
                    }
                    ?>
                </table>

            </div>
            <div class="rowkhac mb10">
                <input type="button" value="Select All" onclick="selectAll()">
                <input type="button" value="Deselect All" onclick="deselectAll()">
                <input type="button" value="Delete Selected Items" name="delete" onclick="deleteSelected()">
                <a href="index.php?act=addtk"><input type="button" value="Add New"></a>
            </div>

        </div>
    </div>
</div>