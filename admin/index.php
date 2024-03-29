<?php
ob_start();
session_start();
if (isset ($_SESSION['user']) && ($_SESSION['user']['role'] == 1)) {
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include_once "../model/sanpham.php";
    include "../model/binhluan.php";
    include "../model/taikhoan.php";
    // include "../model/cart.php";
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

                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
                break;
            case 'xoadm':
                if (isset ($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_danhmuc($_GET['id']);
                }
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
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

                $listdanhmuc = loadall_danhmuc();
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


                    $images = [];
                    // Lặp qua từng file được tải lên
                    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                        $filename = $_FILES['images']['name'][$key];
                        $targetPath = $target_dir . $filename;
                        echo $filename;
                        // Di chuyển và lưu trữ ảnh vào thư mục đích
                        if (move_uploaded_file($tmp_name, $targetPath)) {
                            array_push($images, $filename);
                        }
                    }
                    $filenames = join(",", $images);
                    echo $filenames;
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }

                    insert_sanpham($tensp, $giasp, $filename, $filenames, $mota, $iddm);
                    $thongbao = "them thnah cong";
                }
                $listdanhmuc = loadall_danhmuc();
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
    
                $listdanhmuc = loadall_danhmuc();
                $listsanpham = loadall_sanpham($kyw, $iddm);
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
                $listdanhmuc = loadall_danhmuc();
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

                    // if(isset($_FILES['images'])){
                    //     echo '<pre>';
                    //     var_dump($_FILES['images']);
                    //     echo '</prev>';
                    //     echo 'co anh moi';
                    // } else{
                    //     echo 'khong co anh moi';
                    // }

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
            // case 'xoabl':
            //         if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            //             delete_binhluan($_GET['id']);
            //         }
            //         $listbinhluan = loadall_binhluan(0,0);
            //     include "binhluan/list.php";
            //     break;
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
            // case 'listbill':
            //     // if(isset($_POST['kyw'])&&($_POST['kyw']!="")) {
            //     //     $kyw=$_POST['kyw'];
            //     // }else{
            //     //     $kyw="";
            //     // }
            //     $listbill= loadall_bill(0);
            //     include "bill/listbill.php";
            //     break;
            // case 'xoabill':
            //     if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            //         delete_bill($_GET['id']);
            //     }
            //     $listbill=loadall_bill("",0);
            //     include "bill/listbill.php";
            // break;
            // case 'suabill':
            //     if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            //         $bill= loadone_bill($_GET['id']);
            //     }
            //     $listbill=loadall_bill(0);
            //     include "bill/update.php";
            //     break;
            // case 'updatebill':
            //     if (isset($_POST['capnhap']) && ($_POST['capnhap'])) {
            //         $ttdh = isset($_POST["ttdh"]) ? $_POST["ttdh"] : 0 ;
            //         $id = $_POST["id"];
            //         update_bill($id, $ttdh);
            //         $thongbao = "Cập nhật thành công";
            //     }
            //     $listbill=loadall_bill(0);
            //     // include "bill/listbill.php";
            //     header("Location: index.php?act=listbill");
            //     break;  
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
        include "home.php";
    }

    include "footer.php";
} else {
    header('Location: ../index.php');
}
ob_end_flush()
    ?>