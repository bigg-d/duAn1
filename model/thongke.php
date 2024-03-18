<?php
function loadall_thongke($kyw = "") {
  
  // Build SQL query to select data from 'sanpham' and 'danhmuc' tables
  $sql = "SELECT danhmuc.iddm AS madm, danhmuc.tendanhmuc AS tendm, COUNT(sanpham.id) AS countsp, MIN(sanpham.price) AS minprice, MAX(sanpham.price) AS maxprice, AVG(sanpham.price) AS avgprice, SUM(sanpham.price) AS sumprice";
  
  $sql .= " FROM sanpham";
  $sql .= " LEFT JOIN danhmuc ON danhmuc.iddm = sanpham.iddm";
  $sql .= " WHERE 1";
  if($kyw!=""){
    $sql.=" and danhmuc.tendanhmuc like '%".$kyw."%'";
  }
  $sql .= " GROUP BY danhmuc.iddm";
  $sql .= " ORDER BY danhmuc.iddm DESC";

  // Execute SQL query and return the result set
  $listtk = pdo_query($sql);
  return $listtk;
}

?>