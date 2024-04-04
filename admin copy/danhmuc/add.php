<main class="w-100 d-f f-d">
          <h3>Thêm loại Hàng</h3>
          <div class="search_list-product-admin w-100 d-f jf-c">
            <form action="index.php?act=adddm" class="general-form" method="post">

              <div class="block_form d-f f-d">
                <label for=""> Mã Loại </label>
                <input type="text" placeholder="Mã Loại" name="maloai" disabled>
              </div>
              <div class="block_form d-f f-d">
                <label for=""> Tên Loại </label>
                <input type="text" placeholder="Tên loại" name="tenloai">
              </div>
              <span class="span-red-mg-10"><?php echo isset($thongbao)? $thongbao : '' ?></span>
              <div class="block_form d-f g-10 al-c">
                <input  type="submit" value="Thêm Mới" class="submit-general-form" name="themmoi">
               <a  href="index.php?act=listdm"><input style="padding:10px 15px; border: 1px #c2c2c2 solid; outline:none;border-radius:4px" type="button" value="Danh Sách" class="submit-general-form" name="" ></a>
               <input type="reset" value="Hủy" class="cancel-general-form">
              </div>
            </form>
          </div>
</main>