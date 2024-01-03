<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

// Kết nối đến CSDL ở đây
include("../commo/connect.php");

session_start(); // Bắt đầu phiên

$mail = new PHPMailer(true);
//Gửi mail theo TK đang đăng nhập
$userID = $_SESSION['makhach'];
$sql = "SELECT tbl_khachhang.email, tbl_order.ten, tbl_order.diachi, tbl_order.sohoadon 
        FROM tbl_khachhang 
        INNER JOIN tbl_order ON tbl_khachhang.makhach = tbl_order.makhach
        WHERE tbl_order.makhach = $userID
        ORDER BY tbl_order.sohoadon DESC
        LIMIT 1";
$result = $ketnoi->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $recipientEmail = $row['email'];
    $userName = $row['ten'];
    $userAddress = $row['diachi'];
    $invoiceNumber = $row['sohoadon'];

    $subject = 'PhonePlus: Order Success';
    $body = "Phoneplus xin chân thành cảm ơn bạn, $userName!<br>";
    $body .= "Đơn hàng của bạn (Số hóa đơn: $invoiceNumber) sẽ được giao tới địa chỉ sau:<br>";
    $body .= "$userAddress<br>";
    $body .= "Đơn hàng sẽ được giao trong 2-3 ngày tới.";

    // Gọi hàm sendConfirmationEmail để gửi email
    sendConfirmationEmail($mail, $recipientEmail, $subject, $body);
    header("location: mail/camon.php");
} else {
    echo "Không tìm thấy mail";
}


function sendConfirmationEmail($mail, $recipientEmail, $subject, $body)
{
    try {
        // Server settings
        $mail->SMTPDebug = 2;
        $mail->isSMTP(); // Sử dụng SMTP để gửi mail
        $mail->Host = 'smtp.gmail.com'; // Server SMTP của gmail
        $mail->SMTPAuth = true; // Bật xác thực SMTP
        $mail->Username = 'phoneplus1103@gmail.com'; // Tài khoản email
        $mail->Password = 'liblyobvrpmmmbyc'; // Mật khẩu ứng dụng ở bước 1 hoặc mật khẩu email
        $mail->SMTPSecure = 'ssl'; // Mã hóa SSL
        $mail->Port = 465; // Cổng kết nối SMTP là 465

        // Recipients
        $mail->setFrom('phoneplus1103@gmail.com', 'PhonePlus'); // Địa chỉ email và tên người gửi
        $mail->addAddress($recipientEmail, 'Khách hàng'); // Địa chỉ mail và tên người nhận

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $subject; // Tiêu đề
        $mail->Body = $body; // Nội dung

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}

// Đóng kết nối CSDL
$ketnoi->close();
?>