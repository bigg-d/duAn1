<main class="w-100 d-f f-d">
          <h3 style="margin: 10px 0px;">Quản Lý Bình Luận</h3>
          <div class="search_list-product-admin w-100">
          <form action="index.php?act=dsbl" method="POST" style="margin-bottom: 5px;" class="d-f form-search">
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
                <table class="w-100 table_bill-admin">
                    <thead>  
                       <th> Check </th>
                        <th> ID </th>
                        <th> Nội dung</th>
                        <th> Khách hàng</th>
                        <th>Mã sản phẩm</th>
                        <th>  Ngày bình luận</th>
                        <th>Chức Năng </th>

                    </thead>
                    <?php foreach ($listbinhluan as $binhluan) {
                        extract($binhluan);
                        // $suabl="index.php?act=suabl&id=".$id;
                        $xoabl="index.php?act=xoabl&id=".$id;
                        echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>' . $id . '</td>
                                <td style="width:300px"> ' . $noidung . '</td>
                                <td>' . $iduser . '</td>
                                <td>' . $idpro . '</td>
                                <td style="width:100px">' . $ngaybinhluan . '</td>
                                <td >                                
                                    <a class="url-delete" href="'. $xoabl.'">
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