<div class="row">
      <div class="row_header">
        <p>Thống Kê Sản Phẩm Theo Loại</p>
      </div>
      <div class="row">
        <div class="row_nb10 fomdsloai">
          <table>
            <tr>
              <th>MÃ DANH MỤC</th>
              <th>TÊN DANH MỤC</th>
              <th>SỐ LƯỢNG </th>
              <th>GIÁ CAO NHẤT</th>
              <th>GIÁ THẤP NHẤT</th>
              <th>GIÁ TRUNG BÌNH</th>
              <th></th>
            </tr>
            <?php
              foreach ($listthongke as $thongke) {
                // var_dump($listthongke);
                extract($thongke);
                echo'<tr>
                <td>'.$madm.'</td>
                <td>'.$tendm.'</td>
                <td>'.$countsp.' </td>
                <td>'.$maxprice.'</td>
                <td>'.$minprice.'</td>
                <td>'.$avgprice.'</td>
                <td></td>
              </tr>';
              }
            ?>
          </table>
        </div>
        <div class="row_mb21">
          <a href="index.php?act=bieudo"><input type="button" value="Xem biểu đồ"></a>
          
        </div>
      </div>
    </div>