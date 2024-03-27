<?php
    function insert_binhluan($title,$noidung, $iduser, $idpro, $ngaybinhluan){
        $sql = "insert into binhluan (title,noidung, iduser, idproduct, ngaybinhluan) values('$title','$noidung', '$iduser', '$idpro', '$ngaybinhluan')";
        pdo_execute($sql);
    }
    // function delete_binhluan($id){
    //     $sql = "delete from binhluan where id=". $id;
    //     pdo_query($sql);
    // }
    function loadall_binhluan($idToChoose, $inputValue){
        $sql = "select * from binhluan";
        if($idToChoose !== '' && $inputValue !== ''){
            $sql =  "select * from binhluan where " .$idToChoose. "='" .$inputValue. "'";
        }
        $listbl=pdo_query($sql);
        return $listbl;
    }
    function loadall_binhluan_detailProduct($id){
        $sql = "select * from binhluan where idproduct = '$id'";
        $listbl=pdo_query($sql);
        return $listbl;
    }
    function delete_binhluan($id){
        $sql = "delete from binhluan where id =". $id;
        pdo_query($sql);
    }
?>  