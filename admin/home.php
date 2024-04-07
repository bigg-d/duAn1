<?php

?>
<main class="w-100 d-f f-d">
  <div class="contain_product_user_cash d-f">
    <div class="product d-f f-d admin-block-dashboard">
      <div class="parameter d-f">
        <div>
          <div class="admin_numberProduct">
            <?= $sanphamdaban ?>
          </div>
          <div class="admin_textProduct">Số lượng sản phẩm</div>
        </div>
        <div class="admin_icon_product">
          <i class="fa-solid fa-cart-plus"></i>
        </div>
      </div>
      <div class="more-info info_product d-f jf-c al-c">
        More info
        <div class="admin_icon_more-info">
          <i class="fa-solid fa-arrow-right"></i>
        </div>
      </div>
    </div>

    <!-- ---------------------------------- -->

    <div class=" d-f f-d admin-block-dashboard">
      <div class="parameter d-f admin_money">
        <div>
          <div class="admin_numberProduct">
            <?= number_format($tongdoanhthu[0]['tong_tong_gia'] *26000) ?>
          </div>
          <div class="admin_textProduct">Tổng doanh thu</div>
        </div>
        <div class="admin_icon_product">
          <i class="fa-solid fa-money-bill"></i>
        </div>
      </div>
      <div class="more-info d-f jf-c al-c info_money">
        More info
        <div class="admin_icon_more-info">
          <i class="fa-solid fa-arrow-right"></i>
        </div>
      </div>
    </div>

    <!-- ---------------------------------- -->

    <div class=" d-f f-d admin-block-dashboard">
      <div class="parameter d-f admin_user">
        <div>
          <div class="admin_numberProduct">
            <?= $tongkhachhang[0]['total_records'] ?>
          </div>
          <div class="admin_textProduct">Khách hàng</div>
        </div>
        <div class="admin_icon_product">
          <i class="fa-solid fa-user"></i>
        </div>
      </div>
      <div class="more-info d-f jf-c al-c info_user">
        More info
        <div class="admin_icon_more-info">
          <i class="fa-solid fa-user"></i>
        </div>
      </div>
    </div>

    <!-- ---------------------------------- -->
  </div>
  <!-- ---------------------Biểu đồ----------------------- -->
  <div class="canvas-chart" style="margin-top: 100px;">
    <canvas id="myChart" style="width:100%;max-width: 80%;height: 350px;"></canvas>
  </div>
</main>
<script>
  var xValues = [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150];
  var yValues = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15];
  var zValues = [6, 6, 8, 13, 9, 9, 13, 16, 14, 14, 15];

  new Chart("myChart", {
    type: "line",
    data: {
      labels: xValues,
      datasets: [{
        fill: false,
        lineTension: 0,
        backgroundColor: "rgba(0,0,255,1.0)",
        borderColor: "rgb(53, 208, 247)",
        data: yValues,

      }]
    },
    options: {
      legend: { display: false },
      scales: {
        yAxes: [{ ticks: { min: 6, max: 16 } }],
      }
    }
  });
</script>
  <div style="margin:10px;">
        <button style="padding:15px;background:rgb(9, 158, 196);border: none;border-radius:4px;"

        ><a style="color:white;" href="index.php?act=sp_ban_chay">Sản phẩm bán chạy</a></button>
        <button style="padding:15px;background:rgb(0, 157, 0); border: none;border-radius:4px;"

        ><a style="color:white;" href="">Tổng doanh thu</a></button>
        <button style="padding:15px;background:orange;border: none;border-radius:4px;"

        ><a style="color:white;" href="">Danh mục</a></button>

  </div>
