<?php
session_start();
if (!isset($_SESSION['tai_khoan'])) {
	header("Location: dang_nhap.php");
}

// Lấy các dữ liệu bên trang Thêm mới bài viết
$id = $_POST['txtID'];
$tieude = $_POST['txtTieuDe'];

// Upload hình ảnh
$anhminhhoa = "images/" . basename($_FILES["txtAnhMinhHoa"]["name"]);
$fileanhtam = $_FILES["txtAnhMinhHoa"]["tmp_name"];
$result = move_uploaded_file($fileanhtam, $anhminhhoa);
if (!$result) {
	$anhminhhoa = NULL;
}

// Chàn dữ liệu vào bảng 
// Bước 1: Kết nối đến CSDL 
include("../commo/connect.php");

// Bước 2: Chàn dữ liệu vào bảng 
if ($anhminhhoa == NULL) {
	$sql = "
		UPDATE `tbl_su_kien` SET 
			`tieu_de` = '" . $tieude . "',
			
		WHERE `su_kien_id` = N'" . $id . "'
		";
} else {
	$sql = "
		UPDATE `tbl_su_kien` SET 
			`tieu_de` = '" . $tieude . "', 
			`anh` = 'admin/" . $anhminhhoa . "'				
		WHERE `su_kien_id` = '" . $id . "'
		";
}

// Xem câu lệnh SQL viết có đúng hay không?
// echo $sql;

// Cho thực thi câu lệnh SQL trên
mysqli_query($ketnoi, $sql);
echo '
		<script type="text/javascript">
			alert("Sửa ảnh thành công!!!");
			window.location.href="su-kien-list.php";
		</script>';
; ?>