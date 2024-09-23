<?php
    session_start();
    include "vendor/autoload.php";
    include "model/pdo.php";
    include "model/sanpham.php";
    include "model/danhmuc.php";
    include "model/taikhoan.php";
    include "model/cart.php";
    include "view/header.php";

 // Tăng số lượt truy cập
 if(isset($_SESSION['visits'])) {
    $_SESSION['visits'][date('Y-m-d')]++;
} else {
    $_SESSION['visits'][date('Y-m-d')] = 1;
}
    if(!isset($_SESSION['mycart'])) $_SESSION['mycart']=[];
    $num_items_in_cart = isset($_SESSION['mycart']) ? count($_SESSION['mycart']) : 0;
   
    $dsdm=fetch_list_danhmuc();
    $topsp=load_top_sanpham();
    
    

    if (isset($_GET['act'])) {
        $act=$_GET['act'];
        switch ($act) {
            case 'danhmucsp':
                $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : "";
                $iddm = (isset($_GET['iddm']) && $_GET['iddm'] > 0 ) ? $_GET['iddm'] : 0;
                // Pagination setup
                $limit = 8; // so sp cua 1 trang
                $page = isset($_GET['pages']) ? $_GET['pages'] : 1; 
                $dmsp = fetch_list_danhmucsanpham($keyword, $iddm, $page, $limit);
                $totalPages = getTotalPages($iddm, $limit);
                // echo 'Tổng số trang: ' . $totalPages;
                $tendm = load_ten_danhmuc($iddm);
                include "view/danhmucsp.php";       
                break;
                
            case 'sanphamct':
                if (isset($_GET['idsp'])&&($_GET['idsp'])>0) {
                    $id = $_GET['idsp'];
                    fetch_and_display_view($id);
                    $onesp = loadone_sanpham($id);
                    extract($onesp);
                    $sp_cungloai = load_sp_cungloai($id,$iddm);
                    $info = show_info_sp($iddm);
                    include "view/productdetail.php";
                }else {
                    include "view/alarm.php";
                }
                break;
            case 'dangki':
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['dangki'])) {
                    $username = $_POST['user'];
                    $email = $_POST['email'];
                    $password = $_POST['pass'];
                    insert_taikhoan($username,$password,$email);
                }
                include "view/taikhoan/dangki.php";
                break;
            
            case 'dangnhap':
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['dangnhap'])) {
                    $username = $_POST['user'];
                    $password = $_POST['pass'];
                    $checkuser =  checkuser($username,$password);
                    if (is_array($checkuser)) {
                        $_SESSION['user']=$checkuser;
                        header('Location: index.php');
                    }else {
                        $thongbao = "Invalid email or password. Please try again."; 
                    }                       
                 
                }
                include "view/taikhoan/dangnhap.php";
                break;
            case 'updatetk':
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['capnhat'])) {
                    $id = $_POST['id'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $telephone = $_POST['telephone'];
                    update_profile($id, $username, $password, $email, $address, $telephone);
                    $checkuser =  checkuser($username, $password);
                    $_SESSION['user'] = $checkuser;
                    header('Location: index.php?act=updatetk');
                }
                include "view/taikhoan/updatetk.php";
                break;
            case 'quenmatkhau':
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['guiemail'])) {
                    $email = $_POST['email'];
                    $sql = "select * from taikhoan where email= '".$email."'";
                    $check = pdo_query_one($sql);
                    if (is_array($check)) {
                        $token = bin2hex(random_bytes(16));
                        $token_hash = hash("sha256", $token);
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $expiry = date("Y-m-d H:i:s", time() + 60*30);
                        $sql = "update taikhoan set reset_token_hash= '".$token_hash."', reset_token_expires_at= '".$expiry."' where email= '".$email."'";
                        pdo_execute($sql);
                        $thongbao = "Kiểm tra Gmail và check link để đặt lại password";
                        sendPasswordResetLink($email,$token_hash);
                    }else{
                        $thongbao = "Email is invalid";
                    }

                }
                include "view/taikhoan/forgot_password.php";
                break;
            case 'updatepassword':
                $email = $_GET['email'];
                $token = $_GET['token'];
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['capnhatmk'])) {
                $new_password = $_POST['new_password'];
                $email = $_POST['email'];            
                update_password($new_password,$email);
                // exit;
                $thongbao = "Cập nhật mật khẩu (Password ) thành công!";
                } 
                
                include "view/taikhoan/reset_password.php";
                break;
            case 'thoat':
                session_unset();
                header('Location: index.php');
                break;
            case 'gioithieu':
                include "view/gioithieu.php";
                break;
            case 'addtocart':       
                if (isset($_POST['addtocart'])) {
                   
                    $id = $_POST['id'];
                    $images = $_POST['images'];
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $quantity = 1;
                    $spadd = [$id,$images,$name,$price,$quantity];
                
                    $index_in_cart = -1;
                    foreach($_SESSION['mycart'] as $index => $product) {
                      if ($product[0] === $id) {
                        $index_in_cart = $index;
                        break;
                      }
                    }

                    if ($index_in_cart === -1)
                    array_push($_SESSION['mycart'],$spadd);
                    else
                    {
                        $_SESSION['mycart'][$index_in_cart][4]++;
                    }

                }

                include "view/cart/viewcart.php";             
                break;
            case 'dlcart':
                if (isset($_GET['idcart'])) {
                    $idcart = $_GET['idcart'];
                    // Remove the item from the session cart array
                    unset($_SESSION['mycart'][$idcart]);
                    // Reindex the array
                    $_SESSION['mycart'] = array_values($_SESSION['mycart']);
                }else {
                    $_SESSION['mycart']=[];
                }
                header('Location: index.php?act=viewcart');
                break;
            case 'dlall':
           
                $_SESSION['mycart'] = [];
                header('Location: index.php?act=viewcart');
                break;
            case 'bill':
                include "view/cart/bill.php";
                break; 
            case 'viewcart':
                include "view/cart/viewcart.php";
                break;
                      
            case 'billconfirm':
                if(isset($_SESSION['user'])) $iduser = $_SESSION['user']['id']; 
                else $id=0;
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accept'])) {
                    $order_name = $_POST['name'];
                    $order_address = $_POST['address'];
                    $order_email = $_POST['email'];
                    $order_tel = $_POST['tel'];
                    $grandtotal = $_POST['grandtotal'];
                    $payment_method = $_POST['payment_method'];
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $order_date = date('D, d M Y H:i:s');
                   $idorder=insert_order_bill($iduser,$order_name,$order_address,$order_email,$order_tel,$grandtotal,$payment_method, $order_date);
                   
                    
                    $phiship = 15;
                    $sum_money = 0 +  $phiship;
                    for ($i = 0; $i < count($_SESSION['mycart']); $i++) {
                        
                        $image[$i] = $_SESSION['mycart'][$i][1];
                        $productName[$i] =  $_SESSION['mycart'][$i][2];
                        $id = $_SESSION['mycart'][$i][0];
                        $price = $_SESSION['mycart'][$i][3];
                        $quantity[$i] = isset($_COOKIE["quantity{$id}"]) ? $_COOKIE["quantity{$id}"] : $_SESSION['mycart'][$i][4];
                        $totalPrice[$i] = $quantity[$i] * $price;
                        
                        $sum_money += $totalPrice[$i];

                        insert_into_cart($_SESSION['user']['name'],$id,$image[$i],$productName[$i],$price,$quantity[$i],$totalPrice[$i],$sum_money,$idorder);
                        

                    }
                    $_SESSION['mycart']= [];
                    


                }
                $bill = loadone_order($idorder);
                $billct = loadall_cart($idorder);
                
               
                include "view/cart/billconfirm.php";
                break;
            case 'mybill':
                $listbill = load_all_bill_by_user($_SESSION['user']['id']);
                include "view/cart/bill_status.php";
                break;
            case 'checkout':
                if (isset($_SESSION['user'])) $iduser = $_SESSION['user']['id'];
                else $id = 0;
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accept'])) {
                    $order_name = $_POST['name'];
                    $order_address = $_POST['address'];
                    $order_email = $_POST['email'];
                    $order_tel = $_POST['tel'];
                    $grandtotal = $_POST['grandtotal'];
                    $payment_method = $_POST['payment_method'];
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $order_date = date('D, d M Y H:i:s');
                    // insert into order bill
                    $idorder = insert_order_bill($iduser, $order_name, $order_address, $order_email, $order_tel, $grandtotal, $payment_method, $order_date);
                    $phiship = 0;
                    $sum_money = 0 +  $phiship;
                    for ($i = 0; $i < count($_SESSION['mycart']); $i++) {
                        $image[$i] = $_SESSION['mycart'][$i][1];
                        $productName[$i] =  $_SESSION['mycart'][$i][2];
                        $id = $_SESSION['mycart'][$i][0];
                        $price = $_SESSION['mycart'][$i][3];
                        $quantity[$i] = isset($_COOKIE["quantity{$id}"]) ? $_COOKIE["quantity{$id}"] : $_SESSION['mycart'][$i][4];
                        $totalPrice[$i] = $quantity[$i] * $price;
                        $sum_money += $totalPrice[$i];
                        insert_into_cart($_SESSION['user']['name'], $id, $image[$i], $productName[$i], $price, $quantity[$i], $totalPrice[$i], $sum_money, $idorder);
                    }
                    $_SESSION['mycart'] = [];
                }
                $bill = loadone_order($idorder);
                $billct = loadall_cart($idorder);            
                include "view/cart/checkout.php";
                break;
            case 'hoidap':
                $admin_email = "thaianhvan2349@gmail.com";

                // Kiểm tra nếu dữ liệu từ form được gửi
                if (isset($_POST['sender_email']) && isset($_POST['message']) && isset($_POST['submit'])) {
                    $sender_email = $_POST['sender_email'];
                    $message = $_POST['message'];

                    // Tiến hành gửi email
                    $subject = "Tin nhắn từ $sender_email";
                    $headers = "From: $sender_email";

                    // Gửi email và kiểm tra kết quả
                    if (mail($admin_email, $subject, $message, $headers)) {
                        // Chuyển hướng người dùng sau khi gửi email thành công
                        header('Location: http://localhost/client(webbanhang)/index.php?act=hoidap');
                        exit(); // Dừng script
                    } else {
                        // Xử lý khi không thể gửi email
                        echo "Gửi email thất bại. Vui lòng thử lại.";
                    }
                }

                include "view/hoidap/contact_form.php";
                break;


            default:
                include "view/home.php";
                break;
        }
    }else{
        include "view/home.php";
    }
         
    include "view/footer.php";
?>