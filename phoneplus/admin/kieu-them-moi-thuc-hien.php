<?php
session_start();
if (!isset($_SESSION['tai_khoan'])) {
	header("Location: dang_nhap.php");
}


$tendm = $_POST['txtTenDm'];

// Bước 1: Kết nối đến CSDL 
include("../commo/connect.php");

// Bước 2: Chàn dữ liệu vào bảng tbl_kieu_san_pham
$sql = "
	INSERT INTO `tbl_kieu_san_pham` (
		`kieu_san_pham_id`, 
		`kieu_san_pham`) 
	VALUES (
		NULL, 
	
		'" . $tendm . "')";

// Xem câu lệnh SQL viết có đúng hay không?
// echo $sql;

// Cho thực thi câu lệnh SQL trên
mysqli_query($ketnoi, $sql);
echo '
		<script type="text/javascript">
			alert("Thêm mới loại sản phẩm thành công!!!");
			window.location.href="kieu-list.php";
		</script>';
; ?>