<?php
    function loadall_cart(){
        $sql = "select * from cart";
        $listcart = pdo_query($sql);
        return $listcart;
    }
    function insert_cart($user_id, $created_at){
        $sql = "INSERT INTO cart(user_id, created_at) VALUES ('$user_id','$created_at')";
        $cart_id = pdo_executeId($sql);
        return $cart_id;
    }
    function update_cart($cart_id,$date){
        $sql = "UPDATE cart SET created_at = '$date' WHERE id = '$cart_id'";
        pdo_execute($sql);
    }
    function get_cartId($id){
        $sql ="select id from cart where user_id = '$id'";
        $cartId = pdo_query($sql);
        return $cartId;
    }

    function insert_cartItem($cart_id, $product_id,$product_name, $product_img, $product_price, $quantity, $total_price){
        $sql = "INSERT INTO cart_item(cart_id, product_id, product_name, product_img, product_price, quantity, total_price) VALUES ('$cart_id', '$product_id','$product_name', '$product_img', '$product_price', '$quantity', '$total_price')";
        pdo_execute($sql);
    }
    
    function loadall_thongke(){
        $sql = "SELECT categories.category_id AS madm, categories.category_name AS tendm, COUNT(products.id) AS countsp, MIN(products.price) AS minprice, MAX(products.price) AS maxprice, AVG(products.price) AS avgprice ";
        $sql .= "FROM products LEFT JOIN categories ON categories.category_id = products.category_id ";
        $sql .= "GROUP BY categories.category_id ORDER BY categories.category_id DESC";
        $listtk = pdo_query($sql);
        return $listtk;
    }
    
?>