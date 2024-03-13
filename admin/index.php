<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/cart.php";

include "header.php";

if (isset($_GET['act'])) {
    $act = $_GET['act'];

    switch ($act) {
        case 'adddm':
            //kiem tra ng dung co click vao nut add
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
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
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_danhmuc($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = loadone_danhmuc($_GET['id']);
            }
            include "danhmuc/update.php";
            break;
        case 'updatedm':
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
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
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {

                foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                    var_dump($_FILES['images']);
                    $filename = $_FILES['images']['name'][$key];
                    $targetPath = $targetDirectory . $filename;
                
                    // Di chuyển và lưu trữ ảnh vào thư mục đích
                    if (move_uploaded_file($tmp_name, $targetPath)) {
                        echo "Upload thành công: " . $filename . "<br>";
                    } else {
                        echo "Upload thất bại: " . $filename . "<br>";
                    }
                }

                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                echo $tensp;
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $filename = $_FILES["hinh"]["name"];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }

                insert_sanpham($tensp, $giasp, $filename, $images, $mota, $iddm);
                $thongbao = "them thnah cong";
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/add.php";
            break;
        case 'listsp':
            if (isset($_POST['listok']) && $_POST['listok']) {
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
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
            }
            $listsanpham = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;
        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sp = loadone_sanpham($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/update.php";
            break;
        case 'updatesp':
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $id = $_POST['id'];
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $filename = $_FILES["hinh"];
                $oldfilename = $_POST['hinh'];

                var_dump($filename);
                

                $target_dir = "../upload/";
                // $target_file = $target_dir . basename($filename["name"]);
                // if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                //     // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                //     $thongbao = "them thnah cong";
                
                // } else {
                //     // echo "Sorry, there was an error uploading your file.";
                // }
                if($filename["size"] > 0){
                    $oldfilename = $filename["name"];
                    $target_file = $target_dir . $oldfilename;
                    move_uploaded_file($filename["tmp_name"], $target_file);
                };
                echo $oldfilename;
                update_sanpham($id, $tensp, $giasp, $oldfilename, $mota, $iddm);
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham('', 0);
            include "sanpham/list.php";
            break;


            
        case 'dskh':
            $listuser = loadall_users();
            include "taikhoan/list.php";
            break;
        case 'dsbl':
            $dsbl = loadall_binhluan(0);
            include "binhluan/list.php";
            break;
        case 'xoabl':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_binhluan($_GET['id']);
            }
            $dsbl = loadall_binhluan(0);
            include "binhluan/list.php";
            break;
        case 'thongke':
            $listthongke = loadall_thongke();
            include "thongke/list.php";
        case 'bieudo':
            $listthongke = loadall_thongke();
            include "thongke/bieudo.php";
            break;
        case 'vetrangkhach':
            header("Location: /index.php/assignment");
            break;
        default:
            include "home.php";
            # code...
            break;
    }
} else {
    include "home.php";
}

// include "home.php";
include "footer.php"
    ?>