<?php
  if(is_array($sp)){
    extract($sp);
  }
  $hinhpath = "../upload/".$img;
  if (is_file($hinhpath)) {
    $hinh = "<img src='".$hinhpath."' height='80px' >  ";
  }else{
    $hinh="no photo";
  }
?>
<div class="row">
      <div class="row_header">
        <p>CAP nhat loại hàng</p>
      </div>
      <div class="row">
      <form action="index.php?act=updatesp" method="post" enctype= "multipart/form-data">
          <div class="row_mb20">
            Danh mục sản phẩm <br>
            <select name="iddm" id="">
                <option value="0" selected>Tất cả</option>
                <?php
                  foreach ($listdanhmuc as $danhmuc) {
                    extract($danhmuc);
                    if($category_id == $category_id){
                    echo '<option value="'. $category_id. '" selected>' . $category_name . '</option>';
                    } else{
                      echo '<option value="'. $category_id. '">' . $category_name . '</option>';
                    }
                  }
                ?>
              </select>
          </div>
          <div class="row_mb20">
            Tên sản phẩm <br>
            <input type="text" name="tensp" value="<?php echo $name ?>" required>
          </div>
          <div class="row_mb20">
            Giá sản phẩm <br>
            <input type="text" name="giasp" value="<?php echo $price ?>" required>
          </div>
          <div class="row_mb20">
            Ảnh sản phẩm <br>
            <?=$hinh?>
            <input type="file" name="hinh" required>
            <input type="hidden" name="hinh" value="<?=$img?>">
          </div>
          <div class="row_mb20">
            Mô tả sản phẩm <br>
            <textarea name="mota" cols="30" rows="10" required> <?php echo $description ?></textarea>
          </div>
          <div class="row_mb21">
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="submit" name="capnhat" value="Cập nhật">
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