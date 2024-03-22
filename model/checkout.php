<?php
    function insert_bill($userId,$name, $email, $phone, $address, $payment_method, $date, $total){
        if(isset($payment_method)){
            $payment_method = ($payment_method == 'cash') ? 1 : 2;
            $sql = "insert into orders (customer_id, recipient_name, recipient_email, recipient_phone, recipient_address, payment_method, order_date, total_amount) 
            values('$userId','$name', '$email', '$phone', '$address', '$payment_method', '$date','$total')"; 
            $orderId = pdo_executeId($sql);
            return $orderId;
        } else{
            $sql = "insert into orders (customer_id, recipient_name, recipient_email, recipient_phone, recipient_address, payment_method, order_date, total_amount) 
            values('$userId','$name', '$email', '$phone', '$address', '$date','$total')";
            $orderId = pdo_executeId($sql);
            return $orderId;
        }
    }
    function loadall_bill(){
        $sql = "select * from orders";
        $orders = pdo_query($sql);
        return $orders;
    }
    function insert_detail_bill($orderId,$productId, $quantity){
        $sql = "insert into orders_detail (order_id,product_id, quantity) values('$orderId', '$productId','$quantity')"; 
        pdo_execute($sql);
    }

?>