<?php
    ob_start();
    session_start();
    include "./model/pdo.php";
    include "./model/taikhoan.php";

include "view/header.php";
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'shop':
            // if (isset($_GET['iddm']) && $_GET['iddm']) {
            //     $iddm = $_GET['iddm'];
            // } else {
            //     // $listsanpham = loadall_sanpham("", 0);
            //     $iddm = "";
            // }
            // if (isset($_POST['kyw']) && ($_POST['kyw']) != "") {
            //     $kyw = $_POST['kyw'];
            // } else {
            //     $kyw = "";
            // }


            // $listsanpham = loadall_sanpham($kyw, $iddm);

            // $listdanhmuc = loadall_danhmuc();
            include "view/shop.php";
            break;
        case 'detailProduct':
            // if (isset($_GET['id']) && $_GET['id']) {
            //     $id = $_GET['id'];
            //     $sanpham = loadone_sanpham($id);
            //     extract($sanpham);
            //     $splienquan = loadall_sanpham_related($category_id, $id);
            //     $dsbl = loadall_binhluan($id);
        
            //     setview_sanpham($id, $view);
            // }
            include "view/detailProduct.php";
            break;

        case 'register':
            if (isset($_POST['submit']) && $_POST['submit']) {
                $username = $_POST['username'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                    
                if(strlen($password) >= 6){
                    insert_taikhoan( $firstname, $lastname, $username, $email, $password);
                    $thongbao = "ĐĂNG KÍ THÀNH CÔNG";
                } else{
                    $thongbao = "Mật khẩu tối thiểu 6 kí tự";
                }
            }
            include "view/account/register-login.php";
            break;
        case 'login':
            if (isset($_POST['submit']) && $_POST['submit']) {
                $password = $_POST['password'];
                $email = $_POST['email'];
                $checkuser = checkuser($email, $password);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    header('location: index.php?act=account');
                } else {
                    $thongbao = "Tài khoản hoặc mật khẩu không đúng";
                }
            }
            include "view/account/register-login.php";
            break;
        case 'account':
            if(isset($_SESSION['user']) && $_SESSION['user']){
                $user = $_SESSION['user']['username'];
                $role = $_SESSION['user']['role'];
            } else{
                
            }
            include "view/account/account.php";
            break;    
        case 'edit_taikhoan':
            if (isset($_POST['submit']) && $_POST['submit']) {
                $id = $_POST['id'];
                $username = $_POST['username'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $password = $_POST['password'];

                update_user($id,$username,$firstname,$lastname, $password, $email, $address,$phone);
                unset($_SESSION['user']);

                header('location: index.php?act=login');
            }
            include "view/taikhoan/edit_taikhoan.php";
            break;
        case 'logout':
            unset($_SESSION['user']);
            // setcookie('remember', null, -1);
            include "view/account/register-login.php";
            break;

        case 'quenmk':
            if (isset($_POST['quenmk']) && $_POST['quenmk']) {
                $email = $_POST['email'];


                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $thongbao = 'Mật khẩu của bạn là: ' . $checkemail["password"];
                } else {
                    $thongbao = "Email không tồn tại";
                }

            }
            include "view/taikhoan/quenmatkhau.php";
            break;
        case 'binhluan':
            if ((isset($_POST['guibinhluan'])) && ($_POST['guibinhluan'])) {
                $noidung = $_POST['noidung'];
                $idpro = $_POST['idpro'];
                $iduser = $_SESSION['user']['id'];
                $ngaybinhluan = date('d/m/Y');

                insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan);
                header("location: index.php?act=detailProduct&id='$idpro'");
            }
            // include "view/detailProduct.php";
            break;
        case "wishlist":
            include "view/wishlist.php";
            break;    
        case 'addtocart':
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $soluong = 1;
                $ttien = $soluong * intval($price);
                $spadd = [$id, $name, $img, $price, $soluong, $ttien];
                array_push($_SESSION['mycart'], $spadd);

            }
            include 'view/cart/cart.php';
            break;
        case 'deletecart':
            if (isset($_GET['idcart'])) {
                unset($_SESSION['mycart'][$_GET['idcart']]);
            }else{
                $_SESSION['mycart'] = [];
            }
            header("Location:index.php?act=cart");
            break;
        case 'cart':
            include "view/cart/cart.php";
            break;
            case 'checkout':
                include "view/cart/checkout.php";
                break;    
        default:
            include "view/home.php";
            break;
    }

}else {
    include "view/home.php";
}

// include "home.php";
include "view/footer.php"
    ?>