<?php
session_start();
if (!isset($_SESSION['tai_khoan'])) {
	header("Location: dang_nhap.php");
}

$id = $_POST['txtID'];
$tieude = $_POST['txtTieuDe'];
$mota = $_POST['txtMoTa'];
$noidung = $_POST['txtNoiDung'];

$anhminhhoa = "images/" . basename($_FILES["txtAnhMinhHoa"]["name"]);
$fileanhtam = $_FILES["txtAnhMinhHoa"]["tmp_name"];
$result = move_uploaded_file($fileanhtam, $anhminhhoa);
if (!$result) {
	$anhminhhoa = NULL;
}
include("../commo/connect.php");
if ($anhminhhoa == NULL) {
	$sql = "
		UPDATE `tbl_tin_tuc` SET 
			`mo_ta` = '" . $mota . "',
			`tieu_de` = '" . $tieude . "', 
			`noi_dung` = '" . $noidung . "'
		WHERE `tin_tuc_id` = '" . $id . "'
		";
} else {
	$sql = "
		UPDATE `tbl_tin_tuc` SET 
			`mo_ta` = '" . $mota . "',
			`tieu_de` = '" . $tieude . "', 
			`noi_dung` = '" . $noidung . "', 
			`anh_minh_hoa` = '" . $anhminhhoa . "'				
		WHERE `tin_tuc_id` = '" . $id . "'
		";
}

mysqli_query($ketnoi, $sql);
echo '
		<script type="text/javascript">
			alert("Sửa tin tức thành công!!!");
			window.location.href="tin_tuc_quan_tri.php";
		</script>';
; ?>