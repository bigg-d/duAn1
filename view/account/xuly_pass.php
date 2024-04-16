<?php
include "../../model/pdo.php";
include "../../model/taikhoan.php";
session_start();
$current_pwd = $_POST['currentpwd']; 
$new_pwd = $_POST['new_pwd']; 
$confirm_pwd = $_POST['confirm_pwd']; 
$user_info = loadone_taikhoan($_SESSION['user']['id']);
if($user_info[0]['pass'] == $current_pwd){
        echo json_encode( array(
            'status' => 0,
            'message' => 'mk dung'
        ));
        if($new_pwd != '' && $confirm_pwd != ''){
            if($new_pwd == $confirm_pwd){

                $ketqua = edit_pass($_SESSION['user']['id'],$new_pwd);
            }
        }
    }
    
else{
        echo json_encode(array(
            'status' => 1,
            'message' => 'Mật khẩu sai'
        ));
    }




?>