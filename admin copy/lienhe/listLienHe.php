<main class="w-100 d-f f-d">
          <h3 style="margin: 10px 0px;">Quản Lý liên hệ</h3>
          <div class="search_list-product-admin w-100">
          <!-- <form action="" style="margin-bottom: 5px;" class="d-f form-search">
              <input
                type="text"
                placeholder="Tìm kiếm theo ID bình luận..."
                class="input-search"
              />
              <input
                type="submit"
                class="submit-search-form"
                value="Tìm kiếm"
              />
            </form>   -->
            <form action="" class="d-f ">
                <table border="1px" class="w-100 table_bill-admin">
                    <thead>  
                       <th style="width: 50px;">id</th>
                       <th style="width: 10%;"> Họ và Tên</th>
                        <th style="width: 15%;"> Địa Chỉ </th>
                        <th style="width: 10%;"> Số Điện Thoại</th>
                        <th style="width: 10%;"> Email</th>
                        <th style="width: 50%; ">Lời nhắn</th>

                    </thead>
                    <?php foreach ($listlienhe as $listlienhe) {
                        extract($listlienhe);
                        // $suabl="index.php?act=suabl&id=".$id;
                        $xoalh="index.php?act=xoalh&id=".$id;
                        echo '<tr>
                                <td style="padding: 5px; ">' . $id . '</td>
                                <td  style="padding: 5px; "> ' . $hovaten . '</td>
                                <td style="padding: 5px; ">' . $diachi . '</td>
                                <td style="padding: 5px; ">' . $dienthoai . '</td>
                                <td style="padding: 5px; ">' . $email . '</td>
                                <td style="width: 300px;padding: 5px; "> <p >' . $loinhan . '</p></td>
                                <td >                                
                                    <a class="url-delete" href="'. $xoalh.'">
                                      <i class="fa-solid fa-trash"></i>
                                    </a> 
                                 </td>
                                
                            </tr>';
                    }
                    // <a href="'. $suabl.'"><input type="button" value="Sửa">
                    ?>
                  </table>
            </form>
                 
          </div>
        </main>