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
  <link rel="icon" href="images/phoneplus.png" type="image/png" />

  <title>PHONEPLUS| Trang quản trị đơn hàng</title>

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
          <div class="right_col" role="main">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <h1>QUẢN TRỊ ĐƠN HÀNG</h1>
                <div>
                  <!-- 
                    <p style="text-align: right;"><a href="sanpham-them-moi.php">Thêm mới <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></p> -->

                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="text-align: center;">STT</th>
                        <th style="text-align: center;">Mã đơn hàng</th>
                        <th style="text-align: center;">Ngày chọn hàng</th>
                        <th style="text-align: center;">Tên người nhận</th>
                        <th style="text-align: center;">Ngày đặt hàng</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      // Bước 1: Kết nối đến CSDL
                      include("../commo/connect.php");
                      //Bước 2: Hiển thị các dữ liệu trong bảng tbl ra đây
                      $sql = "
                        SELECT * FROM tbl_order inner join tbl_khachhang on tbl_order.makhach=tbl_khachhang.makhach
                        ORDER BY sohoadon DESC ";

                      $dulieu = mysqli_query($ketnoi, $sql);
                      $i = 0;
                      while ($row = mysqli_fetch_array($dulieu)) {
                        $i++;
                        ; ?>
                        <tr>
                          <th style="text-align: center;" scope="row">
                            <?php echo $i; ?>
                          </th>
                          <td style="text-align: center;">
                            <?php echo $row["sohoadon"]; ?>
                          </td>
                          <td style="text-align: center;">
                            <?= date($row['ngaychonhang']) ?>
                          </td>
                          <td style="text-align: center;">
                            <?php echo $row["tenkhach"]; ?>
                          </td>
                          <!--<td style="text-align: center;"><a href="order_print.php?id=<?= $row['id'] ?>" target="_blank">In</a></td>-->
                          <td style="text-align: center;">
                            <?= date($row['ngaythanhtoan']) ?>
                          </td>
                        </tr>
                        <?php
                      }
                      ; ?>
                    </tbody>
                  </table>


                </div>
              </div>
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