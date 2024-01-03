<?php
session_start();
if (!isset($_SESSION['tai_khoan'])) {
	header("Location: dang_nhap.php");
}

// Lấy các dữ liệu bên trang Thêm mới 
$tensp = $_POST['txtTensp'];
$giagoc = $_POST['txtGiagoc'];
$giaban = $_POST['txtGiaban'];
$chitiet = $_POST['txtChitiet'];
$mota = $_POST['txtMota'];
$noidung = $_POST['txtNoidung'];
$dmspid = $_POST['txtDmsp'];
$kieuspid = $_POST['txtKieusp'];


// Upload hình ảnh
$anhminhhoa = "images/sp/" . basename($_FILES["txtAnhMinhHoa"]["name"]);
$fileanhtam = $_FILES["txtAnhMinhHoa"]["tmp_name"];
$result = move_uploaded_file($fileanhtam, $anhminhhoa);
if (!$result) {
	$anhminhhoa = NULL;
}


// Bước 1: Kết nối đến CSDL 
include("../commo/connect.php");


// Bước 2: Chàn dữ liệu vào bảng tbl_sp
$sql = "
	INSERT INTO `tbl_sp` (
		`san_pham_id`, 
		`ten_san_pham`,
		`gia_goc`,
		`gia_ban`,
		`danh_muc_id`, 
		`kieu_san_pham_id`, 
		`anh_san_pham`,
		`chi_tiet`,
		`noi_dung`,
		`mo_ta`) 
	VALUES (
		NULL, 
		'" . $tensp . "',
		'" . $giagoc . "',
		'" . $giaban . "',
		'" . $dmspid . "',
		'" . $kieuspid . "',
		'admin/" . $anhminhhoa . "',
		'" . $chitiet . "',
		'" . $noidung . "',
		'" . $mota . "')";

// Xem câu lệnh SQL viết có đúng hay không?
//echo $sql;

// Cho thực thi câu lệnh SQL trên
mysqli_query($ketnoi, $sql);
echo '
		<script type="text/javascript">
			alert("Thêm sản phẩm mới thành công!!!");
			window.location.href="sanpham-list.php";
		</script>';
; ?>