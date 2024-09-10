<?php 
    function insert_taikhoan($tendk,$matkhau,$email){
        $sql="insert into taikhoan(name,password,email) values('$tendk','$matkhau','$email')";
        pdo_execute($sql);
    }
    function checkuser($username,$password){
        $sql="select * from taikhoan where name='".$username."' AND password='".$password."' ";
        $tk = pdo_query_one($sql);
        return $tk;
    }
    function update_profile($id, $username, $password, $email, $address, $telephone){
        $sql="update taikhoan set name='".$username."', password='".$password."', email='".$email."', address='".$address."', telephone='".$telephone."'  where id=".$id;
        pdo_execute($sql);
    }
    function fetch_list_taikhoan(){
        $sql="select * from taikhoan order by id desc";
        // show list tk
        $listtaikhoan=pdo_query($sql);
        return $listtaikhoan;
    }
    function update_password($password,$email){
        $sql = "update taikhoan set password= '".$password."', reset_token_expires_at=null, reset_token_hash=null where email= '".$email."'";
        pdo_execute($sql);
    }
     // Send a link with access token to the user
    function sendPasswordResetLink($email, $token) {
        $reset_link = "http://localhost/client(webbanhang)/index.php?act=updatepassword&token=$token&email=$email";
        $subject = "Password Reset Link";
        $message = "Click the following link to reset your password: $reset_link";
        $headers = "From: thaianhvan2349@gmail.com"; 
        // Send email
        if (mail($email, $subject, $message, $headers)) {
        echo "Email sent successfully!";
        } else {
        echo "Failed to send email.";
        }
    }

    function update_token($token_hash,$expiry,$email){
        $sql = "update taikhoan set reset_token_hash= '".$token_hash."', reset_token_expires_at= '".$expiry."' where email= '".$email."'";
        pdo_execute($sql);
    }

    function add_taikhoan($tendk, $matkhau,$email,$vaitro){
        $sql="insert into taikhoan(name,password,email,role) values('$tendk','$matkhau','$email','$vaitro')";
        pdo_execute($sql);
    }
    
    function delete_taikhoan($id){
        $sql="delete from taikhoan where id=".$id;
        pdo_execute($sql);
    }
   

?>