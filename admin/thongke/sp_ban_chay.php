<main class="w-100 d-f f-d">

<div class="row">
    <div class="row formtitle ">
        <h1>THỐNG KÊ SẢN PHẨM Bán Chạy</h1>
    </div>
    
    <div class="search_list-product-admin w-100">
    <form action="" class="d-f form-search" method="post">
              <input
                type="text"
                placeholder="Tìm kiếm theo tên danh mục..."
                class="input-search"
                name="kyw"
              />
              <input
                type="submit"
                class="submit-search-form"
                value="Tìm kiếm"
                name="listok"
              />
    </form>  
    <form style="line-height:30px; display:flex;padding:12px;margin-bottom: 20px;" action="index.php?act=sp_ban_chay" method="post">
            <div style="margin-right: 10px;">
                <label for="">Thời Gian</label><br>
                <select name="chon_ngay" id="">
                <option value="0"><?php echo isset($_chon_ngay)? $_chon_ngay: '' ?> Ngày Trước</option>
                <option value="7">7 Ngày Trước</option>
                <option value="14">14 Ngày Trước</option>
                <option value="60">60 Ngày Trước</option>
                <option value="90">90 Ngày Trước</option>
            </select>
            </div>
            <div style="margin-right: 10px;">
                <label for="">Ngày cụ thể</label><br>
                <input type="text" name="start_date"  placeholder="yyyy-mm-dd" >
            </div>
            <!-- <label for="">Ngày Kết Thúc</label><br>
            <input type="text" name="end_date" placeholder="yyyy-mm-dd" ><br><br> -->
            <div>
                <br>
            <input style="height:20px; padding:5px 10px;background:rgb(32, 169, 255);border: none;border-radius:4px; color:white;" type="submit" value="Lọc" name="done_date" id="">
            </div>
        </form>
            <table class="w-100 table_bill-admin">
                <thead>
                <tr class="maloai">
                    <th class="th_sp">STT</th>
                    <th class="th_sp">TÊN SẢN PHẨM</th>
                    <th class="th_sp">TÊN DANH MỤC</th>
                    <th class="th_sp">GIÁ BÁN</th>
                    <th class="th_sp">SỐ LƯỢNG BÁN</th>
                    <th class="th_sp">TỔNG TIỀN</th>
                    <th class="th_sp">NGÀY</th>
                  </tr>
                </thead>
                <?php $count = 1;
                 foreach($_sp_ban_chay as $value){
                    ?>
                    <tr>
                    <td><?php echo $count ?></td>
                    <td><?php echo $value['name'] ?></td>
                    <td><?php echo $value['tendanhmuc'] ?></td>
                    <td><?php echo $value['price'] ?></td>
                    <td><?php echo $value['quantity'] ?></td>
                    <td><?php echo $value['tongtien'] ?></td>
                    <td><?php echo $value['order_date'] ?></td>
                    </tr>
                    <?php
                    $count++;
            }
            ?>
               
            </table>
        </div>
        
    <!-- </div> -->

</div> 
<!-- ---------------------Biểu đồ----------------------- -->
<div class="canvas-chart" style="margin-top: 100px;">
    <canvas id="myChart" style="width:100%;max-width: 80%;height: 350px;"></canvas>
  </div>
</main>
<script>
  var xValues = [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, ''];
  var yValues = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15];
  var zValues = [6, 6, 8, 13, 9, 9, 13, 16, 14, 14, 15];

  new Chart("myChart", {
    type: "line",
    data: {
      labels: xValues,
    //   labels: zValues,
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
</main>
