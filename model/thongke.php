<?php
function loadall_thongke($kyw = "")
{

  // Build SQL query to select data from 'sanpham' and 'danhmuc' tables
  $sql = "SELECT danhmuc.iddm AS madm, danhmuc.tendanhmuc AS tendm, COUNT(sanpham.id) AS countsp, MIN(sanpham.price) AS minprice, MAX(sanpham.price) AS maxprice, AVG(sanpham.price) AS avgprice, SUM(sanpham.price) AS sumprice";

  $sql .= " FROM sanpham";
  $sql .= " LEFT JOIN danhmuc ON danhmuc.iddm = sanpham.iddm";
  $sql .= " WHERE 1";
  if ($kyw != "") {
    $sql .= " and danhmuc.tendanhmuc like '%" . $kyw . "%'";
  }
  $sql .= " GROUP BY danhmuc.iddm";
  $sql .= " ORDER BY danhmuc.iddm DESC";

  // Execute SQL query and return the result set
  $listtk = pdo_query($sql);
  return $listtk;
}

function tongsanphamdaban()
{
  $sql = "SELECT SUM(dhct.quantity) AS tong_so_san_pham
FROM orders AS dh
JOIN orders_detail AS dhct ON dh.order_id = dhct.order_id
WHERE dh.process = 3";
  $result = pdo_query($sql);
  return $result;
}
function tongdoanhthu(){
  $sql = "SELECT SUM(total_amount) AS tong_tong_gia
  FROM orders
  WHERE process = 3";
  $result = pdo_query($sql);
  return $result;
}
// function loc_ngay_truoc_sp(){

// }
function loc_date_sp($a,$b){
  $sql ="SELECT sanpham.name
                    ,sanpham.price,
                    danhmuc.tendanhmuc,
                    orders_detail.quantity,
                    (orders_detail.quantity * sanpham.price) AS tongtien,
                    order_date
    From sanpham JOIN orders_detail 
    ON sanpham.id = orders_detail.id JOIN orders 
    ON orders_detail.order_id = orders.order_id JOIN danhmuc
    ON sanpham.iddm = danhmuc.iddm
    WHERE process = 3 AND orders.order_id =  orders_detail.order_id  AND order_date BETWEEN '$a 00:00' AND '$b 24:00'
    ORDER BY orders_detail.quantity DESC ;";
    $result = pdo_query($sql);
    return $result;
}
function loc_sp_theo_ngay($a){
  $sql ="SELECT sanpham.name
                    ,sanpham.price,
                    danhmuc.tendanhmuc,
                    orders_detail.quantity,
                    (orders_detail.quantity * sanpham.price) AS tongtien,
                    order_date
    From sanpham JOIN orders_detail 
    ON sanpham.id = orders_detail.id JOIN orders 
    ON orders_detail.order_id = orders.order_id JOIN danhmuc
    ON sanpham.iddm = danhmuc.iddm
    WHERE process = 3 AND orders.order_id =  orders_detail.order_id  and orders.order_date < ( CURRENT_DATE - INTERVAL $a DAY)  
    ORDER BY orders_detail.quantity DESC ;";
    $result = pdo_query($sql);
    return $result;
}
function  sp_ban_chay(){
  $sql ="SELECT sanpham.name
                    ,sanpham.price,
                    danhmuc.tendanhmuc,
                    orders_detail.quantity,
                    (orders_detail.quantity * sanpham.price) AS tongtien,
                    order_date
    From sanpham JOIN orders_detail 
    ON sanpham.id = orders_detail.id JOIN orders 
    ON orders_detail.order_id = orders.order_id JOIN danhmuc
    ON sanpham.iddm = danhmuc.iddm
    WHERE process = 3 AND orders.order_id =  orders_detail.order_id 
    ORDER BY orders_detail.quantity DESC
    ;"; 
    
    $result = pdo_query($sql);
    return $result;
}
function tk_don(){ 
    $sql="SELECT order_id,username,order_date,process,total_amount,
    (SELECT COUNT(*) FROM orders ) as tong_don_6 ,(SELECT SUM(total_amount) FROM orders ) as tong_tien_6,
    (SELECT COUNT(process) FROM orders WHERE process  =0 ) as tong_don_0 ,(SELECT SUM(total_amount) FROM orders WHERE process  =0 ) as tong_tien_0,
    (SELECT COUNT(process) FROM orders WHERE process  =1 ) as tong_don_1 ,(SELECT SUM(total_amount) FROM orders WHERE process  =1 ) as tong_tien_1,
    (SELECT COUNT(process) FROM orders WHERE process  =2 ) as tong_don_2 ,(SELECT SUM(total_amount) FROM orders WHERE process  =2 ) as tong_tien_2,
    (SELECT COUNT(process) FROM orders WHERE process  =3 ) as tong_don_3 ,(SELECT SUM(total_amount) FROM orders WHERE process  =3 ) as tong_tien_3,
    (SELECT COUNT(process) FROM orders WHERE process  =4 ) as tong_don_4 ,(SELECT SUM(total_amount) FROM orders WHERE process  =4 ) as tong_tien_4,
    (SELECT COUNT(process) FROM orders WHERE process  =5 ) as tong_don_0 ,(SELECT SUM(total_amount) FROM orders WHERE process  =5 ) as tong_tien_5
       FROM orders JOIN taikhoan 
       WHERE id = customer_id
       ORDER BY total_amount DESC";
    $result = pdo_query($sql);
    return $result;
}
function trang_thai_don($a){ 
    $sql="SELECT order_id,username,order_date,process,total_amount
          FROM orders JOIN taikhoan
          WHERE id = customer_id AND process = $a
    	    ORDER BY total_amount DESC";
    $result = pdo_query($sql);
    return $result;
}
function loc_don_ngay($a,$b){ 
    $sql="SELECT order_id,username,order_date,process,total_amount,(SELECT COUNT(order_id) FROM orders WHERE order_date BETWEEN '$a 00:00' AND '$b 24:00') AS tong_don, (SELECT SUM(total_amount) FROM orders WHERE order_date BETWEEN '$a 00:00' AND '$b 24:00') as tong_tien
    FROM orders JOIN taikhoan
    WHERE id = customer_id 
    AND order_date BETWEEN '$a 00:00' AND '$b 24:00' 
    ORDER BY total_amount DESC";
    $result = pdo_query($sql);
    return $result;
}
function sw_chon($a){
  switch ($a) {
    case 0:
        $trang_thai = 'Tiếp Nhận Đơn';
        break;
    case 1:
        $trang_thai = 'Đang Xử Lý';
        break;
    case 2:
        $trang_thai = 'Đang Giao Hàng';
        break;
    case 3:
        $trang_thai = 'Giao Hàng Thành Công';
        break;
    case 4:
        $trang_thai = 'Đã Hủy Đơn (admin)';
        break;
    case 4:
        $trang_thai = 'Đã Hủy Đơn (khách hàng)';
        break;
    case 5  :
        $trang_thai = 'Đã Hủy Đơn (khách hàng)';
        break;
    case 6  :
        $trang_thai = 'Tất Cả';
        break;
    
    default:
        # code...
        break;
      }
      return $trang_thai;
}
?>