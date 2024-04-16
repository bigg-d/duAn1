<?php
include "../../model/pdo.php";
include "../../model/taikhoan.php";
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $address = $_POST['address']; 
    $phone = $_POST['phone']; 
    if($address != '' && $phone !=''){
        $ketqua = update_address($_SESSION['user']['id'],$address,$phone);
    }
}
// $user_info = loadone_taikhoan($_SESSION['user']['id']);
// if($user_info[0]['pass'] == $current_pwd){
//         echo json_encode( array(
//             'status' => 0,
//             'message' => 'mk dung'
//         ));
//         if($new_pwd != '' && $confirm_pwd != ''){
//             if($new_pwd == $confirm_pwd){

//                 $ketqua = edit_pass($_SESSION['user']['id'],$new_pwd);
//             }
//         }
//     }
    
// else{
//         echo json_encode(array(
//             'status' => 1,
//             'message' => 'Mật khẩu sai'
//         ));
//     }




?>