<?php
session_start();
if (!isset($_SESSION['tai_khoan'])) {
  header("Location: dang_nhap.php");
}

// Lấyid từ trên đường dẫn
$id = $_GET['id_nd'];

// Xóa bài viết có id trong bảng tbl_admin
// Bước 1: Kết nối đến CSDL 
include("../commo/connect.php");

// Bước 2: Xóa dữ liệu trong bảng tbl_admin   i
$sql = "DELETE FROM `tbl_admin` WHERE `nguoi_dung_id` = '" . $id . "'";

// Xem câu lệnh SQL viết có đúng hay không?
// echo $sql;

// Cho thực thi câu lệnh SQL trên
mysqli_query($ketnoi, $sql);
echo '
    <script type="text/javascript">
      alert("Xóa người dùng thành công!!!");
      window.location.href="admin-list.php";
    </script>';
; ?>