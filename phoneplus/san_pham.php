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
                        <!-- <h4>Phonplus/h4> -->
                        <div class="breadcrumb__links">
                            <a href="./index.php">Trang chủ</a>
                            <span>Sản phẩm</span>
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
                                <br>
                                <?php
                                require("category.php")
                                    ?>


                            </div>
                        </div>



                    </div>
                </div>
                <div class="col-lg-9">

                    <?php
                    $param = "";
                    $sortParam = "";
                    $orderConditon = "";

                    $ketnoi = mysqli_connect("localhost", "root", "", "phoneplus") or die("Sorry, can't connect to the mysql.");
                    $tk = isset($_GET['search']) ? $_GET['search'] : "";

                    $orderField = isset($_GET['field']) ? $_GET['field'] : "";
                    $orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";
                    if (!empty($orderField) && !empty($orderSort)) {
                        $param .= "field=" . $orderField . "&sort=" . $orderSort . "&";
                        $orderConditon = "ORDER BY " . $orderField . " " . $orderSort;
                    }
                    $item_per_page = 9;
                    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
                    $offset = ($current_page - 1) * $item_per_page;


                    $sql = "SELECT * FROM tbl_sp " . $orderConditon . "  LIMIT " . $item_per_page . " OFFSET " . $offset;

                    $sql_total = "SELECT * FROM tbl_sp ";

                    $totalRecords = mysqli_query($ketnoi, $sql_total);
                    $Records = mysqli_num_rows($totalRecords);
                    $totalPages = ceil($Records / $item_per_page);

                    $query = mysqli_query($ketnoi, $sql);
                    $num2 = mysqli_num_rows($query);

                    ?>

                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                    <br>
                                    <p>Sắp xếp theo:</p>
                                    <select
                                        onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                        <option <?php if (isset($_GET['field']) && $_GET['field'] == "gia_ban" && isset($_GET['sort']) && $_GET['sort'] == "desc") { ?> selected <?php } ?>
                                            value="?<?= $sortParam ?>field=gia_ban&sort=desc">giá từ cao đến thấp</option>
                                        <option <?php if (isset($_GET['field']) && $_GET['field'] == "gia_ban" && isset($_GET['sort']) && $_GET['sort'] == "asc") { ?> selected <?php } ?>
                                            value="?<?= $sortParam ?>field=gia_ban&sort=asc">giá từ thấp đến cao</option>
                                        <option <?php if (isset($_GET['field']) && $_GET['field'] == "ten_san_pham" && isset($_GET['sort']) && $_GET['sort'] == "desc") { ?> selected <?php } ?>
                                            value="?<?= $sortParam ?>field=ten_san_pham&sort=desc">Tên sản phẩm z-a
                                        </option>
                                        <option <?php if (isset($_GET['field']) && $_GET['field'] == "ten_san_pham" && isset($_GET['sort']) && $_GET['sort'] == "asc") { ?> selected <?php } ?>
                                            value="?<?= $sortParam ?>field=ten_san_pham&sort=asc">Tên sản phẩm a-z
                                        </option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end Lọc sản phẩm -->
                    <!-- List sản phẩm -->

                    <div class="row">
                        <?php
                        while ($row = mysqli_fetch_array($query)) {
                            ; ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
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

                    <?php include './pagination.php'; ?>


                </div>
            </div>
        </div>

        <!-- Footer Section Begin -->

        <?php
        require("layout/footer.php")
        ; ?>
</body>

</html>