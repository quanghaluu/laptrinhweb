<?php
session_start();
if (!isset($_SESSION['tai_khoan'])) {
	header("Location: dang_nhap.php");
}

$makhach = $_POST['txtMakhach'];
$tenkhach = $_POST['txtTen'];


include("../commo/connect.php");

// Bước 2: Chàn dữ liệu vào bảng Liên hệ

$sql = "
		UPDATE `tbl_khachhang` SET 
			`tenkhach` = '" . $tenkhach . "',
			`matkhau` = '" . $_POST['txtPassword'] . "'
		WHERE `makhach` = '" . $makhach . "'
		";

// Cho thực thi câu lệnh SQL trên
mysqli_query($ketnoi, $sql);
echo '
		<script type="text/javascript">
			alert("Sửa khách hàng thành công!!!");
			window.location.href="khachhang_list.php";
		</script>';
; ?>