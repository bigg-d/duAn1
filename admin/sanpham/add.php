<div class="row">
      <div class="row_header">
        <p>Thêm mới san pham</p>
      </div>
      <div class="row">
        <form action="index.php?act=addsp" method="post" enctype = multipart/form-data>
          <div class="row_mb20">
            Danh muc san pham <br>
            <select name="iddm" id="">
              <?php
                foreach ($listdanhmuc as $danhmuc) {
                  extract($danhmuc);
                  echo'<option value="'.$iddm.'">'.$tendanhmuc.'</option>';
                }
              ?>
              
            </select>
          </div>
          <div class="row_mb20">
            Tên san pham <br>
            <input type="text" name="tensp" required>
          </div>
          <div class="row_mb20">
            Gia san pham <br>
            <input type="text" name="giasp" required>
          </div>
          <div class="row_mb20">
            Anh san pham <br>
            <input type="file" name="hinh" required>
          </div>
          <div class="row_mb20">
            Anh phu <br>
            <input type="file" name="images[]" multiple required>
          </div>
          <div class="row_mb20">
            MO ta san pham <br>
            <textarea name="mota" cols="30" rows="10" required></textarea>
          </div>
          <div class="row_mb21">
            <input type="submit" name="themmoi" value="Thêm mới ">
            <input type="reset" value="Nhập lại">
            <a href="index.php?act=listsp"><input type="button" value="Danh sách"></a>
            <?php
                if(isset($thongbao)&&($thongbao!=""))echo $thongbao;
                
            ?>
          </div>
        </form>
      </div>
    </div>
  </div>