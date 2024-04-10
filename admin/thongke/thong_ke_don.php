<main class="w-100 d-f f-d">

<div class="row">
    <div class="row formtitle ">
        <h1>THỐNG KÊ Đơn Hàng - <?php  echo isset($_trang_thai) ? $lua_chon=sw_chon($_trang_thai) : 'Tất Cả' ?></h1>
    </div>
    
    <div class="search_list-product-admin w-100">
    
    <form style="line-height:30px; display:flex;padding:12px;margin-bottom: 20px;" action="index.php?act=tk_don_hang" method="post">
            <div style="margin-right: 10px;">
                <label for="">Trạng Thái Đơn Hàng</label><br>
                <select name="chon_ngay" id="">
                <option value="6"><?php  echo isset($_trang_thai) ? $lua_chon=sw_chon($_trang_thai) : 'Tất Cả' ?></option>
                <option value="0">Tiếp Nhận Đơn</option>
                <option value="1">Đang Xử Lý</option>
                <option value="2">Đang Giao Hàng</option>
                <option value="3">Giao Hàng Thành Công</option>
                <option value="4">Đã Hủy(admin)</option>
                <option value="5">Đã Hủy(khách hàng)</option>
            </select>
            </div>
            <div style="margin-right: 10px;">
                <label for="">Ngày Bắt Đầu</label><br>
                <input type="text" name="start_date"  placeholder="yyyy-mm-dd" >
            </div>
            <div style="margin-right: 10px;">
                <label for="">Ngày Kết Thúc</label><br>
                <input type="text" name="end_date"  placeholder="yyyy-mm-dd" >
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
                    <th class="th_sp">Mã Đơn</th> 
                    <th class="th_sp">Người Đặt</th>
                    <th class="th_sp">Ngày Tạo Đơn</th>
                    <th class="th_sp">Trang Thái</th>
                    <th class="th_sp">Tổng Tiền</th>
                </tr>
                </thead>
                <?php $count = 1;
                 foreach($_tk_don as $value){
                    ?>
                    <tr>
                    <td><?php echo $count ?></td>
                    <td><?php echo $value['order_id'] ?></td>
                    <td><?php echo $value['username'] ?></td>
                    <td><?php echo $value['order_date'] ?></td>
                    <td><?php echo $trang_thai= sw_chon($value['process']);?></td>
                    <td><?php echo number_format($value['total_amount'] * 26000) ?></td>
                    </tr>
                    <?php
                    $count++;
            }
            ?>
               
            </table>
        </div>
        <table class="w-100 table_bill-admin">
        <thead>
                <tr class="maloai">
                    
                    <th class="th_sp">Tổng Đơn</th>
                    <th class="th_sp">Tổng Tiền Nhận</th>
                </tr>
                </thead>
                <tr>
                    <td><?php  echo isset($tong_don)? $tong_don : ''; ?></td>
                    <td><?php  echo isset($tong_tien)? $tong_tien : ''; ?></td>
                </tr>
            </table>
            <hr>
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
