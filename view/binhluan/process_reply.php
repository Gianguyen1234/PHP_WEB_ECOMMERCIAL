<?php
include "../../model/pdo.php";
include "../../model/binhluan.php";
// header('Content-Type: application/json');
    if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
       
       $cmtid = $_POST['comment_id'];
       $userid = $_POST['user_id'];
       $rep_content = $_POST['reply_content'];
       date_default_timezone_set('Asia/Ho_Chi_Minh');
       $rep_date = date('Y-m-d H:i:s');
       $sql = "insert into reply(userid,cmtid,rep_content,rep_date) values('$userid','$cmtid','$rep_content','$rep_date')";
       pdo_execute($sql);
       $response = [
        'success' => true,
        'reply_content' => $rep_content,
        'created_at' => $rep_date // Thời gian hiện tại
        ];

    echo json_encode($response);
       

    }
?>