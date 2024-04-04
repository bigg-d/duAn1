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

?>