<?php
session_start();
include("commo/connect.php");
if (isset($_GET['action'])) {
    $shd = $_GET['shd'];
    echo $shd;
    $masp = $_GET['masp'];
    echo $masp;
    $sl = $_GET['sl'];
    $action = $_GET['action'];

    $slmoi = 0;

    if ($action == "tru") {
        $slmoi = $sl - 1;

    }
    if ($action == "cong") {
        $slmoi = $sl + 1;
    }
    echo $slmoi;

    if ($slmoi == 0) // xy lý xóa sản phẩm 
    {

        $sql = "DELETE from tbl_orderdetail where sohoadon = $shd and san_pham_id = $masp";
        //Thực thi truy vấn xóa và kiểm tra kết quả thực thi thu được
        if ($ketnoi->query($sql) == TRUE) {
            //echo "xóa thành công";
            header("location:giohang.php"); //lệnh điều hướng đến vị trí trang bất kỳ trong website
        } else
            echo "Cập nhập lỗi";
    }
    if ($slmoi > 0) {
        $sql = "UPDATE tbl_orderdetail SET soluong = $slmoi  where sohoadon = $shd and san_pham_id = $masp";
        //Thực thi truy vấn xóa và kiểm tra kết quả thực thi thu được
        if ($ketnoi->query($sql) == TRUE) {
            //echo "xóa thành công";
            header("location:giohang.php"); //lệnh điều hướng đến vị trí trang bất kỳ trong website
        } else
            echo "Cập nhập lỗi";

    }










}
// xóa sản phảm xong, ở giohang.php sẽ vẫn chạy lại câu lệnh select 
?>