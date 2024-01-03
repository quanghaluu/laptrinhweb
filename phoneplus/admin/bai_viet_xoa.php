<?php
session_start();
if (!isset($_SESSION['tai_khoan'])) {
	header("Location: dang_nhap.php");
}

// Lấyid từ trên đường dẫn
$id = $_GET['id'];

// Xóa bài viết có id trong bảng tbl_tin_tuc
// Bước 1: Kết nối đến CSDL 
include("../config/dbconfig.php");
$ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

// Bước 2: Xóa dữ liệu trong bảng Tin tức		i
$sql = "DELETE FROM `tbl_tin_tuc` WHERE `tin_tuc_id` = '" . $id . "'";

// Xem câu lệnh SQL viết có đúng hay không?
// echo $sql;

// Cho thực thi câu lệnh SQL trên
mysqli_query($ketnoi, $sql);
echo '
		<script type="text/javascript">
			alert("Xóa tin tức thành công!!!");
			window.location.href="tin_tuc_quan_tri.php";
		</script>';
; ?>