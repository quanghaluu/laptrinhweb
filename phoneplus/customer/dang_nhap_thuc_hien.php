<!DOCTYPE html>
<html>

<head>
	<title> | Đăng nhập thực hiện</title>
</head>

<body>

	<?php
	// Lấy các dữ liệu bên trang Thêm mới bài viết
	$taikhoan = $_POST['txtTaiKhoan'];
	$matkhau = $_POST['txtMatKhau'];

	// Kết nối đến CSDL 
	include("../commo/connect.php");



	// Chèn dữ liệu vào bảng 
	$sql = "SELECT * FROM `tbl_khachhang` WHERE `tenkhach` = '$taikhoan' AND `matkhau` = '$matkhau' ";
	$makhach = " SELECT makhach FROM tbl_khachhang WHERE tenkhach = '$taikhoan' AND matkhau = '$matkhau' ";

	// Xem câu lệnh SQL viết có đúng hay không?
	//echo $sql;
	
	// Thực thi câu lệnh SQL trên
	$result = mysqli_query($ketnoi, $sql);

	if (mysqli_num_rows($result) == 0) {
		echo '<script type="text/javascript">
			 alert("Tài khoản mật khẩu không chính xác");
			</script>';

		header("Location: dang_nhap.php");
	} else {
		$row = mysqli_fetch_assoc($result);
		$makhach = $row['makhach'];

		session_start();
		$_SESSION['tenkhach'] = $taikhoan;
		$_SESSION['makhach'] = $makhach;

		// echo $makhach;
		// echo $taikhoan;
	
		header("Location: ../index.php");
	}
	// lỗi truy vấn makhach ra cả câu truy vấn chứ ko ra giá trị
	
	; ?>

</body>

</html>