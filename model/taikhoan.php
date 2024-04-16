<?php
    function insert_taikhoan($firstname, $lastname, $username, $email, $password)
    {
        $sql = "insert into taikhoan (firstname, lastname, username, email, pass) values('$firstname', '$lastname', '$username', '$email', '$password' )";
        pdo_execute($sql);
    }
    function checkuser($email, $password)
    {
        $sql = "select * from taikhoan where email = '$email' and pass ='$password'";
        $user = pdo_query_one($sql);
        return $user;
    }
    function delete_taikhoan($id){
        $sql = "delete from taikhoan where id =". $id;
        pdo_query($sql);
    }
    function checkemail($email)
    {
        $sql = "select * from taikhoan where email = '$email'";
        $user = pdo_query_one($sql);
        return $user;
    }
    function update_user($id,$username,$firstname,$lastname, $password, $email, $address,$phone, $role){
        $sql = "update taikhoan set firstname = '$firstname', lastname = '$lastname', username = '$username', pass = '$password', email = '$email', address = '$address', phone = '$phone'";
        if($role !== ' '){
            $sql .= ", role = '$role'" ;
        }
        $sql .= " where id = '$id'";
        echo $sql;
        pdo_execute($sql);
    }
    function  edit_pass($id, $new_pass){
        $sql ="UPDATE `taikhoan` SET `pass`= '$new_pass' WHERE id = '$id'";
        $ketqua = pdo_execute($sql);
        return $ketqua;
    }
    function update_address($id,$address,$phone){
        $sql =" UPDATE `taikhoan` SET `address` = '$address',`phone`='$phone' WHERE `id` ='$id'";
        $ketqua = pdo_execute($sql);
        return $ketqua;
    }
    // function loadall_taikhoan(){
    //     $sql = "select * from taikhoan order by id desc";
    //     $listuser = pdo_query($sql);
    //     return $listuser;
    // }
    function loadall_taikhoan($id,$role){
        $sql = "select * from taikhoan where 1";
        if($id != ""){
            $sql.= " and id = ". $id;
        }
        if($role !== ''){
            $sql.= " and role = ".$role;
        }
        $sql.= " order by id desc";
        $listtaikhoan = pdo_query($sql);
        return $listtaikhoan;
    }
    function loadone_taikhoan($id){
        $sql = "select * from taikhoan where id = '$id'";
        $user = pdo_query($sql);
        return $user;
    }
    function count_taikhoan(){
        $sql ="SELECT COUNT(*) AS total_records FROM taikhoan";
        $result = pdo_query($sql);
        return $result;
    }
    function check_username_register($user_name)
    {
        $sql = "select * from taikhoan where username = '$user_name'";
        $user = pdo_query_one($sql);
        return $user;
    }
?>