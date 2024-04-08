<?php
    
?>
<main class="w-100 d-f f-d">
          <h3>Update Khách Hàng</h3>
          <div class="search_list-product-admin w-100 d-f jf-c">
            <form action="index.php?act=updatetk" class="general-form" method="post" enctype="multipart/form-data">
            <div class="block_form d-f f-d">
                <label for=""> TÊN  </label>
                <input type="text" placeholder="Tên" name="firstname"  value="<?=$taikhoan[0]['firstname']?>"> 
              </div>
              <div class="block_form d-f f-d">
                <label for=""> TÊN ĐỆM  </label>
                <input type="text" placeholder="Tên Đệm" name="lastname"  value="<?=$taikhoan[0]['lastname']?>"> 
              </div>
              <div class="block_form d-f f-d">
                <label for=""> TÊN ĐĂNG NHẬP  </label>
                <input type="text" placeholder="Tên Đang Nhập" name="tentk"  value="<?=$taikhoan[0]['username']?>"> 
              </div>
              <div class="block_form d-f f-d">
                <label for="">MẬT KHẨU</label>
                <input type="text" placeholder="MẬT KHẨU" name="matkhau" value="<?=$taikhoan[0]['pass']?>">
              </div>
              <div class="block_form d-f f-d">
                <label for="">EMAIL</label>
                <input type="text" placeholder="Email" name="email" value="<?=$taikhoan[0]['email']?>">
              </div>
              <div class="block_form d-f f-d">
                <label for="">ĐỊA CHỈ	</label>
                <input type="text" placeholder="Địa Chỉ" name="diachi" value="<?=$taikhoan[0]['address']?>">
              </div><div class="block_form d-f f-d">
                <label for="">Điện Thoại</label>
                <input type="text" placeholder="Điên Thoại" name="dienthoai" value="<?=$taikhoan[0]['phone']?>">
              </div>
              <div class="block_form d-f f-d">
                <label for="">Quyền</label>
                <select name="vaitro" id="">
                  <option value="0">User</option>
                  <option value="1">Admin</option>
                </select>
                <!-- <input type="text" placeholder="Vai Trò" name="vaitro" value="<?=$taikhoan[0]['role']?>"> -->
              </div>
            
              <div class="block_form d-f g-10 al-c">
              <input type="hidden" name="id" value="<?=$taikhoan[0]['id']?>">
               <input type="submit" value="Cập Nhập" class="submit-general-form" name="capnhap">
               <input type="reset" value="Hủy" class="cancel-general-form" >
               <!-- <a href="index.php?act=lisdm"><input type="button" value="Danh Mục"></a> -->
              </div>
              <?php 
                        if(isset($thongbao)&&($thongbao)){
                            echo $thongbao;
                        }
                        
                    ?>
            </form>
          </div>
</main>