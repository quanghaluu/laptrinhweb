<!DOCTYPE html>
<html lang="zxx">
<?php
require("layout/header.php");
include("commo/connect.php");
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
    <!-- Header Section End -->

    <?php
    $ketnoi = mysqli_connect("localhost", "root", "", "phoneplus");
    /*mysqli_set_charset($ketnoi, 'UTF8');*/

    // Bước 2: Lấy dữ liệu từ trên đường đẫn
    $id = $_GET["id"];

    //Bước 3: Hiển thị các dữ liệu trong bảng tbl_sanpham ra đây
    $sql = "
                SELECT * 
                FROM tbl_sp 
                WHERE san_pham_id = " . $id
    ;

    $dulieu = mysqli_query($ketnoi, $sql);
    //  $product = mysqli_fetch_assoc($dulieu);
    $row = mysqli_fetch_array($dulieu);
    ; ?>
    <!-- Hero Section Begin -->
    <section class="shop-details">
        <div class="product__details__pic" style="background-color: white;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb" style="text-align: left;">
                            <a href="./index.php">Trang chủ</a>
                            <a>Chi tiết sản phẩm</a>
                            <span>
                                <?php echo $row["ten_san_pham"] ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="product-single colorPublic2" style="padding-bottom: 0px; padding-top: 15px;">
                    <div class="row" style="margin-bottom: 0px;">
                        <div class="col-xs-12 col-sm-5">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                    <div class="product__details__pic__item_left">
                                        <img style="width: 700px; height: auto;"
                                            src="<?php echo $row["anh_san_pham"]; ?>" alt=""> <!--ảnh có đường dẫn rồi-->
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="product__details__text">
                                <h1 style="text-align: left;"><b>
                                        <?php echo $row["ten_san_pham"] ?>
                                    </b></h1>
                                <div class="rating" style="text-align: left;">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span> - 5 Reviews</span>
                                </div>
                                <h3 style="text-align: left;">đ
                                    <?php echo $row["gia_ban"] ?> - <strike>đ
                                        <?php echo $row["gia_goc"] ?>
                                    </strike>
                                </h3>
                                <h5 style="text-align: left; color: #666666;">
                                    <?php echo $row["chi_tiet"] ?>
                                </h5>
                                <div class="row" style="text-align: left;">

                                    <div class="col-sm-2">
                                        <input type="hidden" name="temp_id" value="276">



                                        <?php
                                        $san_pham_id = $row["san_pham_id"];

                                        // Kiểm tra nếu session 'taikhoan' tồn tại
                                        $is_logged_in = isset($_SESSION['makhach']);
                                        ?>

                                        <div style="width: 400px; margin-top: 50px;">
                                            <?php if ($is_logged_in): ?>
                                                <form action="xlgiohang.php" method="get">
                                                    <div
                                                        style="display: flex; justify-content: space-between; align-items: center;">
                                                        <button type="submit"
                                                            style="background-color: #FFF5F1; height: 45px; width: 180px; color: #F05D40; font-size: 16px; border-style: solid; border-color: #F05D40;">
                                                            <img style="height: 16px; width: auto;"
                                                                src="img/icon/shopcart.ico" alt="Icon Giỏ hàng">
                                                            Thêm vào giỏ hàng
                                                        </button>
                                                        <button type="submit" name="dat_hang"
                                                            style="background-color: #F05D40; height: 45px; width: 180px; color: white; font-size: 16px; border: none;">Đặt
                                                            mua ngay</button>
                                                    </div>
                                                    <input type="hidden" name="san_pham_id"
                                                        value="<?php echo $san_pham_id ?>">
                                                </form>
                                            <?php else: ?>
                                                <h5> Hãy đăng nhập để tiếp tục mua hàng</h5>
                                                <br>
                                                <form action="customer/dang_nhap.php" method="get">
                                                    <div
                                                        style="display: flex; justify-content: space-between; align-items: center;">
                                                        <button type="submit"
                                                            style="background-color: #4a90e2; height: 45px; width: 180px; color: white; font-size: 16px; border-style: solid; border-color: #black;">
                                                            <img style="height: 16px; width: auto;">
                                                            Đăng nhập
                                                        </button>
                                                    </div>
                                                </form>
                                            <?php endif; ?>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab"><b>MÔ TẢ SẢN PHẨM</b></a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tabs-5" role="tabpanel">
                        <div class="product__details__tab__content">

                            <div class="product__details__tab__content__item">
                                <p>
                                    <?php echo $row["mo_ta"] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab"><b>THÔNG TIN SẢN
                                    PHẨM</b></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-5" role="tabpanel">
                            <div class="product__details__tab__content">

                                <div class="product__details__tab__content__item">
                                    <p>
                                        <?php echo $row["noi_dung"] ?>
                                    </p>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab"><b>SẢN PHẨM LIÊN
                                        QUAN</b></a>
                            </li>
                        </ul>
                        <br>
                    </div>
                </div>
            </div>
            <?php
            $ket_noi = mysqli_connect("localhost", "root", "", "phoneplus");
            $id_dm = $_GET['id_dm']; //id danh mục
            $sql = "SELECT * FROM tbl_sp
                    WHERE danh_muc_id = " . $id_dm . " limit 4"; //IMIT 4 để lấy tối đa 4 sản phẩm
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

    <?php
    require("layout/footer.php")
    ; ?>
</body>

</html>