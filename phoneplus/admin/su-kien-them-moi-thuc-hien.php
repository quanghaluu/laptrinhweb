<?php
session_start();
if (!isset($_SESSION['tai_khoan'])) {
	header("Location: dang_nhap.php");
}

// Lấy các dữ liệu bên trang Thêm mới bài viết
$tieude = $_POST['txtTieuDe'];




// Upload hình ảnh
$anhminhhoa = "images/" . basename($_FILES["txtAnhMinhHoa"]["name"]);
$fileanhtam = $_FILES["txtAnhMinhHoa"]["tmp_name"];
$result = move_uploaded_file($fileanhtam, $anhminhhoa);
if (!$result) {
	$anhminhhoa = NULL;
}


// Chàn dữ liệu vào bảng tbl_tin_tuc
// Bước 1: Kết nối đến CSDL 
include("../commo/connect.php");

// Bước 2: Chèn dữ liệu vào bảng tbl_su_kien
$sql = "
	INSERT INTO `tbl_su_kien` (
		`su_kien_id`, 
		`tieu_de`,
		`anh`) 
	VALUES (
		NULL, 
		N'" . $tieude . "',
		'admin/" . $anhminhhoa . "')";

// Xem câu lệnh SQL viết có đúng hay không?
// echo $sql;

// Cho thực thi câu lệnh SQL trên
mysqli_query($ketnoi, $sql);
echo '
		<script type="text/javascript">
			alert("Thêm mới sự kiện thành công!!!");
			window.location.href="su-kien-list.php";
		</script>';
; ?>