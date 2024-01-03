<?php
session_start();
if (!isset($_SESSION['tai_khoan'])) {
    header("Location: dang_nhap.php");
}
; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/phoneplus.png" type="image/png">

    <title>PHONEPLUS | Trang quản trị</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

</head>

<body class="nav-md" style="background-color:#212529;">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <?php include("top.php"); ?>
                    <!-- page content -->
                    <div class="right_col" role="main"
                        style="background-image: 'https://cf.shopee.vn/file/20e412383a477faec24caf8544863e8f'">
                        <br><br><br>


                        <?php
                        //1. ket noi den may chu du lieu va co so du lieu, lau them moi sua, xoa du lieu
                        include("../commo/connect.php");

                        //2. viet cau lenh truy van lay ra du lieu mong muon
                        $sql = "SELECT * FROM tbl_tin_tuc";
                        $sql1 = "SELECT * FROM tbl_sp";
                        $sql2 = "SELECT * FROM tbl_danh_muc";
                        $sql3 = "SELECT * FROM tbl_kieu_san_pham";
                        $sql4 = "SELECT * FROM tbl_su_kien";
                        $sql5 = "SELECT * FROM tbl_lien_he";
                        $sql6 = "SELECT * FROM `tbl_order`";
                        $sql7 = "SELECT * FROM tbl_admin";
                        $sql8 = "SELECT * FROM tbl_khachhang";

                        //3. thuc thi cau lech truy van
                        $noidungtruyvan = $ketnoi->query($sql);
                        $noidungtruyvan1 = $ketnoi->query($sql1);
                        $noidungtruyvan2 = $ketnoi->query($sql2);
                        $noidungtruyvan3 = $ketnoi->query($sql3);
                        $noidungtruyvan4 = $ketnoi->query($sql4);
                        $noidungtruyvan5 = $ketnoi->query($sql5);
                        $noidungtruyvan6 = $ketnoi->query($sql6);
                        $noidungtruyvan7 = $ketnoi->query($sql7);
                        $noidungtruyvan8 = $ketnoi->query($sql8);

                        $soluong = mysqli_num_rows($noidungtruyvan);
                        $soluong1 = mysqli_num_rows($noidungtruyvan1);
                        $soluong2 = mysqli_num_rows($noidungtruyvan2);
                        $soluong3 = mysqli_num_rows($noidungtruyvan3);
                        $soluong4 = mysqli_num_rows($noidungtruyvan4);
                        $soluong5 = mysqli_num_rows($noidungtruyvan5);
                        $soluong6 = mysqli_num_rows($noidungtruyvan6);
                        $soluong7 = mysqli_num_rows($noidungtruyvan7);
                        $soluong8 = mysqli_num_rows($noidungtruyvan8);
                        ; ?>
                        <h1>QUẢN TRỊ HỆ THỐNG</h1>
                        <br><br>

                        <div id="layoutSidenav_content">
                            <main>
                                <div class="container-fluid px-4">

                                    <div class="row">
                                        <div class="col-md-3" style="margin-bottom: 30px;">
                                            <div class="card bg-primary text-white mb-4"
                                                style="border-radius: 5px; background-color: #0D6EFD">
                                                <br>
                                                <div style="margin-left: 15px; font-size: 16px;">Quản trị tin tức<br>(
                                                    <?php echo $soluong; ?> tin tức)
                                                </div>
                                                <hr style="margin-bottom: 5px;">
                                                <div
                                                    class="card-footer d-flex align-items-center justify-content-between">
                                                    <a style="margin-left: 15px;color: white;"
                                                        href="tin_tuc_quan_tri.php"><u>Chi tiết</u></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3" style="margin-bottom: 30px;">
                                            <div class="card bg-primary text-white mb-4"
                                                style="border-radius: 5px; background-color: #F79F1F">
                                                <br>
                                                <div style="margin-left: 15px; font-size: 16px">Quản trị sản phẩm<br>(
                                                    <?php echo $soluong1; ?> sản phẩm)
                                                </div>
                                                <hr style="margin-bottom: 5px">
                                                <div
                                                    class="card-footer d-flex align-items-center justify-content-between">
                                                    <a style="margin-left: 15px;color: white;"
                                                        href="sanpham-list.php"><u>Chi tiết</u></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3" style="margin-bottom: 30px;">
                                            <div class="card bg-primary text-white mb-4"
                                                style="border-radius: 5px; background-color: #05C46B">
                                                <br>
                                                <div style="margin-left: 15px; font-size: 16px">Quản trị danh mục<br>(
                                                    <?php echo $soluong2; ?> danh mục)
                                                </div>
                                                <hr style="margin-bottom: 5px">
                                                <div
                                                    class="card-footer d-flex align-items-center justify-content-between">
                                                    <a style="margin-left: 15px;color: white;" href="dm-list.php"><u>Chi
                                                            tiết</u></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3" style="margin-bottom: 30px;">
                                            <div class="card bg-primary text-white mb-4"
                                                style="border-radius: 5px; background-color: #7158e2">
                                                <br>
                                                <div style="margin-left: 15px; font-size: 16px">Quản trị kiểu sản
                                                    phẩm<br>(
                                                    <?php echo $soluong3; ?> loại)
                                                </div>
                                                <hr style="margin-bottom: 5px">
                                                <div
                                                    class="card-footer d-flex align-items-center justify-content-between">
                                                    <a style="margin-left: 15px;color: white;"
                                                        href="kieu-list.php"><u>Chi tiết</u></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3" style="margin-bottom: 30px;">
                                            <div class="card bg-primary text-white mb-4"
                                                style="border-radius: 5px; background-color: #F78FB3">
                                                <br>
                                                <div style="margin-left: 15px; font-size: 16px">Quản trị sự kiện<br>(
                                                    <?php echo $soluong4; ?> sự kiện)
                                                </div>
                                                <hr style="margin-bottom: 5px">
                                                <div
                                                    class="card-footer d-flex align-items-center justify-content-between">
                                                    <a style="margin-left: 15px;color: white;"
                                                        href="su-kien-list.php"><u>Chi tiết</u></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3" style="margin-bottom: 30px;">
                                            <div class="card bg-primary text-white mb-4"
                                                style="border-radius: 5px; background-color: #4b4b4b">
                                                <br>
                                                <div style="margin-left: 15px; font-size: 16px">Quản trị liên hệ<br>(
                                                    <?php echo $soluong5; ?> liên hệ)
                                                </div>
                                                <hr style="margin-bottom: 5px">
                                                <div
                                                    class="card-footer d-flex align-items-center justify-content-between">
                                                    <a style="margin-left: 15px;color: white;"
                                                        href="quan_tri_lien_he.php"><u>Chi tiết</u></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3" style="margin-bottom: 30px;">
                                            <div class="card bg-primary text-white mb-4"
                                                style="border-radius: 5px; background-color: #ff3838">
                                                <br>
                                                <div style="margin-left: 15px; font-size: 16px">Quản trị đơn hàng<br>(
                                                    <?php echo $soluong6; ?> đơn hàng)
                                                </div>
                                                <hr style="margin-bottom: 5px">
                                                <div
                                                    class="card-footer d-flex align-items-center justify-content-between">
                                                    <a style="margin-left: 15px;color: white;"
                                                        href="order_list.php"><u>Chi tiết</u></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3" style="margin-bottom: 30px;">
                                            <div class="card bg-primary text-white mb-4"
                                                style="border-radius: 5px; background-color: #FFCA00">
                                                <br>
                                                <div style="margin-left: 15px; font-size: 16px">Quản trị admin<br>(
                                                    <?php echo $soluong7; ?> admin)
                                                </div>
                                                <hr style="margin-bottom: 5px">
                                                <div
                                                    class="card-footer d-flex align-items-center justify-content-between">
                                                    <a style="margin-left: 15px;color: white;"
                                                        href="admin-list.php"><u>Chi tiết</u></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3" style="margin-bottom: 30px;">
                                        <div class="card bg-primary text-white mb-4"
                                            style="border-radius: 5px; background-color: #0D6GFD">
                                            <br>
                                            <div style="margin-left: 15px; font-size: 16px;">Quản trị khách hàng<br>(
                                                <?php echo $soluong8; ?> khách hàng)
                                            </div>
                                            <hr style="margin-bottom: 5px;">
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                                <a style="margin-left: 15px;color: white;"
                                                    href="khachhang_list.php"><u>Chi tiết</u></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </main>
                        </div>
                    </div>


                    <!-- /page content -->

                    <?php include("bottom.php"); ?>
                </div>
            </div>

            <!-- jQuery -->
            <script src="../vendors/jquery/dist/jquery.min.js"></script>
            <!-- Bootstrap -->
            <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
            <!-- FastClick -->
            <script src="../vendors/fastclick/lib/fastclick.js"></script>
            <!-- NProgress -->
            <script src="../vendors/nprogress/nprogress.js"></script>
            <!-- Chart.js -->
            <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
            <!-- gauge.js -->
            <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
            <!-- bootstrap-progressbar -->
            <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
            <!-- iCheck -->
            <script src="../vendors/iCheck/icheck.min.js"></script>
            <!-- Skycons -->
            <script src="../vendors/skycons/skycons.js"></script>
            <!-- Flot -->
            <script src="../vendors/Flot/jquery.flot.js"></script>
            <script src="../vendors/Flot/jquery.flot.pie.js"></script>
            <script src="../vendors/Flot/jquery.flot.time.js"></script>
            <script src="../vendors/Flot/jquery.flot.stack.js"></script>
            <script src="../vendors/Flot/jquery.flot.resize.js"></script>
            <!-- Flot plugins -->
            <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
            <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
            <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
            <!-- DateJS -->
            <script src="../vendors/DateJS/build/date.js"></script>
            <!-- JQVMap -->
            <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
            <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
            <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
            <!-- bootstrap-daterangepicker -->
            <script src="../vendors/moment/min/moment.min.js"></script>
            <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

            <!-- Custom Theme Scripts -->
            <script src="../build/js/custom.min.js"></script>

</body>

</html>