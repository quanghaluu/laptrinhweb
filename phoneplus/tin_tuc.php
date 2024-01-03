<!DOCTYPE html>
<html lang="zxx">
<?php
require("layout/header.php");
include("commo/connect.php");
; ?>

<body id="tin_tuc">
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>


    <!-- Header Section Begin -->
    <?php
    require("layout/menu.php")
    ; ?>
    <!-- Header Section End -->
    <section class="breadcrumb-blog set-bg" data-setbg="img/backtinn.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2></h2>
                </div>
            </div>
        </div>
    </section>


    <section class="blog spad">
        <div class="container">
            <div class="row">

                <?php

                $timestamp = time();
                $ket_noi = mysqli_connect("localhost", "root", "", "phoneplus");
                $sql = "SELECT * FROM tbl_tin_tuc 
                ";
                $tintuc = mysqli_query($ket_noi, $sql);
                while ($row = mysqli_fetch_array($tintuc)) {
                    ; ?>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <br>
                            <br>
                            <div class="blog__item__pic set-bg" data-setbg="admin/<?php echo $row["anh_minh_hoa"] ?>"></div>
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


    <!-- Footer Section Begin -->

    <?php
    require("layout/footer.php")
    ; ?>
</body>

</html>