<style>
 .comment {
  position: relative;
  padding: 10px;
  border: 1px solid #ccc;
  margin-bottom: 10px;
}

.comment-date {
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 14px;
  font-weight: bold;
  color: black;
}
textarea {
   width: 97%;
   padding: 15px;
   border: 2px solid #ccc;
   border-radius: 10px;
   resize: vertical;
 }
   
.comment .button-group {
    margin-top: 5px; 
}

.comment .like-btn,
.comment .reply-btn {
    display: inline-block;
    margin-right: 10px; 
   
}

.comment .reply-btn i {
    margin-right: 5px; 
}

.comment .like-btn {
    background-color: transparent;
    border: none;
    color: #007bff;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
}

.comment .reply-btn {
    background-color: transparent;
    border: none;
    color: #007bff;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
}

.comment .reply-btn:hover {
    background-color: #e9ecef;
}

.like-btn i {
  margin-right: 5px;
}

.like-btn:hover {
  color: #0056b3;
}
.replies {
    margin-left: 65px;
    margin-top: 20px;
}

.reply {
    border-bottom: none;
    padding-bottom: 0;
}

.reply .user-avatar {
    width: 40px;
    height: 40px;
}

.reply-form {
    margin-top: 20px;
    margin-left: 65px;
}

.reply-form textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    resize: vertical;
}

.reply-form button {
    background-color: #3b5998;
    color: white;
    border: none;
    padding: 10px 15px;
    margin-top: 10px;
    border-radius: 4px;
    cursor: pointer;
}

.reply-form button:hover {
    background-color: #2d4373;
}

</style>
<?php
    session_start();
    include "../../model/pdo.php";
    include "../../model/binhluan.php";
    $idpro = $_REQUEST['idpro'];
    $listbinhluan = fetch_all_comment($idpro);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bình Luận</title>
    <link rel="stylesheet" href="../css/cmt.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<div class="border-under-dt">
    <h1><i class="fa fa-comment" aria-hidden="true"></i> Comment</h1>
</div>

<div class="comment-container">
    <?php
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (isset($_SESSION['user'])) {
            // Nếu đã đăng nhập, hiển thị form bình luận
            echo '<form class="comment" action="'.$_SERVER['PHP_SELF'].'" method="post">
                    <div class="user-image">
                        <img src="avatar.png" alt="Your Image">
                    </div>
                    <div class="comment-content">
                        <input type="hidden" name="idpro" value="'.$idpro.'">
                        <div class="textarea-wrapper">                           
                            <textarea name="comment" rows="3" placeholder="Write your comment here..."></textarea>
                            <i class="bx bx-image-add" id="upload-icon"></i> 
                            <input type="hidden" id="image-url" name="image-url">
                            <input type="file" id="image-upload" name="image" style="display: none;" accept="image/*">
                        </div>
                        <input type="submit" value="Gửi" name="guibinhluan">
                    </div>
                </form>';
        } else {
            // Nếu chưa đăng nhập, hiển thị thông báo và nút đăng nhập
            echo '<div class="login-message">Please <a href="index.php?act=dangnhap">Login</a> to use the comment feature!</div>';

        }
    ?>

    <?php
        // Hiển thị danh sách bình luận
        foreach ($listbinhluan as $listbinhluan) {
            extract($listbinhluan);
            echo '<div class="comment">
                    <div class="user-image">
                        <img src="avatar.png" alt="User 1">
                    </div>
                    <div class="comment-content">
                        <p class="comment-author">'.$iduser.'</p>
                        <p class="comment-text">'.$content.'</p>';

            if (!empty($images)) {
            echo '<img src="' . $images . '">';
            }
            echo '
            <div class="button-group">
            <button type="submit" class="like-btn" data-comment-id="'.$id.'" >
            <i class="fa fa-thumbs-up"></i> Like (<span class="like-count">'.$user_likes.'</span>)</button>
            <button class="reply-btn"><i class="fa-solid fa-reply"></i> Reply</button>
            <p class="comment-date">'.$commentdate.'</p>
            </div>';
            $rep = fetch_reply($id);
            if (!empty($rep)) {
                foreach ($rep as $reply) {
                    extract($reply);
                echo
                '<div class="replies">
                <div class="comment reply">
                <img src="https://via.placeholder.com/40" alt="User Avatar" class="user-avatar">
                <div class="comment-content">
                <h3 class="user-name">'.$username.'</h3>
                <p class="comment-text">'.$rep_content.'</p>
                <div class="comment-actions">
                <button class="like-btn">Like</button>
                <button class="reply-btn">Reply</button>
                <span class="comment-date">'.$rep_date.'</span>
                </div>
                </div>
                </div>
                </div>
                ';
                }
            }
            else {
                echo "<p>Không có phản hồi nào.</p>";
            }
    
            if (isset($_SESSION['user']['id'])) {
                $user_id = $_SESSION['user']['id'];
                // Form reply (ẩn đi ban đầu)
                echo '
                <form class="reply-form" style="display: none;" action="view/binhluan/process_comment.php" method="post" onsubmit="submitForm(event)">
                <input type="hidden" name="comment_id" value="'.$id.'">
                <input type="hidden" name="user_id" value="'.$user_id.'">
                <textarea name="reply_content" rows="1" placeholder="Reply to this comment..."></textarea>
                <input type="submit" value="Reply" name="submit_reply" onclick="submitReply(this)">
                </form>
                ';
            }else{
                echo 'user chua login';
            }
    

            echo
            '</div>
            </div>';
    }
    ?>

    <?php
        // Xử lý khi người dùng gửi bình luận
        if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan']!="") ) {
            $content = $_POST['comment'];
            $idpro = $_POST['idpro'];
            $imageUrl = $_POST['image-url'];
            $iduser = $_SESSION['user']['name'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $commentdate = date('D, d M Y H:i:s');
            insert_binhluan($content, $idpro, $iduser, $commentdate,$imageUrl);
            header("Location: ".$_SERVER['HTTP_REFERER']);
            // header("Location: index.php?act=sanphamct&idsp= ". $idpro);
        }
    ?>
