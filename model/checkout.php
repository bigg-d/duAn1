<?php
    function insert_bill($userId,$name, $email, $phone, $address, $payment_method, $date, $total, $shipping_fee){
        if(isset($payment_method)){
            $payment_method = ($payment_method == 'cash') ? 1 : 2;
            $sql = "insert into orders (customer_id, recipient_name, recipient_email, recipient_phone, recipient_address, payment_method, order_date, total_amount,shipping_fee) 
            values('$userId','$name', '$email', '$phone', '$address', '$payment_method', '$date','$total','$shipping_fee')"; 
            $orderId = pdo_executeId($sql);
            return $orderId;
        } else{
            $sql = "insert into orders (customer_id, recipient_name, recipient_email, recipient_phone, recipient_address, payment_method, order_date, total_amount,shipping_fee) 
            values('$userId','$name', '$email', '$phone', '$address', '$date','$total', '$shipping_fee')";
            $orderId = pdo_executeId($sql);
            return $orderId;
        }
    }
    function loadall_bill_admin($email){
        $sql = "select * from orders";
        if($email !== ''){
            $sql.=" where recipient_email = '$email'";
        }
        $orders = pdo_query($sql);
        return $orders;
    }
    function loadall_bill($customerId){
        $sql = "select * from orders";
        if($customerId !== ''){
            $sql.=" where customer_id = '$customerId'";
        }
        $orders = pdo_query($sql);
        return $orders;
    }
    function update_bill($orderId, $process){
        $sql = "UPDATE orders set process = '$process' where order_id = '$orderId'";
        pdo_execute($sql);
    }
    function loadone_bill($orderId){
        $sql = "select * from orders where order_id = '$orderId'";
        $order = pdo_query($sql);
        return $order;
    
    }
    function insert_detail_bill($orderId,$productId, $quantity){
        $sql = "insert into orders_detail (order_id,product_id, quantity) values('$orderId', '$productId','$quantity')"; 
        pdo_execute($sql);
    }
    function loadall_detail_bill($orderId){
        $sql = "select * from orders_detail where order_id = '$orderId'";
        $products = pdo_query($sql);
        return $products;
    }
    function countItemInOrder($orderId){
        $sql = "SELECT order_id, SUM(quantity) AS TotalQuantity
        FROM orders_detail
        WHERE order_id = '$orderId'
        GROUP BY order_id";
        $result = pdo_query($sql);
        return $result;
    }

    function getStatus($id){
    switch ($id) {
        case 0:
            $status = "Đơn hàng mới"  ;
            break;
        case 1:
            $status = "Đang xử lý"  ;
            break;
        case 2:
            $status = "Đang giao hàng" ;
            break;
        case 3:
            $status = "Đã giao hàng" ;
            break;
        case 4 :
            $status = "Đã hủy đơn hàng" ;
            break;
        case 5:
            $status = "Đã hủy đơn hàng (Khách hàng)" ;
            break;
        case 6 :
            $status = "Đã nhận đơn hàng (Khách hàng)" ;
            break;

        default:
            $status = "Đơn hàng mới";
            break;
    }
    return $status;
}

?>