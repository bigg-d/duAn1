<?php
    function insert_sanpham($tensp, $giasp, $filename, $mota,$iddm){
        $sql = "insert into products (name, price, img, description, category_id) values('$tensp', '$giasp', '$filename', '$mota','$iddm' )";
        pdo_execute($sql);
    }
    function delete_sanpham($id){
        $sql = "delete from products  where id =". $id;
        pdo_query($sql);
    }
    function loadall_sanpham_home(){
        $sql = "select * from products where 1 order by view desc limit 10";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }
    function loadall_sanpham_related($category_id, $id){
        $sql = "select * from products where category_id = '$category_id' and id <> '$id' order by view desc limit 0,5";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }
    function loadall_sanpham($kyw,$iddm){
        $sql = "select * from products where 1";
        if($kyw != ""){
            $sql.= " and name like '%". $kyw. "%'";
        }
        if($iddm > 0){
            $sql.= " and category_id = ".$iddm;
        }
        $sql.= " order by id desc";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }
    function loadone_sanpham($id){
        $sql = "select * from products  where id =". $id;
        $sp = pdo_query_one($sql);
        return $sp;
    }
    function update_sanpham($id,$tensp, $giasp, $filename, $mota,$iddm){
        if($filename !== " "){
            echo 'okkk';
            echo $filename;
           $sql = "update products set name = '$tensp', price = '$giasp', img = '$filename', description = '$mota', category_id = '$iddm' where id = '$id'";
            pdo_execute($sql);

        }else{

        }
        $sql = "update products set name = '$tensp', price = '$giasp', description = '$mota', category_id = '$iddm' where id = '$id'";
        pdo_execute($sql);
    }
    function setview_sanpham($id, $view){
        $newview = $view + 1;
        $sql = "update products set view = '$newview' where id= '$id'";
        pdo_query($sql);
    }

?>