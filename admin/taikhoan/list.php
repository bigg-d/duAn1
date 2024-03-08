<div class="row">
      <div class="row_header">
        <p>Danh Sách Khách hàng</p>
      </div>
      <div class="row">
        <div class="row_nb10 fomdsloai">
          <table>
            <tr>
              <th>Mã Khách Hàng</th>
              <th>Tên Đăng nhập</th>
              <th>Mật khẩu</th>
              <th>Email</th>
              <th>Địa Chỉ</th>
              <th>Điện Thoại</th>
              <th>Quyền</th>
              <th>Chức năng</th>
            </tr>
            <?php
                foreach ($listuser as $user) {
                    extract($user);
                    $suatk = "index.php?act=suatk&id=". $id ;
                    $xoatk = "index.php?act=xoatk&id=". $id ;
                    echo '
                            <tr>
                            <td>' .$id. '</td>
                            <td>' .$user.'</td>
                            <td>' .$password.'</td>
                            <td>' .$email.'</td>
                            <td>' .$address.'</td>
                            <td>' .$phone.'</td>
                            <td>' .$role.'</td>
                            <td>
                                <a href= "'.$suatk.'"><input type="button" value="Sửa"></a> 
                                <a href="'.$xoatk.'"><input type="button" value="Xóa"></td></a>
                        </tr>';
                }
            ?>
            
          </table>
        </div>
        <!-- <div class="row_mb21">
          <input type="button" value="Chọn tất cả">
          <input type="button" value="Bỏ chọn tất cả">
          <input type="button" name="" id="" value="xóa các mục đã chọn">
          <a href="index.php?act=adddm"><input type="button" value="Nhập thêm"></a>
        </div> -->
      </div>
    </div>