</div>
</body>
<script>
    document.getElementById('upload-icon').addEventListener('click', function() {
    document.getElementById('image-upload').click();
});

document.getElementById('image-upload').addEventListener('change', function() {
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            // Tạo hình ảnh từ URL được đọc và thêm vào form hoặc hiển thị xem trước
            var img = document.createElement('img');
            img.src = e.target.result;
            img.style.maxWidth = '100px';
            img.style.marginTop = '10px';
            document.querySelector('.comment-content').appendChild(img);
            document.getElementById('image-url').value = e.target.result; // Lưu URL hình ảnh vào input ẩn
        }
        reader.readAsDataURL(this.files[0]);
    }
});

// Sự kiện click vào nút "Reply"
document.querySelectorAll('.reply-btn').forEach(function(button) {
    button.addEventListener('click', function() {
        var replyForm = this.closest('.comment').querySelector('.reply-form');
        replyForm.style.display = replyForm.style.display === 'none' ? 'block' : 'none';
    });
});
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('.like-btn').click(function(){
        var commentId = $(this).data('comment-id');
        var likeCountElement = $(this).find('.like-count');
        $.ajax({
            url: 'view/binhluan/like_comment.php',
            type: 'POST',
            data: { comment_id: commentId },
            success: function(response){
                if(response.success){
                    var newLikeCount = response.new_like_count;
                    likeCountElement.text(newLikeCount);
                } else {
                    // alert('Failed to like the comment. Please try again.');
                    location.reload();
                   
                }
            }
        });
    });
});
$(document).ready(function(){
    $('.reply-form').on('submit', function(event){
        event.preventDefault(); // Ngăn chặn hành vi mặc định của form
        
        var form = $(this);
        var formData = form.serialize();
        
        $.ajax({
            url: 'view/binhluan/process_reply.php', // Cập nhật URL cho đúng
            method: 'POST',
            data: formData,
            success: function(response){
                if(response.success){
                    var newReply = '<div class="reply">' +
                                   '<p>' + response.reply_content + '</p>' +
                                   '<small>at ' + response.created_at + '</small>' +
                                   '</div>';
                    form.before(newReply);
                    form.find('textarea').val(''); // Clear textarea
                } else {
                    location.reload();
                  
                }
            },
            error: function(){
                alert('There was an error processing your reply. Please try again.');
            }
        });
    });
});

</script>
</html>
