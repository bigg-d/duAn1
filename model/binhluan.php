<?php
    function insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan){
        $sql = "insert into review (content, user_id, id_product, time) values('$noidung', '$iduser', '$idpro', '$ngaybinhluan')";
        pdo_execute($sql);
    }
    // function delete_binhluan($id){
    //     $sql = "delete from binhluan where id=". $id;
    //     pdo_query($sql);
    // }
    function loadall_binhluan($idpro){
        $sql = "select * from review where 1";
        if($idpro > 0) $sql.= " and  id_product = '$idpro'";
        $sql.= " order by id desc";
        $listbl=pdo_query($sql);
        return $listbl;
    }
    function delete_binhluan($id){
        $sql = "delete from review where id =". $id;
        pdo_query($sql);
    }
?>  