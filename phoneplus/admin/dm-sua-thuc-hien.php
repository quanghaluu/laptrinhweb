<?php
session_start();
if (!isset($_SESSION['tai_khoan'])) {
	header("Location: dang_nhap.php");
}

// Lấy các dữ liệu bên trang Thêm mới bài viết
$id = $_POST['txtID'];
$tendm = $_POST['txtTenDm'];


include("../commo/connect.php");

// Bước 2: Chàn dữ liệu vào bảng tbl_danh_muc

$sql = "
		UPDATE `tbl_danh_muc` SET 
			`ten_danh_muc` = '" . $tendm . "'
		WHERE `danh_muc_id` = '" . $id . "'
		";


// Xem câu lệnh SQL viết có đúng hay không?
// echo $sql;

// Cho thực thi câu lệnh SQL trên
mysqli_query($ketnoi, $sql);
echo '
		<script type="text/javascript">
			alert("Sửa danh mục thành công!!!");
			window.location.href="dm-list.php";
		</script>';
; ?>