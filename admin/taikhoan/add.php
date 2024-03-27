<main class="w-100 d-f f-d">
          <h3>Thêm tài khoản</h3>
          <div class="search_list-product-admin w-100 d-f jf-c">
            <form action="index.php?act=addtk" class="general-form" method="post" enctype="multipart/form-data">
            <div class="block_form d-f f-d">
                <label for=""> TÊN </label>
                <input type="text" placeholder="Tên đăng nhập" name="firstname" >
                <span  style="color:red"><?php echo isset($loiten1) ? $loiten1 : ""; ?></span>

              </div>
              <div class="block_form d-f f-d">
                <label for=""> TÊN ĐỆM  </label>
                <input type="text" placeholder="Tên đăng nhập" name="lastname" >
                <span style="color:red"><?php echo isset($loiten2) ? $loiten2 : ""; ?></span>
              </div>
              <div class="block_form d-f f-d">
                <label for=""> TÊN ĐĂNG NHẬP  </label>
                <input type="text" placeholder="Tên đăng nhập" name="username" >
                <span style="color:red"><?php echo isset($loiten3) ? $loiten3 : ""; ?></span>
              </div>
              <div class="block_form d-f f-d">
                <label for="">Email</label>
                <input type="text" placeholder="Email" name="email">
                <span style="color:red"><?php echo isset($loiemail) ? $loiemail : ""; ?></span>
              </div>
              <div class="block_form d-f f-d">
                <label for="">Mật khẩu</label>
                <input type="password" placeholder="Mật khẩu" name="password">
                <span style="color:red"><?php echo isset($loimk1) ? $loimk1 : ""; ?></span>
              </div>
              
              <div class="block_form d-f g-10 al-c">
               <input type="submit" value="Thêm Mới" class="submit-general-form" name="themmoi">
               <input type="reset" value="Hủy" class="cancel-general-form" >
               <!-- <a href="index.php?act=listtk"><input type="button" value="Danh Mục"></a> -->
              </div>
             <span style="color:green"></span>

             
              <?php 
                        if(isset($thongbao)&&($thongbao)){
                              echo "<span style='color:green'>". $thongbao . "</span>";
                        }
                        
                    ?>
            </form>
          </div>
</main>