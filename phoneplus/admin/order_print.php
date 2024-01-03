<?php
session_start();
if (!isset($_SESSION['tai_khoan'])) {
    header("Location: dang_nhap.php");
}
; ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/dumbum.ico" type="image/ico" />
    <title>YOYO | Trang quản trị đơn hàng</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css">
    <script src="../resources/ckeditor/ckeditor.js"></script>
</head>

<body>
    <?php

    include("../config/dbconfig.php");
    $con = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
    mysqli_set_charset($con, 'UTF8');
    $order = mysqli_query($con, "SELECT `order`.name, `order`.address, `order`.phone, `order`.note, order_detail.*, tbl_sp.ten_san_pham as product_name FROM `order` INNER JOIN `order_detail` ON `order`.id = `order_detail`.order_id INNER JOIN `tbl_sp` ON `tbl_sp`.san_pham_id = `order_detail`.product_id WHERE `order`.id = " . $_GET['id']);
    $order = mysqli_fetch_all($order, MYSQLI_ASSOC);

    ?>
    <div id="order-detail-wrapper">
        <div id="order-detail">
            <h1>Chi tiết đơn hàng</h1>
            <label>Người nhận: </label><span>
                <?= $order[0]['name'] ?>
            </span><br />
            <label>Điện thoại: </label><span>
                <?= $order[0]['address'] ?>
            </span><br />
            <label>Địa chỉ: </label><span>
                <?= $order[0]['phone'] ?>
            </span><br />
            <hr />
            <h3>Danh sách sản phẩm</h3>
            <ul>
                <?php
                $totalQuantity = 0;
                $totalMoney = 0;
                foreach ($order as $row) {
                    ?>
                    <li>
                        <span class="item-name">
                            <?= $row['product_name'] ?>
                        </span>
                        <span class="item-quantity"> - SL:
                            <?= $row['quantity'] ?> sản phẩm
                        </span>
                    </li>
                    <?php
                    $totalMoney += ($row['price'] * $row['quantity']);
                    $totalQuantity += $row['quantity'];
                }
                ?>
            </ul>
            <hr />
            <label>Tổng SL:</label>
            <?= $totalQuantity ?> - <label>Tổng tiền:</label>
            <?= number_format($totalMoney, 0, ",", ".") ?> đ
            <p><label>Ghi chú: </label>
                <?= $order[0]['note'] ?>
            </p>
        </div>
    </div>
</body>

</html>