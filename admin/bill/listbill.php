<main class="w-100 d-f f-d">
               
               <h1 class="title_product_new">Đơn hàng </h1>
               
     
              <!-- ----------------------------------- Form hiển thị giỏ hàng ----v--------------------- -->
              <section class="contain-form-submit-cart w-100 d-f f-d al-c">
              <div class="search_list-product-admin w-100">
              <form action="index.php?act=listbill" method="post" class="d-f form-search">
              <input
                type="email"
                placeholder="Tìm kiếm theo email..."
                class="input-search"
                name="email"
              />
              <input
                type="submit"
                class="submit-search-form"
                value="Tìm kiếm"
                name="submit"
              />
            </form>  
              <form action="index.php?act=listbill" class="form-submit-cart w-100">         
               <table class="w-100 table_bill-admin">
      
                <thead>
                  <tr>
                    <!-- <th>Check</th>                    -->
                    <th>ID</th>
                    <th>Khách hàng</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Số lượng</th>
                    <th>Giá trị đơn </th>
                    <th>Tình trạng đơn </th>
                    <th>Ngày đặt </th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                  <tbody>
                <?php
                    foreach($listbill as $bill){
                      extract($bill);
                      $suabill="index.php?act=suabill&id=".$order_id;
                      $xoabill="index.php?act=xoabill&id=".$order_id;
                        // $kh=$order_id.
                      '
                        <br>'.$recipient_phone;
                        $ttdh= getStatus($process);
                        $countsp=countItemInOrder($order_id);
                        $total_product = $countsp[0]['TotalQuantity'];
                        
                        echo '<tr>
                        <td class="td_sp">'.$order_id.'</td>
                        <td class="td_sp">'.$recipient_name.'</td>
                        <td class="td_sp">'.$recipient_email.'</td>
                        <td class="td_sp">'.$recipient_address.'</td>
                        <td class="td_sp">'.$total_product.'</td>
                        <td class="td_sp"><strong>'.number_format(($total_amount + $shipping_fee) * 26000).'</strong> VNĐ</td>
                        <td class="td_sp">'.$ttdh.'</td>
                        <td style="width:70px;" class="td_sp">'.$order_date.'</td>
                        <td class="td_sp"> 
                                  <a class="url-edit" href="'. $suabill.'">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                  </a> 
                                
                                </td>
                    </tr>';
                    }

                
                
                ?>
              
                
                  
                   
     
                </tbody>
      
      
               </table>
              
               
              </form>
            </div>
            <a href="index.php?act=listbill" class="upgradeStatusAdmin" href="">Cập nhật trạng thái</a>
              </section>
              </main>