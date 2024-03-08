<div class="row">
      <div class="row_header">
        <p>Thêm mới loại hàng</p>
      </div>
      <div class="row">
        <form action="index.php?act=adddm" method="post">
          <div class="row_mb20">
            Mã Loại <br>
            <input type="text" name="maloai">
          </div>
          <div class="row_mb20">
            Tên Loại <br>
            <input type="text" name="tenloai">
          </div>
          <div class="row_mb21">
            <input type="submit" name="themmoi" value="Thêm mới ">
            <input type="reset" value="Nhập lại">
            <a href="index.php?act=listdm"><input type="button" value="Danh sách"></a>
            <?php
                if(isset($thongbao)&&($thongbao!=""))echo $thongbao;
                
            ?>
          </div>
        </form>
      </div>
    </div>
  </div>