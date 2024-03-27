<main class="w-100 d-f f-d">
               
               <h1 class="title_product_new">Đơn hàng </h1>
               
     
              <!-- ----------------------------------- Form hiển thị giỏ hàng ----v--------------------- -->
              <section class="contain-form-submit-cart w-100 d-f f-d al-c">
              <div class="search_list-product-admin w-100">
              <form action="" class="d-f form-search">
              <input
                type="text"
                placeholder="Tìm kiếm theo tên sản phẩm..."
                class="input-search"
              />
              <input
                type="submit"
                class="submit-search-form"
                value="Tìm kiếm"
              />
            </form>  
              <form action="index.php?act=listbill" class="form-submit-cart w-100">         
               <table class="w-100 table_bill-admin">
      
                <thead>
                  <tr>
                    <th>Check</th>                   
                    <th>ID</th>
                    <th>Khách hàng</th>
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
                      $suabill="index.php?act=suabill&id=".$id;
                      $xoabill="index.php?act=xoabill&id=".$id;
                        $kh=$bill["bill_name"].'
                        <br> '.$bill["bill_address"].'
                        <br>'.$bill["bill_tel"];
                        $ttdh= getStatus($bill["bill_status"],1);
                        $countsp=loadall_cart_count($bill["id"]);
                        
                        echo '<tr>
                        <td><input type="checkbox"></td>                        
                        <td class="td_sp">'.$bill['id'].'</td>
                        <td class="td_sp">'.$kh.'</td>
                        <td class="td_sp">'.$countsp.'</td>
                        <td class="td_sp"><strong>'.number_format($bill["tatal"]).'</strong> VNĐ</td>
                        <td class="td_sp">'.$ttdh.'</td>
                        <td style="width:70px;" class="td_sp">'.$bill['ngaydathang'].'</td>
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