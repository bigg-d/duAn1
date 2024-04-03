<main class="w-100 d-f f-d">
  <h3>Thêm sản phẩm</h3>

  <div class="search_list-product-admin w-100 d-f jf-c">


    <form class="general-form" action="index.php?act=addsp" method="post" enctype="multipart/form-data">



      <div class="block_form d-f f-d">
        <label class="label_addsp" for="">Tên sản phẩm</label>
        <input class="ten_addsp" placeholder="Tên sản phẩm" value="<?php echo isset($tensp) ? $tensp :''  ?>" type="text" name="tensp" />
        <span class="color-red"><?php echo isset($error_ten)? $error_ten :'' ?></span>
      </div>
      

      <div class="block_form d-f f-d">
        <label class="label_addsp" for="">Giá</label>
        <input class="ten_addsp" type="number" name="giasp" placeholder="Giá sản phẩm"  value="<?php echo isset($giasp)  ? $giasp : ''  ?>" />
        <span class="color-red"><?php echo isset($error_gia)? $error_gia :'' ?></span>
      </div>

      <div class="block_form d-f f-d">
        <label class="label_addsp" for="">Hình</label>
        <input class="ten_addsp" type="file"  name="hinh" />
        <span class="color-red"><?php echo isset($error_img_1)? $error_img_1 :'' ?></span>
      </div>
      <div class="block_form d-f f-d">
        <label class="label_addsp" for="">Hình chi tiết</label>
        <input class="ten_addsp" type="file" name="images[]" multiple/>
        <span class="color-red"><?php echo isset($error_img_2)? $error_img_2 :'' ?></span>
      </div>

      <div class="block_form d-f f-d">
        <label class="label_addsp"  for="">Mô tả</label>
        <textarea name="mota" id="" cols="30"  rows="5"><?php echo isset($mota)? $mota:''?></textarea>
        <span class="color-red"><?php echo isset($error_mota)? $error_mota :'' ?></span>
      </div>



      

      <div class="block_form d-f f-d">

        <label for=""> Danh mục </label>
        <select name="iddm">
          <?php
          foreach ($listdanhmuc as $danhmuc) {
            extract($danhmuc);
            echo '<option value="' . $iddm . '">' . $tendanhmuc . '</option>';
          }
          ?>

        </select>

      </div>

      <div class="block_form d-f g-10 al-c">
        <input class="submit-general-form" type="submit" name="themmoi" value="THÊM MỚI">
        <input class="input_addsp" type="reset" value="NHẬP LẠI">
        <a href="index.php?act=listsp" style="display:block;border-radius: 4px;padding: 8px 15px;color:var(--white )" class=" cancel-general-form" >Danh sách</a>
      </div>
      <div class="block_form d-f f-d" style="color:lime;font-size:1vw"><span><?php echo isset($thongbao)? $thongbao : '' ?></span></div>
    </form>

  </div>


</main>