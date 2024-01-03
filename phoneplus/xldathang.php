<?php
use PHPMailer\PHPMailer\PHPMailer;

$sohoadon = $_POST["sohoadon"];
$slmathang = $_POST["slmathang"];
$name = $_POST["name"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$note = $_POST["note"];
echo $name;
echo $phone;
echo "Soluong hang:" . $slmathang;
for ($i = 1; $i < $slmathang; $i++) {
    $mathang = $_POST["san_pham_id" . $i];
    $soluong = $_POST["sl" . $i];


}
//Cập nhật vào CSDL
//1. Cập nhật lại bảng tbl_order với số hóa đơn này là đã đặt hàng chedo=1

include("commo/connect.php");


$sql_sohoadon = "UPDATE tbl_order SET chedo=1,ten = '$name', sdt = '$phone', diachi = '$address', ghichu='$note'  WHERE sohoadon='$sohoadon'";
echo $sql_sohoadon;
if ($ketnoi->query($sql_sohoadon) == TRUE) {
    for ($i = 1; $i < $slmathang; $i++) {
        $mathang = $_POST["san_pham_id" . $i];
        $soluong = $_POST["sl" . $i];

        $sql_chitiethoadon = "UPDATE tbl_orderdetail set soluong= $soluong WHERE sohoadon=$sohoadon and san_pham_id='$mathang'";

    }
    // echo "Đặt hàng thành công";
    header("location: mail/camon.php");
    // Gửi email xác nhận
    require('mail/sendmail.php');

    //    $subject = 'PhonePlus: Thông báo đặt hàng thành công';
    //    $body = 'Phoneplus xin chân thành cảm ơn bạn';
    //     $email = 'thuydunglng.211@gmail.com'; // Điền địa chỉ email người nhận xác nhận
    //$mail = new PHPMailer(true);

    if (sendConfirmationEmail($mail, $recipientEmail, $subject, $body)) {
        header("location: sendmail.php");
    } else {
        echo 'Message could not be sent.';
    }
}
//2. CẬp lại bảng chitietdathang với soahoas đơn này với các mã hàng này số l ượng mua mới
?>


<?php
// include ('sendmail.php'); 

?>