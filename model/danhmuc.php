<?php
    function insert_danhmuc($tenloai){
        $sql = "insert into categories (category_name) values('$tenloai')";
        pdo_execute($sql);
    }
    function delete_danhmuc($id){
        $sql = "delete from categories  where category_id =". $id;
        pdo_query($sql);
    }
    function loadall_danhmuc(){
        $sql = "select * from categories order by category_id desc";
        $listdanhmuc = pdo_query($sql);
        return $listdanhmuc;
    }
    function loadone_danhmuc($id){
        $sql = "select * from categories  where category_id =". $id;
        $dm = pdo_query_one($sql);
        return $dm;
    }
    function update_danhmuc($id, $tenloai){
        $sql = "update categories set category_name = '$tenloai' where category_id = '$id'";
        pdo_execute($sql);
    }

?>