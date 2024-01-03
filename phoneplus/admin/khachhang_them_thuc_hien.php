<?php
session_start();
if (!isset($_SESSION['tai_khoan'])) {
	header("Location: dang_nhap.php");
}

$tenkhach = $_POST['txtTen'];
$password = $_POST['txtPassword'];

include("../commo/connect.php");

$sql = "
	INSERT INTO `tbl_khachhang` (
		`makhach`, 
		`tenkhach`,
		`matkhau`) 
	VALUES (
		NULL, 
	
		'" . $tenkhach . "',
		'" . $_POST['txtPassword'] . "')";

mysqli_query($ketnoi, $sql);
echo '
		<script type="text/javascript">
			alert("Thêm mới người dùng thành công!!!");
			window.location.href="khachhang_list.php";
		</script>';
; ?>