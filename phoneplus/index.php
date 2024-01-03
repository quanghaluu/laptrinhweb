<!DOCTYPE html>
<html lang="zxx">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
require("layout/header.php");

; ?>

<body id="home">


    <!-- Header Section Begin -->
    <?php
    require("layout/menu.php")
    ; ?>
    <!-- Header Section End -->

    <!-- Slider Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <?php
            $ketnoi = mysqli_connect("localhost", "root", "", "phoneplus");
            $sql = "SELECT * FROM tbl_su_kien ORDER BY su_kien_id DESC";
            $dulieu = mysqli_query($ketnoi, $sql);

            while ($row = mysqli_fetch_array($dulieu)) {
                ; ?>
                <div class="hero__items set-bg" data-setbg="<?php echo $row["anh"]; ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-5 col-lg-7 col-md-8">
                                <div class="hero__text">
                                    <h6 style="color: black;">Event</h6>

                                    <h2 style="font-size: 40px">
                                        <?php echo $row["tieu_de"]; ?>
                                    </h2>

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
            }
            ?>
        </div>
    </section>




    <!-- Slider Section End -->



    <!-- Products Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">Best Sellers</li>
                    </ul>
                </div>
            </div>
            <div id="1" class="row product__filter">

                <?php
                $ket_noi = mysqli_connect("localhost", "root", "", "phoneplus");
                $sql = "SELECT * FROM tbl_sp
                WHERE kieu_san_pham_id = 1 limit 4";
                $san_pham = mysqli_query($ket_noi, $sql);
                while ($row = mysqli_fetch_array($san_pham)) {
                    ; ?>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix best-sellers ">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="<?php echo $row["anh_san_pham"] ?>">
                            </div>

                            <div class="product__item__text">
                                <h6>
                                    <?php echo $row["ten_san_pham"] ?>
                                </h6>
                                <a href="san_pham_chi_tiet.php?id=<?php echo $row["san_pham_id"]; ?> && id_dm=<?php echo $row["danh_muc_id"]; ?>"
                                    class="add-cart">Chi tiết sản phẩm</a>
                                <div class="rating">
                                    <i class="fa fa-star-1"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <h5>đ
                                    <?php echo $row["gia_ban"] ?> - <strike>đ
                                        <?php echo $row["gia_goc"] ?>
                                    </strike>
                                </h5>

                            </div>
                        </div>
                    </div>
                <?php }
                ; ?>


            </div>
        </div>
    </section>

    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">Hàng mới về</li>
                    </ul>
                </div>
            </div>
            <div id="2" class="row product__filter">

                <?php
                $ket_noi = mysqli_connect("localhost", "root", "", "phoneplus");
                $sql = "SELECT * FROM tbl_sp
                WHERE kieu_san_pham_id = 2 limit 4
                ";
                $san_pham = mysqli_query($ket_noi, $sql);
                while ($row = mysqli_fetch_array($san_pham)) {
                    ; ?>


                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals ">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="<?php echo $row["anh_san_pham"]; ?>">
                            </div>

                            <div class="product__item__text">
                                <h6>
                                    <?php echo $row["ten_san_pham"] ?>
                                </h6>
                                <a href="san_pham_chi_tiet.php?id=<?php echo $row["san_pham_id"]; ?> && id_dm=<?php echo $row["danh_muc_id"]; ?>"
                                    class="add-cart">Chi tiết sản phẩm</a>
                                <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <h5>đ
                                    <?php echo $row["gia_ban"] ?>
                                </h5>

                            </div>
                        </div>
                    </div>
                <?php }
                ; ?>


            </div>
        </div>
    </section>
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">Hot Sales</li>
                    </ul>
                </div>
            </div>
            <div id="3" class="row product__filter">

                <?php
                $ket_noi = mysqli_connect("localhost", "root", "", "phoneplus");
                $sql = "SELECT * FROM tbl_sp
                WHERE kieu_san_pham_id = 3 limit 4
                ";
                $san_pham = mysqli_query($ket_noi, $sql);
                while ($row = mysqli_fetch_array($san_pham)) {
                    ; ?>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales ">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="<?php echo $row["anh_san_pham"]; ?>">
                            </div>

                            <div class="product__item__text">
                                <h6>
                                    <?php echo $row["ten_san_pham"] ?>
                                </h6>
                                <a href="san_pham_chi_tiet.php?id=<?php echo $row["san_pham_id"]; ?> && id_dm=<?php echo $row["danh_muc_id"]; ?>"
                                    class="add-cart">Chi tiết sản phẩm</a>
                                <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <h5>đ
                                    <?php echo $row["gia_ban"] ?> - <strike>đ
                                        <?php echo $row["gia_goc"] ?>
                                    </strike>
                                </h5>

                            </div>
                        </div>
                    </div>
                <?php }
                ; ?>


            </div>
        </div>
    </section>



    <!-- Product Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">Tin tức</li>
                    </ul>
                </div>
            </div>
            <div class="row">

                <?php

                $timestamp = time();
                $ket_noi = mysqli_connect("localhost", "root", "", "phoneplus");
                $sql = "SELECT * FROM tbl_tin_tuc limit 3
                ";
                $tintuc = mysqli_query($ket_noi, $sql);
                while ($row = mysqli_fetch_array($tintuc)) {
                    ; ?>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic set-bg" data-setbg="admin/<?php echo $row["anh_minh_hoa"]; ?>">
                            </div>
                            <div class="blog__item__text">
                                <span><img src="img/icon/calendar.png" alt="">
                                    <?php echo $row["ngay_dang"] ?>
                                </span>
                                <h5>
                                    <?php echo $row["tieu_de"] ?>
                                </h5>
                                <a href="tin_tuc_chi_tiet.php?id=<?php echo $row["tin_tuc_id"]; ?>">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                <?php }
                ; ?>


            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">Phản hồi khách hàng</li>
                </ul>
            </div>
        </div>
        <section style="background-color: white; margin-bottom: 0px">
            <div class="hero__slider owl-carousel">
                <?php
                $ketnoi = mysqli_connect("localhost", "root", "", "phoneplus");
                $sql = "SELECT * FROM tbl_feedback ORDER BY feedback_id DESC";
                $dulieu = mysqli_query($ketnoi, $sql);

                while ($row = mysqli_fetch_array($dulieu)) {
                    ; ?>

                    <div class="container" style="background-color: #F7CACC">
                        <br><br><br>
                        <center><img src="<?php echo $row["anh_khach"]; ?>"
                                style="width: auto; height: 200px; display: block; border-radius: 10px ">
                        </center>
                        <div class="hero__text">

                            <h2 style="font-size: 25px ;text-align: center; ">
                                <?php echo $row["ho_ten_khach"]; ?>
                            </h2>
                            <h2 style="font-size: 14px ;text-align: center; margin-left: 150px; margin-right: 150px">
                                <?php echo $row["noi_dung"]; ?>
                            </h2>
                        </div>

                    </div>

                    <?php
                }
                ?>
            </div>
        </section>
    </div>
    <!-- Footer Section Begin -->
    <?php
    require("layout/footer.php")
    ; ?>
</body>

</html>