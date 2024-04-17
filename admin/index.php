<?php
ob_start();
session_start();
if (isset ($_SESSION['user']) && ($_SESSION['user']['role'] == 1)) {
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include_once "../model/sanpham.php";
    include "../model/binhluan.php";
    include "../model/taikhoan.php";
    include "../model/checkout.php";
    include "../model/thongke.php";
    // include "../model/bill.php";
// include "../model/convert.php";
// include "../model/lienhe.php";
// include "../model/order.php";
    include "header.php";
    //controller
// $count_product = count_product();
// $count_taikhoan = count_taikhoan();
// $sum_total_cash = loadall_bill_by_day();

    if (isset ($_GET['act'])) {
        $act = $_GET['act'];
        $products = loadall_sanpham_home();

        switch ($act) {
            case 'adddm':
                //kiem tra ng dung co click vao nut add
                if (isset ($_POST['themmoi']) && $_POST['themmoi']) {
                    $tenloai = $_POST['tenloai'];
                    insert_danhmuc($tenloai);
                    $thongbao = "them thnah cong";
                }
                include "danhmuc/add.php";
                break;
            case 'listdm':
                if(isset($_POST['tendanhmuc'])){
                    $tendanhmuc = $_POST['tendanhmuc'];

                }else{
                    $tendanhmuc = '';
                }
                $listdanhmuc = loadall_danhmuc($tendanhmuc);
                include "danhmuc/list.php";
                break;
            case 'xoadm':
                if (isset ($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_danhmuc($_GET['id']);
                }
                $listdanhmuc = loadall_danhmuc('');
                header("location: index.php?act=listdm");
                break;
            case 'suadm':
                if (isset ($_GET['id']) && ($_GET['id'] > 0)) {
                    $dm = loadone_danhmuc($_GET['id']);
                }
                include "danhmuc/update.php";
                break;
            case 'updatedm':
                if (isset ($_POST['capnhat']) && $_POST['capnhat']) {
                    $tenloai = $_POST['tenloai'];
                    $id = $_POST['id'];
                    update_danhmuc($id, $tenloai);
                    $thongbao = "cap nhat thnah cong";
                }

                $listdanhmuc = loadall_danhmuc('');
                include "danhmuc/list.php";
                break;


            // COntroller san pham 
            case 'addsp':
                //kiem tra ng dung co click vao nut add
                if (isset ($_POST['themmoi']) && $_POST['themmoi']) {
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    $filename = $_FILES["hinh"]["name"];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    
                    if(empty($tensp)){
                        $error_ten = 'Không được bỏ trống !';
                    }
                    elseif(strlen($tensp) > 255){
                        $error_ten ='Tên quá dài';
                    }
                    if(empty($giasp)){
                        $error_gia = 'Không được bỏ trống !';
                    }elseif(strlen($giasp) > 10){$error_gia='Giá phải <= 10';}
                    if(empty($mota)){
                        $error_mota = 'Vui lòng nhập mô tả';
                    }
                    $images = [];
                    // Lặp qua từng file được tải lên
                    
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
    
                    } else {
                        $error_img_1 ='Vui Lòng chọn file ảnh';
                    }
                    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                        $filename = $_FILES['images']['name'][$key];
                        $targetPath = $target_dir . $filename;
                        // echo $filename;
                        // Di chuyển và lưu trữ ảnh vào thư mục đích
                        if (move_uploaded_file($tmp_name, $targetPath)) {
                            array_push($images, $filename);
                        }
                        else{
                            $error_img_2 ='Vui Lòng chọn file ảnh';
                        }
                        
                        
                    }
                    $filenames = join(",", $images);
                    if(!isset($error_ten) && !isset($error_mota) && !isset($error_gia) && !isset($error_img_1) && !isset($error_img_2) ){
                        insert_sanpham($tensp, $giasp, $filename, $filenames, $mota, $iddm);
                        $thongbao = "Thêm Thành Công.";
                    }
    
                }
                $listdanhmuc = loadall_danhmuc('');
                include "sanpham/add.php";
                break;
            case 'listsp':
                if (isset ($_POST['listok']) && $_POST['listok']) {
                    $kyw = $_POST['kyw'];
                    $iddm = $_POST['iddm'];
                } else {
                    $kyw = '';
                    $iddm = 0;
                }
    
                $listdanhmuc = loadall_danhmuc('');
                $listsanpham = loadall_sanpham($kyw, $iddm, '','');
                include "sanpham/list.php";
                break;
            case 'xoasp':
                if (isset ($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_sanpham($_GET['id']);
                    header("location: index.php?act=listsp");
                }
                // $listsanpham = loadall_sanpham("", 0);
                // include "sanpham/list.php";
                break;
            case 'suasp':
                if (isset ($_GET['id']) && ($_GET['id'] > 0)) {
                    $sanpham = loadone_sanpham($_GET['id']);
                }
                $listdanhmuc = loadall_danhmuc('');
                include "sanpham/update.php";
                break;
            case 'updatesp':
                if (isset ($_POST['capnhat']) && $_POST['capnhat']) {
                    $id = $_POST['id'];
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    $anh = $_FILES["hinh"];
                    $anhcu = $_POST['hinh'];



                    $target_dir = "../upload/";
                    $images = [];
                    $old_images = $_POST['images'];

                    if ($_FILES['images']['size'][0] > 0) {
                        // Lặp qua từng file được tải lên
                        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                            $filename = $_FILES['images']['name'][$key];
                            $targetPath = $target_dir . $filename;
                            // echo $filename;
                            // Di chuyển và lưu trữ ảnh vào thư mục đích
                            if (move_uploaded_file($tmp_name, $targetPath)) {
                                array_push($images, $filename);
                            }
                        }
                        $images = join(",", $images);
                    } else {
                        $images = $old_images;

                    }



                    if ($anh["size"] > 0) {
                        $anhcu = $anh["name"];
                        $target_file = $target_dir . $anhcu;
                        move_uploaded_file($anh["tmp_name"], $target_file);
                    }
                    ;
                    // echo $anhcu;
                    update_sanpham($id, $tensp, $giasp, $anhcu, $images, $mota, $iddm);
                    header("location: index.php?act=listsp");
                }
                // $listdanhmuc = loadall_danhmuc();
                // $listsanpham = loadall_sanpham('', 0);
                // include "sanpham/list.php";
                break;
            case 'dskh':
                if(isset($_POST['findAccSubmit'])){
                    $isuser = $_POST['iduser'];
                    $role = $_POST['role'];
                    $listtaikhoan = loadall_taikhoan($isuser,$role);
                }
                else{
                    $listtaikhoan = loadall_taikhoan('','');

                }

                include "taikhoan/list.php";
                break;
                case 'addtk':
                    if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                        $username = $_POST['username'];
                        $firstname = $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        $password = $_POST['password'];
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
                        if (!isset ($loiten1) && !isset ($loiten2) && !isset ($loiten3) && !isset ($loiemail) && !isset ($loimk1)) {
                            $sql = "INSERT INTO `taikhoan`(`firstname`, `lastname`, `username`, `pass`, `email`) VALUES 
                                                         ('$firstname','$lastname','$username','$password','$email') ";
                            pdo_execute($sql);
                            $thongbao = "Thêm thành công";
                            
                        }
                    }

                    include "taikhoan/add.php";
                    break;   
                case 'xoatk':
                        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                            delete_taikhoan($_GET['id']);
                        }
                        $listtaikhoan=loadall_taikhoan('', '');
                        include "taikhoan/list.php";
                        break;
                case 'suatk':
                    if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                        $taikhoan = loadone_taikhoan($_GET['id']);
                    }
                    $listtaikhoan= loadall_taikhoan('','');
                    include "taikhoan/update.php";
                    break;
                case 'updatetk':
                    if (isset($_POST['capnhap']) && ($_POST['capnhap'])) {
                        $id = $_POST["id"];
                        $tentk = $_POST["tentk"];
                        $firstname = $_POST["firstname"];
                        $lastname = $_POST["lastname"];
                        $matkhau = $_POST["matkhau"];
                        $email = $_POST["email"];
                        $diachi=$_POST['diachi'];
                        $dienthoai=$_POST['dienthoai'];
                        $vaitro=(isset($_POST['vaitro']) ? $_POST['vaitro'] : ' ');



                        update_user($id,$tentk,$firstname, $lastname,$matkhau,$email,$diachi,$dienthoai,$vaitro);

                        $thongbao = "Cập nhật thành công";
                    }
                    $listtaikhoan = loadall_taikhoan('','');

                    include "taikhoan/list.php";
                    break;    
            case 'dsbl':
                if (isset ($_POST['findCommentSubmit'])) {
                    $idToChoose = $_POST['idToChoose'];
                    $inputValue = $_POST['inputValue'];
                    $listbinhluan = loadall_binhluan($idToChoose, $inputValue );
                } else {
                    $listbinhluan = loadall_binhluan('','');
                }

                include "binhluan/list.php";
                break;
            
            case 'thongke':
            case 'listtk':
                if (isset ($_POST['listok']) && ($_POST['listok'])) {
                    $kyw = $_POST['kyw'];
                } else {
                    $kyw = "";
                }
                $listthongke = loadall_thongke($kyw);
                include "thongke/list.php";
                break;

            case 'bieudo':
                $listthongke = loadall_thongke();
                include "thongke/bieudo.php";
                break;
            case 'listbill':
                if(isset($_POST['submit'])&&($_POST['email']!="")) {
                    $kyw=$_POST['email'];
                    $listbill= loadall_bill_admin($kyw);
                }else{
                    $kyw="";
                    $listbill= loadall_bill_admin('');
                }
                include "bill/listbill.php";
                break;
            case 'sp_ban_chay':
                                    
                if(isset($_POST['done_date'])){
                    $start_date = $_POST['start_date'];   
                    $end_date = $_POST['end_date'];   
                    $_chon_ngay = $_POST['chon_ngay'];
                    if($start_date != '' && $end_date != '' && $_chon_ngay == 0){
                        $_sp_ban_chay = loc_date_sp($start_date,$end_date);    
                    }else{
                        $_sp_ban_chay = loc_sp_theo_ngay($_chon_ngay);
                    }
                }
                else{
                    $_sp_ban_chay=sp_ban_chay();
                }

                include "thongke/sp_ban_chay.php";
                break;
            case 'tk_don_hang' :
                if(isset($_POST['done_date'])){
                    $start_date = $_POST['start_date'];   
                    $end_date = $_POST['end_date'];  
                    $_trang_thai = $_POST['chon_ngay'];
                    if($start_date != '' && $end_date != '' && $_trang_thai == 6){
                        $_tk_don = loc_don_ngay($start_date,$end_date,);
                    }else{
                         for ($i=0; $i <=6 ; $i++) { 
                            if($_trang_thai==$i){
                                $_tk_don = tk_don();
                                $tong_don = $_tk_don[0]['tong_don_'.$i.''];
                                $tong_tien = $_tk_don[0]['tong_tien_'.$i.''];
                            }else{$_tk_don = trang_thai_don($_trang_thai);}
                         }
                    }
                }else{
                    $_tk_don = tk_don();
                    // var_dump($_tk_don);
                    $tong_don = $_tk_don[0]['tong_don_6'];
                    $tong_tien = $_tk_don[0]['tong_tien_6'];

                }
                include "thongke/thong_ke_don.php";
                break;
            case 'xoabill':
                // if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                //     delete_bill($_GET['id']);
                // }
                $listbill=loadall_bill('');
                include "bill/listbill.php";
            break;
            case 'suabill':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $bill= loadone_bill($_GET['id']);
                }
                $listbill=loadall_bill('');
                include "bill/update.php";
                break;
            case 'updatebill':
                if (isset($_POST['capnhap']) && ($_POST['capnhap'])) {
                    $ttdh = isset($_POST["ttdh"]) ? $_POST["ttdh"] : 0 ;
                    $id = $_POST["id"];
                    update_bill($id, $ttdh);
                    $thongbao = "Cập nhật thành công";
                }
                $listbill=loadall_bill('');
                // include "bill/listbill.php";
                header("Location: index.php?act=listbill");
                break;  
            // case 'lienhe':
            //     $listlienhe = loadall_lienhe();
            //     include "lienhe/listLienHe.php";
            //     break; 

            // case 'xoalh':
            //             if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            //                 delete_lienhe($_GET['id']);
            //             }
            //             $listlienhe = loadall_lienhe();
            //         include "lienhe/listLienHe.php";
            //         break;  
            // case 'orderhistory':


            //             $listorder = loadall_order(0);
            //             include "order-history.php";
            //             break;
            // case 'findCate':                
            //     $listorder = loadall_order(0);
            //     include "order-history.php";
            //     break;
            default:
                include "home.php";
                break;
        }
    } else {
        $result = tongsanphamdaban();
        $sanphamdaban = $result[0]['tong_so_san_pham'];
        $tongdoanhthu = tongdoanhthu();
        $tongkhachhang = count_taikhoan();
        $date = date("m");
        include "home.php";
    }

    include "footer.php";
} else {
    header('Location: ../index.php');
}
ob_end_flush()
    ?>