<main class="w-100 d-f f-d">
  <h3>Danh sách sản phẩm</h3>
  <div class="search_list-product-admin w-100">
    <form action="index.php?act=listsp" class="d-f form-search" method="post">
      <input type="text" placeholder="Tìm kiếm theo tên sản phẩm..." class="input-search" name="kyw" />
      <input type="hidden" name="page" value="1">
      <select name="iddm">
        <option value="0" selected>Tất cả</option>
        <?php
        foreach ($listdanhmuc as $danhmuc) {
          extract($danhmuc);
          echo ' <option value="' . $iddm . '">' . $tendanhmuc . '</option>';
        }
        ?>
      </select>
      <input type="submit" class="submit-search-form" name="listok" value="Tìm kiếm" />
    </form>


    <!-- Danh sách sản phẩm -->
    <table class="w-100 table" border='1' style="text-align:center">
      <thead>
        <th style="width:40px">Check</th>
        <th>ID</th>
        <th style="width:200px">Tên sản phẩm</th>
        <th style="width:100px">Giá</th>
        <th>Ảnh</th>
        <th style="width:400px">ẢNh chi tiết</th>
        <th style="width:400px">Mô tả</th>

        <th style="width:150px">Danh mục</th>
        <th style="width:120px">Tạo mới</th>
      </thead>
      <tbody class="tbody">
        <!-- php -->
        <?php foreach ($listsanpham as $sanpham) {

          extract($sanpham);
          $danhmuc = loadone_danhmuc($iddm);
          $anhchitiet = explode(",", $images);
          $suasp = "index.php?act=suasp&id=" . $id;
          $xoasp = "index.php?act=xoasp&id=" . $id;
          $hinhpath = "../upload/" . $img;
          if (is_file($hinhpath)) {
            $hinh = " <img src='" . $hinhpath . "' width='100'>";

          } else {
            $hinh = "no photo";
          }


          echo '<tr class="trItem">
                                <td><input type="checkbox"></td>
                                <td class="td_sp">' . $id . '</td>
                                <td class="td_sp">' . $name . '</td>
                                <td class="td_sp">' . number_format($price) . '</td>
                                <td class="td_sp">' . $hinh . '</td>
                                <td>
                                <ul style="display:flex; flex-wrap: wrap; gap:10px">';
          foreach ($anhchitiet as $value) {
            echo '<li><img src="../upload/' . $value . '" width="80"></li>';
          }
          ;
          echo '<ul>
                  </td>
          <td class="td_sp">' . $mota . '</td>
                                <td class="td_sp">' . $danhmuc['tendanhmuc'] . '</td>
                                <td class="td_sp"> 
                                  <a class="url-edit" href="' . $suasp . '">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                  </a> 
                                  <a class="url-delete" href="' . $xoasp . '" onclick="return confirm(\'Xác nhận xóa\')">
                                    <i class="fa-solid fa-trash"></i>
                                  </a> 
                                </td>
                            </tr>';
        }
        ?>
      </tbody>



    </table>


</main>
<nav class="pagination-container">
  <button class="pagination-button" id="prev-button" title="Previous page" aria-label="Previous page">
    &lt;
  </button>
  
  <div id="pagination-numbers">
  </div>
  
  <button class="pagination-button" id="next-button" title="Next page" aria-label="Next page">
    &gt;
  </button>
</nav>
<script src="../assets/js/admin/pagination.js"></script>