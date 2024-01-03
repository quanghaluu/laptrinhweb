<?php
session_start();
if (!isset($_SESSION['tai_khoan'])) {
	header("Location: dang_nhap.php");
}

$id = $_POST['txtID'];
$tennd = $_POST['txtTen'];
//$password= $_POST['txtPassword'];


include("../commo/connect.php");

// Bước 2: Chàn dữ liệu vào bảng Liên hệ

$sql = "
		UPDATE `tbl_admin` SET 
			`ten_nguoi_dung` = '" . $tennd . "',
			`password` = '" . $_POST['txtPassword'] . "'
		WHERE `nguoi_dung_id` = '" . $id . "'
		";

// Cho thực thi câu lệnh SQL trên
mysqli_query($ketnoi, $sql);
echo '
		<script type="text/javascript">
			alert("Sửa người dùng thành công!!!");
			window.location.href="admin-list.php";
		</script>';
; ?>