<?php
if (is_array($bill)) {
  extract($bill[0]);
  $listbill = loadall_detail_bill($order_id);
  //  $idBill = $bill["bill_status"];
  //  echo $bill["bill_status"];

}
$arr = [
  "Đơn hàng mới (admin)",
  "Đang xử lý (admin)",
  "Đang giao hàng (admin)",
  "Giao hàng thành công",
  "Đã hủy đơn hàng (admin)",
  "Đã hủy đơn hàng (Khách hàng)",
];
?>

<main class="w-100 d-f f-d">
  <h3>Update Bill</h3>
  <div class="search_list-product-admin w-100 d-f">
    <table style="display:block; padding: 20px 100px; border-collapse:collapse; border:1px" border='1'>
      <tr>
        <th style="padding:10px">Image</th>
        <th style="padding:10px">Product</th>
        <th style="padding:10px">Price</th>
        <th style="padding:10px">Quantity</th>
        <th style="padding:10px">Total</th>
      </tr>
      <?php foreach ($listbill as $key => $bill) {
        $product = loadone_sanpham($bill['product_id']);  
      ?>
      <tr>
        <td style="padding:16px"><img src="../upload/<?= $product['img']?>" style="width:100px" alt=""></td>
        <td style="padding:16px"><?= $product['name']?></td>
        <td style="padding:16px"><?= number_format($product['price'])?></td>
        <td style="padding:16px"><?=$bill['quantity']?></td>
        <td style="padding:16px"><?= number_format($product['price'] * $bill['quantity'])?></td>
      </tr>
      <?php }?>
    </table> 
    <form action="index.php?act=updatebill" class="general-form" method="post" enctype="multipart/form-data">
      <div class="block_form d-f f-d">
        <h2 style="margin-bottom: 14px">Tổng giá trị đơn hàng:   <?= number_format($total_amount * 26000)?></h2>
        <label for="">TÌNH TRẠNG ĐƠN HÀNG</label>
        <?php if ($process >= 0 && $process < 3) { ?>
          <select name="ttdh" id="">
            <?php for ($i = 0; $i < count($arr); $i++) { ?>

              <option <?php if ($i == 5 || $i == 6)
                echo "disabled"; ?>     <?php if ($i === $process) {
                        echo "selected";
                      } else {
                        echo " ";
                      } ?> value="<?= $i ?>">
                <?= $arr[$i]; ?>
              </option>

            <?php } ?>
          </select>
        </div>
        <div class="block_form d-f g-10 al-c">
          <input type="hidden" name="id" value="<?= $order_id ?>">
          <input type="submit" value="Cập Nhập" class="submit-general-form" name="capnhap">
          <input type="reset" value="Hủy" class="cancel-general-form">
          <a href="index.php?act=listbill" style="display:block">
            <input type="button" value="Quay trở lại" style="padding: 8.5px;" class="">
          </a>
          <!-- <a href="index.php?act=lisdm"><input type="button" value="Danh Mục"></a> -->
        </div>
      <?php } else if ($process == 5) { ?>

          <select name="ttdh" id="">
          <?php for ($i = 0; $i < count($arr); $i++) { ?>

              <option disabled <?php if ($i === $process) {
                echo "selected";
              } else {
                echo " ";
              } ?> value="<?= $i ?>">
              <?= $arr[$i]; ?>
              </option>

          <?php } ?>

          </select>
      </div>
      <div class="block_form d-f g-10 al-c">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="button" onclick="alert('Khách hàng đã hủy đơn hàng, không thể cập nhật')" value="Cập Nhập"
          class="submit-general-form" name="capnhap">
        <input type="reset" value="Hủy" class="cancel-general-form">
        <a href="index.php?act=listbill" style="display:block">
          <input type="button" value="Quay trở lại" style="padding: 8.5px;" class="">
        </a>
        <!-- <a href="index.php?act=lisdm"><input type="button" value="Danh Mục"></a> -->
      </div>

  <?php } else if ($process == 3) { ?>

        <select name="ttdh" id="">
      <?php for ($i = 0; $i < count($arr); $i++) { ?>

            <option disabled <?php if ($i === $process) {
              echo "selected";
            } else {
              echo " ";
            } ?> value="<?= $i ?>">
          <?= $arr[$i]; ?>
            </option>

      <?php } ?>

        </select>
        </div>
        <div class="block_form d-f g-10 al-c">
          <input type="hidden" name="id" value="<?= $id ?>">
          <input type="button" onclick="alert('Khách hàng đã nhận đơn hàng, không thể cập nhật')" value="Cập Nhập"
            class="submit-general-form" name="capnhap">
          <input type="reset" value="Hủy" class="cancel-general-form">
          <a href="index.php?act=listbill" style="display:block">
            <input type="button" value="Quay trở lại" style="padding: 8.5px;" class="">
          </a>
          <!-- <a href="index.php?act=lisdm"><input type="button" value="Danh Mục"></a> -->
        </div>
  <?php } ?>



  <?php
  if (isset($thongbao) && ($thongbao)) {
    echo $thongbao;
  }

  ?>
  </form>
  </div>
</main>