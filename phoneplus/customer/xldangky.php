<?php
if (!isset($_POST['txtTaiKhoan'])) {
    die('');
}
$tenkhach = $_POST["txtTaiKhoan"];
$sdt = $_POST["txtSDT"];
$email = $_POST["txtEmail"];
$matkhau = $_POST["txtMatKhau"];

include("../commo/connect.php");
//Kiểm tra tên đăng nhập này đã có người dùng chưa
$sql = "SELECT tenkhach FROM tbl_khachhang WHERE tenkhach='$tenkhach'";
$result = $ketnoi->query($sql);
//if($result->num_rows>0)
//{
//  echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
// exit;
//}

$sql_mak = "SELECT MAX(makhach) AS makhachmax FROM tbl_khachhang";
$result = $ketnoi->query($sql_mak);

//Lấy mã khách trong database ra
if ($result) {
    $row = $result->fetch_assoc();
    $ma = $row['makhachmax'];
    $makhach = $ma + 1;


    //Lưu thông tin khách hàng vào bảng
    $sql_insert_kh = "INSERT INTO tbl_khachhang(makhach,tenkhach,sdt,email,matkhau) values($makhach,'$tenkhach','$sdt','$email','$matkhau')";
    if ($ketnoi->query($sql_insert_kh) == TRUE) {
        echo "Đăng ký tài khoản thành công";
        header("location:../customer/dang_nhap.php");
    } else
        echo "Lỗi đăng ký tài khoản";
}
?>