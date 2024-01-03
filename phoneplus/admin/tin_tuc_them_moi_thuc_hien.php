<?php
session_start();
if (!isset($_SESSION['tai_khoan'])) {
	header("Location: dang_nhap.php");
}

// Lấy các dữ liệu bên trang Thêm mới bài viết
$tieude = $_POST['txtTieuDe'];
$noidung = $_POST['txtNoiDung'];
$mota = $_POST['txtMoTa'];

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

// Bước 2: Chàn dữ liệu vào bảng tin tức
$sql = "
	INSERT INTO `tbl_tin_tuc` (`tin_tuc_id`, `tieu_de`,`ngay_dang`,`anh_minh_hoa`,`mo_ta`,`noi_dung` ) 
	VALUES (NULL, '" . $tieude . "',current_timestamp(),'" . $anhminhhoa . "','" . $mota . "','" . $noidung . "')";

// Xem câu lệnh SQL viết có đúng hay không?
// echo $sql;

// Cho thực thi câu lệnh SQL trên
mysqli_query($ketnoi, $sql);
echo '
		<script type="text/javascript">
			alert("Thêm mới tin tức thành công!!!");
			window.location.href="tin_tuc_quan_tri.php";
		</script>';
; ?>