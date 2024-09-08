<?php
    function insert_binhluan($content, $idpro, $iduser, $commentdate,$imagesUrl){
        $sql="insert into binhluan(content,idpro,iduser,commentdate,images) values('$content', '$idpro', '$iduser', '$commentdate','$imagesUrl')";
        pdo_execute($sql);
    }
    function fetch_all_comment($idpro){
        $sql = "select * from binhluan where idpro='".$idpro."' order by id desc";
        $listbinhluan=pdo_query($sql);
        return $listbinhluan;
    }
    function fetch_list_binhluan(){
        $sql="select * from binhluan order by id desc";
        // show list danh muc
        $listbinhluan=pdo_query($sql);
        return $listbinhluan;
    }
    function delete_id_bl($id){
        $sql="delete from binhluan where id=".$id;
        pdo_execute($sql);
    }
    function add_reply($userid,$cmtid,$rep_content,$rep_date){
        $sql = "insert into reply(userid,cmtid,rep_content,rep_date) values('$userid','$cmtid','$rep_content','$rep_date')";
        pdo_execute($sql);
    }
    function fetch_reply($cmtid){
        $sql = "SELECT r.*, u.name as username 
            FROM reply r 
            JOIN taikhoan u ON r.userid = u.id 
            WHERE r.cmtid = $cmtid
            ORDER BY r.rep_date ASC";
        $traloi = pdo_query($sql);
        return $traloi;
    }
?>