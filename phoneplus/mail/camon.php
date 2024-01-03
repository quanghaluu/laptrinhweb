<!DOCTYPE html>
<html lang="en">
<html lang="zxx">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<head>
    <?php session_start() ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cảm ơn</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/giohang.css">

    <head>

        <meta charset="UTF-8">
        <meta name="description" content="Male_Fashion Template">
        <meta name="keywords" content="Male_Fashion, unica, creative, html">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="img/phoneplus.png" type="image/png">
        <title>PHONEPLUS - Cửa hàng điện thoại số 1 Hà Nội</title>

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
            rel="stylesheet">

        <!-- Css Styles -->

    </head>

    <header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="header__top__left">
                        <p>Miễn phí ship toàn quốc. Đổi trả hàng trong vòng 7 ngày.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="header__top__right">
                        <div class="header__top__links">
                            <?php
                            // Hiện log in log out
                            if (!isset($_SESSION["tenkhach"])) { ?>
                                <a href="../admin/dang_nhap.php">Đăng nhập quản trị</a>
                                <a href="../customer/dang_nhap.php">Đăng nhập</a>
                                <a href="../customer/dangky.php">Đăng ký</a>
                            <?php } else { ?>
                                <span style="color: white; margin-right:50px">Xin chào:
                                    <?php echo $_SESSION["tenkhach"]; ?>
                                </span>
                                <a href='../customer/xllogout.php'>Đăng xuất</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="background-color: #4a90e2">
        <div class="col-lg-3 col-md-4">
            <div class="header__logo">
                <a href="index.php"><img src="img/logopp.jpg" alt=""
                        style="width: auto; height: 60px; margin-left: 100px"> </a>
            </div>
        </div>
        <div class="col-lg-9 col-md-5">
            <nav class="header__menu mobile-menu">
                <ul>
                    <li class="active"><a href="../index.php" style="color:white">Trang chủ</a></li>
                    <li><a href="../san_pham.php" style="color:white">Sản phẩm</a></li>



                    <li><a style="color:white">Danh mục</a>
                        <ul class="dropdown">
                            <?php
                            $ket_noi = mysqli_connect("localhost", "root", "", "phoneplus");
                            $sql = "SELECT * FROM tbl_danh_muc";
                            $sanpham = mysqli_query($ket_noi, $sql);
                            while ($row = mysqli_fetch_array($sanpham)) {
                                ; ?>


                                <li><a href="../san_pham_theo_danh_muc.php?id_dm=<?php echo $row["danh_muc_id"]; ?>"><?php echo $row["ten_danh_muc"] ?></a></li>

                            <?php }
                            ; ?>
                        </ul>
                    </li>




                    <li><a href="../tin_tuc.php" style="color:white">Tin tức</a></li>
                    <li><a href="../lien_he.php" style="color:white">Liên hệ</a></li>
                    <li>
                        <form class="search-form" enctype="application/x-www-form-urlencoded" method="get"
                            action="../timkiem.php" name="frm_search">

                            <input id="search-quick" type="text" name="ten" placeholder="Tìm kiếm sản phẩm"
                                autocomplete="off" minlength="1">
                            <button class="submit"><i class="fa fa-search"></i></button>
                        </form>

                    </li>

                    <li>
                        <div class="giohang">
                            <a href="../giohang.php"><img style="height: 40px; width: auto; margin-top: 0px"
                                    src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/64/000000/external-shopping-cart-interface-kiranshastry-solid-kiranshastry-1.png" />
                            </a>
                        </div>

                    </li>
                    <li>
                        <?php
                        // Hiện log in log out
                        if (isset($_SESSION["tenkhach"])) { ?>
                            <a href="../donhang.php" style="color: white;">Đơn mua</a>
                        <?php } ?></a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
    <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>

<body id="home">

    <section class="hero">
        <div class="hero__slider owl-carousel">
            <?php
            $ketnoi = mysqli_connect("localhost", "root", "", "phoneplus");
            ?>
            <div class="hero__items set-bg" data-setbg="admin/images/even3.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6 style="color: black;">Event</h6>

                                <!-- <h2 style="font-size: 40px"><?php //echo $row["tieu_de"];?></h2> -->

                                <a href="san_pham.php" class="primary-btn">Shop now <span
                                        class="arrow_right"></span></a>
                                <div class="hero__social">
                                    <a href="#"><i style="font-size: 30px" class="fa fa-facebook"></i></a>
                                    <a href="#"><i style="font-size: 30px" class="fa fa-twitter"></i></a>
                                    <a href="#"><i style="font-size: 30px" class="fa fa-pinterest"></i></a>
                                    <a href="#"><i style="font-size: 30px" class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php

            ?>
        </div>
    </section>

    <div
        style=" background-image: url('../img/backcamon3.jpg');height: 900px; background-repeat: no-repeat; background-size: 100% 100%;text-align:center">

        <form action="ketnoidonhang.php" method="POST">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <button type="submit"
                    style="background-color: black;  margin-top: 700px; margin-left: 880px; height: 45px; width: 180px; color: white; font-size: 16px; border-style: solid; border-color: #black;">
                    <img style="height: 16px; width: auto;">
                    Xem đơn hàng
                </button>
            </div>
        </form>
        <div>



</body>

</html>