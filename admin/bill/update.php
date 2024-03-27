<?php
    if(is_array($bill)){
        extract($bill);
       $idBill = $bill["bill_status"];
      //  echo $bill["bill_status"];
        
    }
    $arr = [
      "Đơn hàng mới (admin)",
      "Đang xử lý (admin)",
      "Đang giao hàng (admin)",
      "Đã giao hàng (admin)",
      "Đã hủy đơn hàng (admin)",
      "Đã hủy đơn hàng (Khách hàng)",
      "Đã nhận đơn hàng (Khách hàng)"
    ];
?>

<main class="w-100 d-f f-d">
          <h3>Update Bill</h3>
          <div class="search_list-product-admin w-100 d-f jf-c">
            <form action="index.php?act=updatebill" class="general-form" method="post" enctype="multipart/form-data">
              <div class="block_form d-f f-d">
                <label for="">TÌNH TRẠNG ĐƠN HÀNG</label>
                <?php if( $idBill >= 0 &&  $idBill <= 4){ ?>
                  <select name="ttdh" id="">
                    <?php for($i = 0 ; $i < count($arr);$i++){ ?>

                      <option 
                      <?php if($i == 5 || $i == 6)echo "disabled";?>
                      <?php if($i === $idBill){echo "selected";}else {echo " ";}  ?> 
                        value="<?= $i ?>">
                        <?= $arr[$i] ;?>
                      </option>

                    <?php } ?>
                    </select>
                    </div>
                    <div class="block_form d-f g-10 al-c">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input type="submit" value="Cập Nhập" class="submit-general-form" name="capnhap">
                    <input type="reset" value="Hủy" class="cancel-general-form" >
                    <a href="index.php?act=listbill" style="display:block">
                    <input type="button" value="Quay trở lại" style="padding: 8.5px;" class="" >
                    </a>
                    <!-- <a href="index.php?act=lisdm"><input type="button" value="Danh Mục"></a> -->
                    </div>
                  <?php } else if($idBill  == 5){ ?>

                    <select name="ttdh" id="">
                    <?php for($i = 0 ; $i < count($arr);$i++){ ?>

                      <option disabled
                      <?php if($i === $idBill){echo "selected";}else {echo " ";}  ?> 
                       value="<?= $i ?>"
                       >
                        <?= $arr[$i] ;?>
                      </option>

                   <?php } ?>
                   
                  </select>
                  </div>
                  <div class="block_form d-f g-10 al-c">
                  <input type="hidden" name="id" value="<?=$id?>">
                  <input type="button" onclick="alert('Khách hàng đã hủy đơn hàng, không thể cập nhật')" value="Cập Nhập" class="submit-general-form" name="capnhap">
                  <input type="reset" value="Hủy" class="cancel-general-form" >
                  <a href="index.php?act=listbill" style="display:block">
                  <input type="button" value="Quay trở lại" style="padding: 8.5px;" class="" >
                  </a>
                  <!-- <a href="index.php?act=lisdm"><input type="button" value="Danh Mục"></a> -->
                  </div>

                  <?php } else if($idBill  == 6){ ?>

                    <select name="ttdh" id="">
                    <?php for($i = 0 ; $i < count($arr);$i++){ ?>

                      <option disabled
                      <?php if($i === $idBill){echo "selected";}else {echo " ";}  ?> 
                       value="<?= $i ?>"
                       >
                        <?= $arr[$i] ;?>
                      </option>

                   <?php } ?>
                   
                  </select>
                  </div>
                  <div class="block_form d-f g-10 al-c">
                  <input type="hidden" name="id" value="<?=$id?>">
                  <input type="button" onclick="alert('Khách hàng đã nhận đơn hàng, không thể cập nhật')" value="Cập Nhập" class="submit-general-form" name="capnhap">
                  <input type="reset" value="Hủy" class="cancel-general-form" >
                  <a href="index.php?act=listbill" style="display:block">
                  <input type="button" value="Quay trở lại" style="padding: 8.5px;" class="" >
                  </a>
                  <!-- <a href="index.php?act=lisdm"><input type="button" value="Danh Mục"></a> -->
                  </div>
                    <?php } ?>
              
                
             
              <?php 
                        if(isset($thongbao)&&($thongbao)){
                            echo $thongbao;
                        }
                        
                    ?>
            </form>
          </div>
</main>