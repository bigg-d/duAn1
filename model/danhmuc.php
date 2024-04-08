<?php
    function insert_danhmuc($tenloai){
        $sql = "insert into danhmuc (tendanhmuc) values('$tenloai')";
        pdo_execute($sql);
    }
    function delete_danhmuc($id){
        $sql = "update danhmuc set trangthai = 0 where iddm =". $id;
        pdo_query($sql);
    }
    function loadall_danhmuc($tendanhmuc){
        $sql = "select * from danhmuc" ;
        if($tendanhmuc !== ''){
            $sql.=" WHERE tendanhmuc LIKE '%" . $tendanhmuc . "%'";
        }
        $sql.=" order by iddm desc";
        $listdanhmuc = pdo_query($sql);
        return $listdanhmuc;
    }
    function loadone_danhmuc($id){
        $sql = "select * from danhmuc  where iddm =". $id;
        $dm = pdo_query_one($sql);
        return $dm;
    }
    function update_danhmuc($id, $tenloai){
        $sql = "update danhmuc set tendanhmuc = '$tenloai' where iddm = '$id'";
        pdo_execute($sql);
    }

?>