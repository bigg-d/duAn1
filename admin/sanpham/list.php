<?php
    // echo '<script>
    //         const removeProduct = (e,productId) => {
    //             e.preventDefault();
    //             console.log(34);
    //             if(confirm("Xác nhận xóa")){
    //                 const xoaspUrl = "index.php?act=xoasp&id=" + productId;
    //                 window.location.href = xoaspUrl;
    //             }
    //         }
    //       </script>';
?>

<div class="row">
    <div class="row_header">
        <p>Danh Sách loại hàng</p>
    </div>
    <div class="row">
        <div class="row_nb10 fomdsloai">
            <form action="index.php?act=listsp" method="post">
                <input type="text" name="kyw">
                <select name="iddm" id="">
                    <option value="0" selected>Tất cả</option>
                    <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        echo '<option value="'. $category_id. '">' . $category_name . '</option>';
                    }
                    ?>
                </select>
                <input type="submit" value="GO" name="listok">
            </form>
            <table>
                <tr>
                    <th></th>
                    <th>Mã Sản Phẩm</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Giá </th>
                    <th>Ảnh</th>
                    <th>Lượt Xem</th>
                    <th></th>
                </tr>
                <?php
                foreach ($listsanpham as $sanpham) {
                    extract($sanpham);
                    $suasp = "index.php?act=suasp&id=". $id ;
                    $xoasp = "index.php?act=xoasp&id=". $id ;
                    $hinhpath = "../upload/".$img;
                    if (is_file($hinhpath)) {
                        $hinh = "<img src='".$hinhpath."' height='80px' >  ";
                    }else{
                        $hinh="no photo";
                    }

                    echo '
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>' .$id. '</td>
                            <td>' .$name.'</td>
                            <td>' .$price.'</td>
                            <td>' .$hinh.'</td>
                            <td>' .$view.'</td>
                            <td>
                                <a href= "'.$suasp.'"><input type="button" value="Sửa"></a> 
                                <a onclick="return confirm(\'xac nhan\')" href="index.php?act=xoasp&id='. $id.' " id="deleteBtn"><input type="button" value="Xóa"></td></a>
                        </tr>';
                }
                ?>
            </table>
        </div>
        <div class="row_mb21">
            <input type="button" value="Chọn tất cả">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" name="" id="" value="xóa các mục đã chọn">
            <a href="index.php?act=addsp"><input type="button" value="Nhập thêm"></a>
        </div>
    </div>
</div>
