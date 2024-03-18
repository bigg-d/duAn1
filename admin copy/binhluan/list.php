<main class="w-100 d-f f-d">
          <h3 style="margin: 10px 0px;">Quản Lý Bình Luận</h3>
          <div class="search_list-product-admin w-100">
          <form action="index.php?act=dsbl" method="POST" style="margin-bottom: 5px;" class="d-f form-search" >
              <input
                type="text"
                placeholder="Tìm kiếm theo ID bình luận..."
                class="input-search"
                name="findComment"
              />
              <input
                type="submit"
                class="submit-search-form"
                value="Tìm kiếm"
                name="findCommentSubmit"
              />
            </form>  
            <form action="" class="d-f ">
                <table class="w-100 table_bill-admin" border="1">
                    <thead>  
                       <th> Check </th>
                        <th> ID </th>
                        <th> Nội dung</th>
                        <th> Khách hàng</th>
                        <th>Sản phẩm</th>
                        <th>  Ngày bình luận</th>

                    </thead>
                    <?php foreach ($listbinhluan as $binhluan) {
                        extract($binhluan);
                        $taikhoan = loadone_taikhoan($iduser);
                        $sanpham = loadone_sanpham($idproduct);
                        var_dump($taikhoan);
                        echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>' . $id . '</td>
                                <td style="width:300px"> ' . $noidung . '</td>
                                <td>' . $taikhoan[0]['username'] . '</td>
                                <td style="display:flex"> <img src="../upload/'. $sanpham['img'].'"style="width:100px"/>'
                                                                  
                                 . $sanpham['name'] . '</td>
                                <td style="width:100px">' . $ngaybinhluan . '</td>
                            </tr>';
                    }
                    ?>
                  </table>
            </form>
                 
          </div>
        </main>