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
        $sql = "select * from sanpham where 1 order by view desc limit 10";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }
    function loadall_sanpham_related($iddm, $id){
        $sql = "select * from sanpham where iddm = '$iddm' and id <> '$id' order by view desc limit 0,5";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }
    function loadall_sanpham($kyw,$iddm){
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
    function loadone_sanpham($id){
        $sql = "select * from sanpham  where id =". $id;
        $sp = pdo_query_one($sql);
        return $sp;
    }
    function update_sanpham($id,$name, $price, $img, $mota,$iddm){
        if($img !== " "){
            echo 'okkk';
            echo $img;
           $sql = "update sanpham set name = '$name', price = '$price', img = '$img', description = '$mota', iddm = '$iddm' where id = '$id'";
            pdo_execute($sql);

        }else{

        }
        $sql = "update sanpham set name = '$name', price = '$price', description = '$mota', iddm = '$iddm' where id = '$id'";
        pdo_execute($sql);
    }
    function setview_sanpham($id, $view){
        $newview = $view + 1;
        $sql = "update sanpham set view = '$newview' where id= '$id'";
        pdo_query($sql);
    }

?>