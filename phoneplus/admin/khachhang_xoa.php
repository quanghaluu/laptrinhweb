<?php
session_start();
if (!isset($_SESSION['tai_khoan'])) {
  header("Location: dang_nhap.php");
}

$makhach = $_GET['makhach'];

include("../commo/connect.php");

$sql = "DELETE FROM `tbl_khachhang` WHERE `makhach` = '" . $makhach . "'";

mysqli_query($ketnoi, $sql);
echo '
    <script type="text/javascript">
      alert("Xóa khách hàng thành công!!!");
      window.location.href="khachhang_list.php";
    </script>';
; ?>