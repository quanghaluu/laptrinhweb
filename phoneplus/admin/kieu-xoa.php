<?php
session_start();
if (!isset($_SESSION['tai_khoan'])) {
  header("Location: dang_nhap.php");
}

// Lấyid từ trên đường dẫn
$id = $_GET['id_sp'];

// Xóa bài viết có id trong bảng tbl_tainghe
// Bước 1: Kết nối đến CSDL 
include("../config/dbconfig.php");
$ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

// Bước 2: Xóa dữ liệu trong bảng Tin tức   i
$sql = "DELETE FROM `tbl_kieu_san_pham` WHERE `kieu_san_pham_id` = '" . $id . "'";

// Xem câu lệnh SQL viết có đúng hay không?
// echo $sql;

// Cho thực thi câu lệnh SQL trên
mysqli_query($ketnoi, $sql);
echo '
    <script type="text/javascript">
      alert("Xóa kiểu sản phẩm thành công!!!");
      window.location.href="kieu-list.php";
    </script>';
; ?>