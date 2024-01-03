<?php 
	session_start();
	if (!isset($_SESSION['tai_khoan'])) {
	  header("Location: dang_nhap.php");
	}

	// Lấy các dữ liệu bên trang Thêm mới bài viết
	$tennd = $_POST['txtTen'];
	$password = $_POST['txtPassword'];

	// Chàn dữ liệu vào bảng tbl_admin
	// Bước 1: Kết nối đến CSDL 
	include("../commo/connect.php");

	// Bước 2: Chàn dữ liệu vào bảng tbl_admin
	$sql = "
	INSERT INTO `tbl_admin` (
		`nguoi_dung_id`, 
		`ten_nguoi_dung`,
		`password`) 
	VALUES (
		NULL, 
	
		'".$tennd."',
		'".$_POST['txtPassword']."')";
	
	// Xem câu lệnh SQL viết có đúng hay không?
	// echo $sql;

	// Cho thực thi câu lệnh SQL trên
	mysqli_query($ketnoi, $sql);
	echo '
		<script type="text/javascript">
			alert("Thêm mới người dùng thành công!!!");
			window.location.href="admin-list.php";
		</script>';
;?>