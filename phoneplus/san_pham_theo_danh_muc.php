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
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Sản phẩm</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Trang chủ</a>
                            <span>Danh mục</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <?php
                                require("category.php")
                                    ?>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-9">


                    <?php
                    //sắp xếp  
                    $param = "";
                    $sortParam = "";
                    $orderConditon = "";

                    $ketnoi = mysqli_connect("localhost", "root", "", "phoneplus");
                    $sql_total = "SELECT * FROM tbl_sp ";

                    $orderField = isset($_GET['field']) ? $_GET['field'] : "";
                    $orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";
                    if (!empty($orderField) && !empty($orderSort)) {
                        $param .= "field=" . $orderField . "&sort=" . $orderSort . "&";
                        $orderConditon = "ORDER BY " . $orderField . " " . $orderSort;
                    }
                    $item_per_page = 6;
                    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;

                    $totalRecords = mysqli_query($ketnoi, $sql_total);
                    $Records = mysqli_num_rows($totalRecords);
                    $totalPages = ceil($Records / $item_per_page);

                    ?>


                    <!-- Lọc sản phẩm -->
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                            </div>
                        </div>
                    </div>

                    <!-- end Lọc sản phẩm -->
                    <!-- List sản phẩm -->
                    <div class="row">
                        <?php
                        $ketnoi = mysqli_connect("localhost", "root", "", "phoneplus");

                        $id = $_GET['id_dm'];
                        $sql = "
                        SELECT * 
                        FROM tbl_sp
                        WHERE danh_muc_id = " . $id . "
                        ORDER BY san_pham_id DESC";
                        $dulieu = mysqli_query($ketnoi, $sql);
                        $i = 0;
                        while ($row = mysqli_fetch_array($dulieu)) {
                            $i++;
                            ; ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="<?php echo $row["anh_san_pham"] ?>">

                                    </div>
                                    <div class="product__item__text">
                                        <h6>
                                            <?php echo $row["ten_san_pham"] ?>
                                        </h6>
                                        <a href="san_pham_chi_tiet.php?id=<?php echo $row["san_pham_id"]; ?>&& id_dm=<?php echo $row["danh_muc_id"]; ?>"
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

                        <!-- end List sản phẩm -->


                    </div>
                </div>
            </div>
        </div>


        <!-- Footer Section Begin -->

        <?php
        require("layout/footer.php")
        ; ?>
</body>

</html>