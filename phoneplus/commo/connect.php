<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "phoneplus";
$ketnoi = new mysqli($host, $user, $password, $dbname);
if ($ketnoi->connect_error) {
    echo "Lỗi kết nối" . $ketnoi->connect_error;
}
?>