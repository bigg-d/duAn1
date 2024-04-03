<?php
    function insert_sanpham($name, $price, $img, $images, $mota,$iddm){
        $sql = "insert into sanpham (name, price, img, images, mota, iddm) values('$name', '$price', '$img', '$images', '$mota','$iddm' )";
        pdo_execute($sql);
    }
    function delete_sanpham($id){
        $sql = "delete from sanpham  where id =". $id;
        pdo_query($sql);
    }
    function loadall_sanpham_home(){
        $sql = "select * from sanpham where 1 order by view desc limit 16";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }
    function loadall_sanpham_related($iddm, $id){
        $sql = "select * from sanpham where iddm = '$iddm' and id <> '$id' order by view desc limit 1,6";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }
    function loadall_sanpham_popular(){
        $sql = "select * from sanpham order by view desc limit 3";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }
    // function loadall_sanpham($kyw,$iddm, $items_per_page, $current_page ){
    //     $sql = "select * from sanpham where 1";
    //     if($kyw != ""){
    //         $sql.= " and name like '%". $kyw. "%'";
    //     }
    //     if($iddm > 0){
    //         $sql.= " and iddm = ".$iddm;
    //         $_SESSION['currentCategoryId'] = $iddm;
    //     }
    //     $offset = ($current_page - 1) * $items_per_page;
    //     $sql.= " order by id desc limit ".  $items_per_page  ." offset ".$offset ;
    //     $listsanpham = pdo_query($sql);
    //     return $listsanpham;
    // }
    function loadall_sanpham($kyw,$iddm, $minPrice = 0, $maxPrice){
        $sql = "select * from sanpham where 1";
        if($kyw != ""){
            $sql.= " and LOWER(CONVERT(name USING utf8mb4)) REGEXP LOWER(CONVERT('$kyw' USING utf8mb4))";
        }
        if($iddm > 0){
            $sql.= " and iddm = ".$iddm;
        }
        if($minPrice !== '' && $maxPrice !== '') {
            $min = intval($minPrice);
            $max = intval($maxPrice);
            $sql .=" and price between '$min' AND '$max'";
        }
        $sql.= " order by id desc";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }
    function loadall_sanpham_shop($kyw,$iddm,$page=1){
        $sql = "select * from sanpham where 1";
        if($kyw != ""){
            $sql.= " and name like '%". $kyw. "%'";
        }
        if($iddm > 0){
            $sql.= " and iddm = ".$iddm;
        }
        $sql.= " order by id desc";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }

    function tong_sanpham($iddm = null ){
        $sql= "SELECT COUNT(*) FROM sanpham where 1";
        if($iddm !== null){
            $sql .= " and iddm = " . $iddm;
        };
        $count = pdo_query($sql);
        return $count;
    }
    function loadone_sanpham($id){
        $sql = "select * from sanpham  where id =". $id;
        $sp = pdo_query_one($sql);
        return $sp;
    }
    function update_sanpham($id,$name, $price, $img, $images, $mota,$iddm){
        if($img !== " "){
            
           $sql = "update sanpham set name = '$name', price = '$price', img = '$img', images = '$images', mota = '$mota', iddm = '$iddm' where id = '$id'";
            pdo_execute($sql);

        }else{

        }
        $sql = "update sanpham set name = '$name', price = '$price', images = '$images', mota = '$mota', iddm = '$iddm' where id = '$id'";
        pdo_execute($sql);
    }
    function setview_sanpham($id, $view){
        $newview = $view + 1;
        $sql = "update sanpham set view = '$newview' where id= '$id'";
        pdo_query($sql);
    }
    function get_stock_quantity($id){
        $sql = "select stock_quantity from sanpham where id = '$id'";
        $stock_quantity = pdo_query_one($sql);
        return $stock_quantity;
    }

?>