<?php
$hoten = $_POST['HoTen'];
$sodienthoai = $_POST['SoDienThoai'];
$email = $_POST['Email'];
$tieude = $_POST['TieuDe'];
$noidungphanhoi = $_POST['NoiDung'];

// Chàn dữ liệu vào bảng tbl_lien_he
// Bước 1: Kết nối đến CSDL 
include("./commo/connect.php");
//$ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

// Bước 2: Chèn dữ liệu vào bảng Liên hệ
$sql = "
	INSERT INTO `tbl_lien_he` (
		`lien_he_id`, 
		`ten_lien_he`, 
		`so_dien_thoai`, 
		`email`, 
		`tieu_de`, 
		`noi_dung`) 
	VALUES (
		NULL, 
		'" . $hoten . "',
		'" . $sodienthoai . "',
		'" . $email . "',
		'" . $tieude . "',
		'" . $noidungphanhoi . "')";

// Xem câu lệnh SQL viết có đúng hay không?
// echo $sql;

// Cho thực thi câu lệnh SQL trên
mysqli_query($ketnoi, $sql);
echo '
		<script type="text/javascript">
			alert("Bạn đã gửi liên hệ phản hồi thành công!!!");
			window.location.href="index.php";
		</script>';
; ?>