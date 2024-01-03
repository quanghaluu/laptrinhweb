<?php
session_start();
if (!isset($_SESSION['tai_khoan'])) {
  header("Location: dang_nhap.php");
}

// Lấyid từ trên đường dẫn
$id = $_GET['id_sp'];

// Xóa bài viết có id trong bảng tbl_tainghe
// Bước 1: Kết nối đến CSDL 
include("../commo/connect.php");

// Bước 2: Xóa dữ liệu trong bảng Tin tức   i
$sql = "DELETE FROM `tbl_danh_muc` WHERE `danh_muc_id` = '" . $id . "'";

// Xem câu lệnh SQL viết có đúng hay không?
// echo $sql;

// Cho thực thi câu lệnh SQL trên
mysqli_query($ketnoi, $sql);
echo '
    <script type="text/javascript">
      alert("Xóa danh mục thành công!!!");
      window.location.href="dm-list.php";
    </script>';
; ?>