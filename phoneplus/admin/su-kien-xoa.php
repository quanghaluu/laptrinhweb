<?php
session_start();
if (!isset($_SESSION['tai_khoan'])) {
  header("Location: dang_nhap.php");
}

// Lấyid từ trên đường dẫn
$id = $_GET['id'];

// Xóa bài viết có id trong bảng tbl_su_kien
// Bước 1: Kết nối đến CSDL 
include("../commo/connect.php");

// Bước 2: Xóa dữ liệu trong bảng tbl_su_kien   
$sql = "DELETE FROM `tbl_su_kien` WHERE `su_kien_id` = '" . $id . "'";

// Xem câu lệnh SQL viết có đúng hay không?
// echo $sql;

// Cho thực thi câu lệnh SQL trên
mysqli_query($ketnoi, $sql);
echo '
    <script type="text/javascript">
      alert("Xóa ảnh thành công!!!");
      window.location.href="su-kien-list.php";
    </script>';
; ?>