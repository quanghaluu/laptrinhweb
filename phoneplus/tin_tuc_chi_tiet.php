<!DOCTYPE html>
<html lang="zxx">
<?php
require("layout/header.php");
include("./commo/connect.php");
; ?>

<body id="home">
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>


    <!-- Header Section Begin -->
    <?php
    require("layout/menu.php")
    ; ?>


    <?php
    //$ket_noi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
    $ket_noi = mysqli_connect("localhost", "root", "", "phoneplus");
    mysqli_set_charset($ket_noi, 'UTF8');
    $tin_tuc = $_GET["id"];
    $sql = "
                SELECT * 
                FROM tbl_tin_tuc
                WHERE tin_tuc_id = " . $tin_tuc . "
                ";
    $du_lieu = mysqli_query($ket_noi, $sql);
    $row = mysqli_fetch_array($du_lieu);

    ; ?>

    <!-- Header Section End -->
    <section class="blog-hero spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-9 text-center">
                    <div class="blog__hero__text">
                        <h2>
                            <?php echo $row["tieu_de"]; ?>
                        </h2>
                        <ul>

                            <li>
                                <?php echo $row["ngay_dang"]; ?>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-details spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="blog__details__pic">
                        <img src="admin/<?php echo $row["anh_minh_hoa"] ?>" alt="">
                    </div>

                </div>
                <div class="blog__details__text" style="text-align: justify;">
                    <p>
                        <?php echo $row["mo_ta"]; ?>
                    </p>
                </div>
                <div class="col-lg-8">
                    <div class="blog__details__content">
                        <div class="blog__details__share">
                            <span>share</span>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="youtube"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="blog__details__text">
                            <p>
                                <?php echo $row["noi_dung"]; ?>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section Begin -->

    <?php
    require("layout/footer.php")
    ; ?>
</body>

</html>