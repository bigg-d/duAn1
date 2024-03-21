<?php
    function insert_taikhoan($firstname, $lastname, $username, $email, $password)
    {
        $sql = "insert into taikhoan (firstname, lastname, username, email, pass) values('$firstname', '$lastname', '$username', '$password', '$email' )";
        pdo_execute($sql);
    }
    function checkuser($email, $password)
    {
        $sql = "select * from taikhoan where email = '$email' and pass ='$password'";
        $user = pdo_query_one($sql);
        return $user;
    }
    function checkemail($email)
    {
        $sql = "select * from taikhoan where email = '$email'";
        $user = pdo_query_one($sql);
        return $user;
    }
    function update_user($id,$username,$firstname,$lastname, $password, $email, $address,$phone){
        
        $sql = "update taikhoan set , firstname = '$firstname', lastname = '$lastname', username = '$username', pass = '$password', email = '$email', address = '$address', phone = '$phone' where id = '$id'";
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