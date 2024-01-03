<?php
session_start();
include("commo/connect.php");
if (isset($_GET['action'])) {
    $shd = $_GET['shd'];
    echo $shd;
    $masp = $_GET['masp'];
    echo $masp;
    //Xây dựng câu lệnh truy vấn xóa
    $sql = "DELETE from tbl_orderdetail where sohoadon = $shd and san_pham_id = $masp";
    //Thực thi truy vấn xóa và kiểm tra kết quả thực thi thu được
    if ($ketnoi->query($sql) == TRUE) {
        //echo "xóa thành công";
        header("location:giohang.php"); //lệnh điều hướng đến vị trí trang bất kỳ trong website
    } else
        echo "Xóa bị lỗi";

}
// xóa sản phảm xong, ở giohang.php sẽ vẫn chạy lại câu lệnh select 
?>