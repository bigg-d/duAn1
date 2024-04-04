<?php
ob_start();
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
include "./model/pdo.php";
include "./model/taikhoan.php";
include_once "./model/sanpham.php";
include_once "./model/danhmuc.php";
include_once "./model/checkout.php";
include_once "./model/binhluan.php";
include_once "./model/cart.php";

include_once "fuc.php";

include "view/header.php";

if (isset ($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'shop':
            if (isset($_GET['iddm']) && $_GET['iddm']) {
                $iddm = $_GET['iddm'];
            } else {
                // $listsanpham = loadall_sanpham("", 0);
                $iddm = "";
            }
            if (isset($_POST['kyw']) && ($_POST['kyw']) != "") {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }


            $listsanpham = loadall_sanpham($kyw, $iddm);

            $listdanhmuc = loadall_danhmuc();
            include "view/shop.php";
            break;
        case 'detailProduct':
            if (isset ($_GET['id']) && $_GET['id']) {
                $id = $_GET['id'];
                $sanpham = loadone_sanpham($id);
                extract($sanpham);
                $splienquan = loadall_sanpham_related($iddm, $id);
                $dsbl = loadall_binhluan_detailProduct($id);

                setview_sanpham($id, $view);
            }
            include "view/detailProduct.php";
            break;

        case 'register':
            if (isset ($_POST['submit']) && $_POST['submit']) {
                $username = $_POST['username'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $password = $_POST['password'];
                $confirm = $_POST['confirm'];
                $email = $_POST['email'];
                $checkemail = checkemail($email);
                /*                    */
                if (empty ($firstname)) {
                    $loiten1 = 'Không được bỏ trống !';
                } else {

                }
                if (empty ($lastname)) {
                    $loiten2 = 'Không được bỏ trống !';
                }
                if (empty ($username)) {
                    $loiten3 = 'Không được bỏ trống !';
                } else if (strlen($username) >= 6 && strlen($username) <= 24) {

                } else {
                    $loiten3 = 'Tên phải >= 6 && <= 24';
                }
                if (empty ($email)) {
                    $loiemail = 'Không được bỏ trống !';
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                } else if (is_array($checkemail)) {
                    $loiemail = "Email đã được đăng ký";
                }
                if (empty ($password)) {
                    $loimk1 = 'Không được bỏ trống !';
                } else if (strlen($password) < 8) {
                    $loimk1 = "Mật khẩu có ít nhất 8 ký tự !";
                } else if (!preg_match('/[A-Z]/', $password)) {
                    $loimk1 = "Mật khẩu phải có chữ in hoa";
                } else if (!preg_match('/[0-9]/', $password)) {
                    $loimk1 = "Mật khẩu phải có số";
                } else if (!preg_match('/[@#$%^&*]/', $password)) {
                    $loimk1 = "Mật khẩu phải có ký tự đặc biệt";
                }
                if (empty ($confirm)) {
                    $loimk2 = 'Không được bỏ trống !';
                } else if ($password == $confirm) {
                } else {
                    $loimk2 = 'Mật khẩu không khớp';
                }
                if (!isset ($loiten1) && !isset ($loiten2) && !isset ($loiten3) && !isset ($loiemail) && !isset ($loimk1) && !isset ($loimk2)) {
                    $sql = "INSERT INTO `taikhoan`(`firstname`, `lastname`, `username`, `pass`, `email`) VALUES 
                                                 ('$firstname','$lastname','$username','$password','$email') ";
                    pdo_execute($sql);

                    header('Location: index.php?act=login');
                    $thongbao= "Đăng kí thành công";
                }
                /*                    */
            }
            include "view/account/register-login.php";
            break;
        case 'login':
            if (isset ($_POST['submit']) && $_POST['submit']) {
                $password = $_POST['password'];
                $email = $_POST['email'];
                $checkuser = checkuser($email, $password);

                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    header('location: index.php?act=account');
                } else {
                    $loi_dn = "Tài khoản hoặc mật khẩu không đúng !";
                }
            }
            include "view/account/register-login.php";
            break;
        case 'account':
            if (isset ($_SESSION['user']) && $_SESSION['user']) {
                $user = $_SESSION['user']['username'];
                $role = $_SESSION['user']['role'];
                include "view/account/account.php";
            } else {
                include "view/account/register-login.php";
            }
            break;
        case 'reset': 
            
            if(isset($_POST['submit'])){
                $name_reset =$_POST['user_name'];
                $sql ="SELECT * FROM `taikhoan`  WHERE email = '$name_reset'";
                $row =pdo_query_one($sql);
                // var_dump($row);
                if($name_reset == ''){
                    $error='Không được bỏ trống';
                }
                elseif(!$name_reset == $row){
                    $error='Không tìm thấy tài khoản';
                }
                if(!isset($error)){
                    $_SESSION['id'] =$row['id'];
                    $_SESSION['code'] = rand(100000, 999999);
                    include "Mail/send_mail.php";
                    header("Location: index.php?act=verification_code&id=$_SESSION[id]");
                }
            }
            include "view/account/reset_password.php";
            break;
            case 'verification_code':
                // echo $_SESSION['code'];
                // echo phpversion();
                if(isset($_POST['submit'])){
                    $code = $_POST['code'];
                    if($code == ''){
                        $error ='Vui lòng nhập mã';
                    }
                    elseif($code == $_SESSION['code']){
                        $id=$_SESSION['id'];
                        $_SESSION['check_code'] = true;
                        unset($_SESSION['code']);
                        header("Location: index.php?act=show_pass&id=$id");
                    }else{ 
                        $error='Mã không đúng';
                    }
                }
                if($_GET['id'] == $_SESSION['id'] || empty($_GET['id'])){
                    include "view/account/verification_code.php";
                    }else{include "404.php";}
            break;
            case 'show_pass':
                $id_user = $_GET['id'];
                if($id_user== $_SESSION['id'] && isset($_SESSION['check_code'])){
                $sql ="SELECT * FROM `taikhoan`  WHERE id = '$id_user'";
                $row =pdo_query_one($sql);
                $my_pass = $row['pass'];
                include "view/account/show_pass.php";
                }
                else{
                    include "404.php";
                }
                break;
        // case 'edit_taikhoan':
        //     if (isset ($_POST['submit']) && $_POST['submit']) {
        //         $id = $_POST['id'];
        //         $username = $_POST['username'];
        //         $firstname = $_POST['firstname'];
        //         $lastname = $_POST['lastname'];
        //         $email = $_POST['email'];
        //         $address = $_POST['address'];
        //         $phone = $_POST['phone'];
        //         $password = $_POST['password'];

        //         update_user($id, $username, $firstname, $lastname, $password, $email, $address, $phone);
        //         unset($_SESSION['user']);

        //         header('location: index.php?act=login');
        //     }
        //     include "view/taikhoan/edit_taikhoan.php";
        //     break;
        case 'logout':
            unset($_SESSION['user']);
            include "view/account/register-login.php";
            // setcookie('remember', null, -1);

            break;

        case 'quenmk':
            if (isset ($_POST['quenmk']) && $_POST['quenmk']) {
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
            if ((isset ($_POST['guibinhluan'])) && ($_POST['guibinhluan'])) {
                $title = $_POST['title'];
                $noidung = $_POST['content'];
                $idpro = $_POST['idpro'];
                $iduser = $_SESSION['user']['id'];
                $ngaybinhluan = date('d/m/Y');

                insert_binhluan($title,$noidung, $iduser, $idpro, $ngaybinhluan);
                header("location: index.php?act=detailProduct&id='$idpro'");
            }
            // include "view/detailProduct.php";
            break;
        case "wishlist":
            include "view/wishlist.php";
            break;
        case 'cart':
            // if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
            //     $id = $_POST['id'];
            //     $name = $_POST['name'];
            //     $img = $_POST['img'];
            //     $price = $_POST['price'];
            //     $soluong = 1;
            //     $ttien = $soluong * intval($price);
            //     $spadd = [$id, $name, $img, $price, $soluong, $ttien];
            //     array_push($_SESSION['mycart'], $spadd);

            // }
            include 'view/cart/cart.php';
            break;
        case 'deletecart':
            if (isset ($_GET['idcart'])) {
                unset($_SESSION['mycart'][$_GET['idcart']]);
            } else {
                $_SESSION['mycart'] = [];
            }
            header("Location:index.php?act=cart");
            break;
        case 'addtocart':
            if (isset ($_POST['addtocart']) && ($_POST['addtocart'])) {
                if (isset ($_SESSION['user'])) {
                    $name = $_POST['name'];
                    $id = $_POST['id'];
                    $img = $_POST['img'];
                    $price = $_POST['price'];
                    $stock_quantity = $_POST['stock_quantity'];

                    if (!isset ($_SESSION['mycart'])) {
                        $_SESSION['mycart'] = [];
                    }

                    // kiem tra san pham ton tai trong gio hang
                    if (findElementInArray($_SESSION['mycart'], $id)) {
                        foreach ($_SESSION['mycart'] as $key => $product) {
                            if ($product[0] === $id) {
                                echo "<script>alert('Đã có trong giỏ hàng');</script>";
                            }
                        }
                    } else {
                        //kiem tra so luong san pham
                        if (isset ($_POST['quantity'])) {
                            $soluong = $_POST['quantity'];
                        } else {
                            $soluong = 1;
                        }
                        echo "<script>alert('Đã thêm vào trong giỏ hàng');</script>";
                        $ttien = $soluong * intval($price);
                        $productAdd = [$id, $name, $img, $price, $soluong, $ttien];
                        $lastModifiedDate = date('Y-m-d H:i:s');

                        // kiem tra xem gio hang cua user da ton tai chua
                        $listcart = loadall_cart();
                        // var_dump($listcart);
                        if(findCartId($listcart, $_SESSION['user']['id'])){
                            $cartId = get_cartId($_SESSION['user']['id']);
                            update_cart($cartId[0]['id'],date('Y-m-d H:i:s'));
                            insert_cartItem($cartId[0]['id'], $id, $name, $img, $price, $soluong, $ttien);

                        } else{
                            $cartId = insert_cart($_SESSION['user']['id'], $lastModifiedDate);
                            insert_cartItem($cartId, $id, $name, $img, $price, $soluong, $ttien);
                        }
                        array_push($_SESSION['mycart'], $productAdd);
                        
                    }
                } else {
                    echo "<script>alert('Vui lòng đăng nhập để mua hàng');</script>";
                    header("location:index.php?act=login");
                }

            }
            // include "view/cart/cart.php";
            include "view/home.php";

            break;
        case 'checkout':
            if (isset ($_POST['submit'])) {
                

                // if (empty ($firstname_err) && empty ($email_err) && empty ($phone_err) && empty ($address_err) && empty ($payments_err)) {
                // }
                if (isset ($_POST['isUseCurrentAddress'])) {
                    $recipient_name = $_POST['currentFirstName'];
                    $recipient_lastname = $_POST['currentLastName'];
                    $recipient_address = $_POST['currentAddress'];
                    $recipient_email = $_POST['currentEmail'];
                    $recipient_phone = $_POST['currentPhone'];
                } else {
                    $recipient_name = $_POST['firstName']; 
                    $recipient_lastname = $_POST['lastName'];
                    $recipient_address = $_POST['address'];
                    $recipient_email = $_POST['email'];
                    $recipient_phone = $_POST['phone'];
                }
                $payment_method = isset ($_POST['payment-method']) ? $_POST['payment-method'] : '';

                $firstname_err = $lastname_err = $email_err = $phone_err = $address_err = $payments_err = "";

                if (empty ($recipient_name)) {
                    $firstname_err = "Vui lòng nhập tên người nhận";
                }
                if (empty ($recipient_address)) {
                    $address_err = "Vui lòng nhập địa chỉ";
                }
                if (empty ($recipient_email)) {
                    $email_err = "Vui lòng nhập địa chỉ Email";
                } elseif (!filter_var($recipient_email, FILTER_VALIDATE_EMAIL)) {
                    $email_err = "Địa chỉ Email không hợp lệ";
                }
                if (empty ($recipient_phone)) {
                    $phone_err = "Vui lòng nhập số điện thoại";
                } elseif (!preg_match('/^(0[2-9]|01[2|6|8|9])+([0-9]{8})$/', $recipient_phone)) {
                    $phone_err = "Số điện thoại sai định dạng";
                }
                if (empty ($payment_method)) {
                    $payments_err = "Vui lòng chọn phương thức thanh toán";
                }

                if (empty($firstname_err) && empty($address_err) && empty($email_err) && empty($phone_err) && empty($payments_err)) {
                    $idUser = $_SESSION['user']['id'];
                    $currentDate = date('Y-m-d H:i:s');
                    $grandTotal = $_POST['grandTotal'];
            
                    $orderId = insert_bill($idUser, $recipient_name. ' '. $recipient_lastname, $recipient_email, $recipient_phone, $recipient_address, $payment_method, $currentDate, $grandTotal);
            
                    foreach ($_SESSION['mycart'] as $key => $product) {
                        insert_detail_bill($orderId, intval($product[0]), $product[4]);
                    }
                    unset($_SESSION['mycart']);
            
                    header("location: index.php?act=checkout_success");
                    exit;
                }
            }
            include "view/cart/checkout.php";
            break;
        case 'order':
            if (isset ($_POST["submit"])) {
                $ids = $_POST['id'];
                $prices = $_POST['price'];
                $quantities = $_POST['quantity'];

                $grandTotal = 0;
                foreach ($_SESSION['mycart'] as $key => $product) {
                    $grandTotal += ($prices[$key] * $quantities[$key]);
                    $_SESSION['mycart'][$key][4] = $quantities[$key];
                    $_SESSION['grandTotal'] = $grandTotal;
                }
                ;
            }
            
            include "view/cart/checkout.php";
            break;
        case 'checkout_success':
            include "view/camon.php";
            break;
        default:
            include "view/home.php";
            break;
    }

} else {
    include "view/home.php";
}

// include "home.php";
include "view/footer.php"
    ?>