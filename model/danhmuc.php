<?php
    // chuyen logic vs database sang model de easy chinh sua

    function insert_danhmuc($tenloai){
        $sql="insert into danhmuc(name) values('$tenloai')";
        pdo_execute($sql);
    }
    function delete_danhmuc($id){
        $sql="delete from danhmuc where id=".$id;
        pdo_execute($sql);
    }
    function fetch_list_danhmuc(){
        $sql="select * from danhmuc order by id desc";
        // show list danh muc
        $listdanhmuc=pdo_query($sql);
        return $listdanhmuc;
    }
    // sua danh muc 
    function loadone($id){
        $sql = "select * from danhmuc where id=" . $id;
        $dm=pdo_query_one($sql);
        return $dm;
    }
    function update_danhmuc($id, $updatetenloai){
        $sql="update danhmuc set name='".$updatetenloai."' where id=".$id;
        pdo_execute($sql);

    }
    

?>