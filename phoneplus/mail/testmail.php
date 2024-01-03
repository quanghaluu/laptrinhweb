<!-- <?php
include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/Exception.php";
include "PHPMailer/src/OAuth.php";
include "PHPMailer/src/POP3.php";
include "PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
// print_r($mail);

try {
    //Server settings
    $mail->SMTPDebug = 0; // Enable verbose debug output
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.example.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'phoneplus1103@gmail.com'; // SMTP username
    $mail->Password = 'liblyobvrpmmmbyc'; // SMTP password: lấy từ phần app password trong tk gmail
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to

    //Recipients
    $mail->setFrom('phoneplus1103@gmail.com', 'Mailer');

    $mail->addAddress('joe@example.net', 'Joe User'); // Add a recipient
    $mail->addAddress('ellen@example.com'); // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('phoneplus1103@gmail.com'); //gửi cho chính mình 1 bản mail
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = "Order Success";
    $mail->Body = 'Phoneplus xin chân thành cảm ơn bạn';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?> -->