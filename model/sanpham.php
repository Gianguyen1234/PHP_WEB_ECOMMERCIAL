<?php 
    function insert_sanpham($name_sp,$price_sp,$file_name,$descript_sp,$iddm,$file_names,$info){
        $sql="insert into sanpham(name,price,image,description,iddm,file_names,info) values('$name_sp','$price_sp','$file_name','$descript_sp','$iddm','$file_names','$info')";
        pdo_execute($sql);
    }
    function delete_sanpham($id,$idpro){   
        $sql = "delete from cart where idpro=".$idpro;
        pdo_execute($sql);
    
        $sql="delete from sanpham where id=".$id;
        pdo_execute($sql);
    }
    function fetch_list_sanpham($keyword,$iddm){
        $sql="select * from sanpham where 1";
        if ($keyword!="") {
           $sql.=" and name like'%".$keyword."%'";
        }
        if ($iddm>0) {
            $sql.=" and iddm ='".$iddm."'";
        }
        $sql.=" order by id desc";
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
    
    function loadone_sanpham($id){
        $sql = "select * from sanpham where id=".$id;
        $sanpham=pdo_query_one($sql);
        return $sanpham;
    }
    function load_sp_cungloai($id,$iddm){
        $sql="select * from sanpham where iddm=".$iddm." AND id <> ".$id;
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
    function update_sanpham($id, $iddm, $name_sp, $price_sp, $descript_sp, $file_name){
        if ($file_name!="") {
            $sql="update sanpham set iddm='$iddm', name='$name_sp', price='$price_sp', image='$file_name', description='$descript_sp' where id= '$id'";
        }else {
            $sql="update sanpham set iddm='$iddm', name='$name_sp', price='$price_sp', description='$descript_sp' where id= '$id'";
        }
        
        pdo_execute($sql);

    }
    // new product release
    function load_sanpham_home(){
        // gioi han chi co 9 sp moi nhat hien len
        $sql="select * from sanpham where 1 order by id desc limit 0,10 ";
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
    //top products with high view
    function load_top_sanpham(){
        $sql="select * from sanpham where 1 order by view desc limit 8";
        $topsp=pdo_query($sql);
        return $topsp;
    }

    function load_ten_danhmuc($iddm){
        if ($iddm>0) {
            $sql = "select * from danhmuc where id=".$iddm;
            $dm = pdo_query_one($sql);
            extract($dm);
            return $name;
        }else {
            return "";
        }

    }
    // Function fetch_list_danhmucsanpham với tham số phân trang
    function fetch_list_danhmucsanpham($keyword, $iddm, $page, $limit) {
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM sanpham WHERE 1";
        if ($keyword != "") {
            $sql .= " AND name LIKE '%" . $keyword . "%'";
        }
        if ($iddm > 0) {
            $sql .= " AND iddm ='" . $iddm . "'";
        }
            $sql .= " ORDER BY id  LIMIT $limit OFFSET $offset";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
        
    }

    // implement pagination for product in menu
    function getTotalPages($iddm, $limit) {
        $sql = 'SELECT COUNT(*) as total FROM sanpham WHERE iddm = ?';  
        $result = pdo_query($sql, $iddm);   
        if (isset($result[0]['total'])) {
            $totalTruyen = $result[0]['total'];
        } else {
            $totalTruyen = 0;
        }
        $totalPages = ceil($totalTruyen / $limit);
        return $totalPages;
    }
    
    // update the user click on product
    function fetch_and_display_view($id){
        $sql_update = "UPDATE sanpham SET view = view + 1 WHERE id = $id";
        pdo_execute($sql_update);

    }
    
    function insert_history($userid,$idproduct,$productname){
        $sql = "insert into user_product_history (user_id,product_id,product_name) values ('$userid','$idproduct','$productname')";
        pdo_execute($sql);
    }
    function show_history($userid){
        $sql = "select product_name from user_product_history where user_id = '".$userid."' order by id desc limit 0,10";
        $history = pdo_query($sql);
        return $history;

    }
    // show product relative images
    function show_file_names($idpro){
        $sql = "select file_names from sanpham where id = $idpro";
        $result = pdo_query($sql);    
        if (!empty($result)) {
            // Chuyển chuỗi thành mảng các tên file
            return explode(',', $result[0]['file_names']); 
        } else {
            // Trả về mảng rỗng nếu không có dữ liệu
            return []; 
        }
    }
    function show_info_sp($id){
        $sql = "select info from sanpham where id = $id";
        $sp = pdo_query_one($sql);
        return $sp;
    }
   
   
   
   
   
   

   

?>


