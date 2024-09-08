<?php
    // them bill vao order table
    function insert_order_bill($iduser,$bill_name,$bill_address,$bill_email,$bill_tel,$grandtotal,$payment_method, $bill_date){
        $sql="insert into bill(idcustomer,bill_name,bill_address,bill_email,bill_tel,grandtotal,payment_method,bill_date) values('$iduser','$bill_name','$bill_address','$bill_email','$bill_tel','$grandtotal','$payment_method', '$bill_date')";
        $lasidbill = pdo_execute_return_last_id($sql);
        return $lasidbill;
       
    }
    function insert_into_cart($username,$idpro,$image,$productname,$price,$quantity,$totalprice,$grandtotal,$idorder){
        $sql="insert into cart(username,idpro,image,name,price,quantity,totalprice,grandtotal,id_order) values('$username','$idpro','$image','$productname','$price','$quantity','$totalprice','$grandtotal','$idorder')";
        pdo_execute($sql);
    }
    function loadone_order($id){
        $sql = "select * from bill where id=" . $id;
        $bill=pdo_query_one($sql);
        return $bill;
    }
    function loadall_cart($idorder){
        $sql = "select * from cart where id_order=" . $idorder;
        $bill=pdo_query($sql);
        return $bill;
    }
    function load_all_bill_by_user($iduser){
        $sql = "select * from bill where idcustomer=" . $iduser;
        $listbill=pdo_query($sql);
        return $listbill;

    }
    function load_all_bill(){
        $sql = "select * from bill order by id desc";
        $listbill=pdo_query($sql);
        return $listbill;
    }
    function get_ttdh($n){
        switch ($n) {
            case '0':
                $tt = "Đơn hàng mới";
                break;
            case '1':
                $tt = "Đang giao hàng";
                break;
            case '2':
                $tt = "Hoàn tất";
                break;
            default:
                $tt = "Đơn hàng mới";
                break;
        }
        return $tt;
    }
    function count_total_quantity($idorder){
        $sql = "SELECT SUM(quantity) AS total_quantity FROM cart WHERE id_order=" . $idorder;
        $bill=pdo_query_value($sql);
        return $bill;
    }
    function load_tkdm(){
        $sql = "select danhmuc.id as madm, danhmuc.name as tendm, count(sanpham.id) as countdmsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice";
        $sql.= " from sanpham left join danhmuc on danhmuc.id=sanpham.iddm";
        $sql.= " group by danhmuc.id order by danhmuc.id desc";
        $list_tkdm = pdo_query($sql);
        return $list_tkdm;
    }
    function load_tkdt(){    
    $sql = "select bill.id as mabill, sum(bill.grandtotal) as totalrevenue from bill group by bill.id order by bill.id desc limit 10";
    $list_tkdt = pdo_query($sql);
    return $list_tkdt;
    }
    function update_ttdh($id,$billstatus){
        $sql = "update bill set bill_status = $billstatus where id = $id";
        pdo_execute($sql);
    }
    function insert_total_amount($stripe_session_id, $total_amount_dollars) {
        $sql = "INSERT INTO payments (stripe_session_id, total_amount) VALUES ('$stripe_session_id', '$total_amount_dollars')";
        pdo_execute($sql);
    }
    
    function fetch_recent_payment() {
        $sql = "SELECT total_amount FROM payments ORDER BY id DESC LIMIT 1";
        $result = pdo_query($sql);
        if (!empty($result)) {
            return $result[0]['total_amount'];
        }
        return null;
    }
   

?>