<?php
session_start();
if (!isset($_SESSION['tai_khoan'])) {
	header("Location: dang_nhap.php");
}

// Lấy các dữ liệu bên trang Thêm mới bài viết
$tendm = $_POST['txtTenDm'];

// Chàn dữ liệu vào bảng tbl_tin_tuc
// Bước 1: Kết nối đến CSDL 
include("../commo/connect.php");

// Bước 2: Chàn dữ liệu vào bảng Liên hệ
$sql = "
	INSERT INTO `tbl_danh_muc` (
		`danh_muc_id`, 
		`ten_danh_muc`) 
	VALUES (
		NULL, 
	
		'" . $tendm . "')";

// Xem câu lệnh SQL viết có đúng hay không?
// echo $sql;

// Cho thực thi câu lệnh SQL trên
mysqli_query($ketnoi, $sql);
echo '
		<script type="text/javascript">
			alert("Thêm mới danh mục thành công!!!");
			window.location.href="dm-list.php";
		</script>';
; ?>