<?php
    function loadall_thongke(){
        $sql = "SELECT categories.category_id AS madm, categories.category_name AS tendm, COUNT(products.id) AS countsp, MIN(products.price) AS minprice, MAX(products.price) AS maxprice, AVG(products.price) AS avgprice ";
        $sql .= "FROM products LEFT JOIN categories ON categories.category_id = products.category_id ";
        $sql .= "GROUP BY categories.category_id ORDER BY categories.category_id DESC";
        $listtk = pdo_query($sql);
        return $listtk;
    }
?>