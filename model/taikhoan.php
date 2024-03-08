<?php
    function insert_taikhoan($user, $email, $password)
    {
        $sql = "insert into taikhoan (user, pass, email) values('$user', '$password', '$email' )";
        pdo_execute($sql);
    }
    function checkuser($email, $password)
    {
        $sql = "select * from taikhoan where email = '$email' and password ='$password'";
        $user = pdo_query_one($sql);
        return $user;
    }
    function checkemail($email)
    {
        $sql = "select * from taikhoan where email = '$email'";
        $user = pdo_query_one($sql);
        return $user;
    }
    function update_user($id,$user, $password, $email, $address,$phone){
        
        $sql = "update taikhoan set user = '$user', password = '$password', email = '$email', address = '$address', phone = '$phone' where id = '$id'";
        pdo_execute($sql);
    }

    function loadall_taikhoan(){
        $sql = "select * from taikhoan order by id desc";
        $listuser = pdo_query($sql);
        return $listuser;
    }
    function loadone_taikhoan($id){
        $sql = "select * from taikhoan where id = '$id'";
        $user = pdo_query($sql);
        return $user;
    }
    
?>