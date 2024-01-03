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
                                <a href="admin/dang_nhap.php">Đăng nhập quản trị</a>
                                <a href="customer/dang_nhap.php">Đăng nhập</a>
                                <a href="customer/dangky.php">Đăng ký</a>
                            <?php } else { ?>
                                <span style="color: white; margin-right:50px">Xin chào:
                                    <?php echo $_SESSION["tenkhach"]; ?>
                                </span>
                                <a href='/phoneplus/customer/xllogout.php'>Đăng xuất</a>
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
                    <li class="active"><a href="./index.php" style="color:white">Trang chủ</a></li>
                    <li><a href="./san_pham.php" style="color:white">Sản phẩm</a></li>



                    <li><a style="color:white">Danh mục</a>
                        <ul class="dropdown">
                            <?php
                            $ket_noi = mysqli_connect("localhost", "root", "", "phoneplus");
                            $sql = "SELECT * FROM tbl_danh_muc";
                            $sanpham = mysqli_query($ket_noi, $sql);
                            while ($row = mysqli_fetch_array($sanpham)) {
                                ; ?>


                                <li><a href="san_pham_theo_danh_muc.php?id_dm=<?php echo $row["danh_muc_id"]; ?>"><?php echo $row["ten_danh_muc"] ?></a></li>

                            <?php }
                            ; ?>
                        </ul>
                    </li>




                    <li><a href="./tin_tuc.php" style="color:white">Tin tức</a></li>
                    <li><a href="./lien_he.php" style="color:white">Liên hệ</a></li>
                    <li>
                        <form class="search-form" enctype="application/x-www-form-urlencoded" method="get"
                            action="timkiem.php" name="frm_search">

                            <input id="search-quick" type="text" name="ten" placeholder="Tìm kiếm sản phẩm"
                                autocomplete="off" minlength="1">
                            <button class="submit"><i class="fa fa-search"></i></button>
                        </form>

                    </li>

                    <li>
                        <div class="giohang">
                            <a href="giohang.php"><img style="height: 40px; width: auto; margin-top: 0px"
                                    src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/64/000000/external-shopping-cart-interface-kiranshastry-solid-kiranshastry-1.png" />
                            </a>
                        </div>

                    </li>
                    <li>
                        <?php
                        // Hiện log in log out
                        if (isset($_SESSION["tenkhach"])) { ?>
                            <a href="donhang.php" style="color: white;">Đơn mua</a>
                        <?php } ?></a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
    <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>