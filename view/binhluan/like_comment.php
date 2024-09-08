<?php
 include "../../model/pdo.php";
 include "../../model/binhluan.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comment_id'])) {
    $comment_id = $_POST['comment_id'];
    // Lấy số lượng like hiện tại
    $query = "select user_likes from binhluan where id = $comment_id";
    $current_likes = pdo_query_one($query);
    if ($current_likes) {
        $current_likes_value = (int)$current_likes['user_likes']; // Ép kiểu về số nguyên
    } else {
        $current_likes_value = 0; // Nếu không tìm thấy bản ghi, thiết lập số like là 0
    }

    // Tăng số lượng like lên 1
    $new_likes = $current_likes_value + 1;
    $sql = "update binhluan set user_likes = $new_likes where id = $comment_id";
    pdo_execute($sql);
    echo json_encode(['success' => true, 'new_like_count' => $new_likes]);
   
   
}
?>
