<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/yoyo.ico" type="image/ico" />

  <title>PHONEPLUS |Trang đăng nhập quản trị </title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">

  <script type="text/javascript">
    function validateForm() {
      // Bước 1: Lấy dữ liệu để check
      var taikhoan = document.getElementById("txtTaiKhoan").value;
      var matkhau = document.getElementById("txtMatkhau").value;

      // Bước 2: Kiểm tra dữ liệu hợp lệ hay không?
      if (taikhoan == "") {
        alert("Bạn chưa nhập tên tài khoản");
      } else if (matkhau == "") {
        alert("Bạn chưa nhập mật khẩu");
      } else {
        return true;
      }

      return false;
    }

  </script>
</head>



<body class="login"
  style="background-image: url('../img/anhdangnhap.jpg');height: 900px;background-repeat: no-repeat; background-size: 100% 100%"
  ;>
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <div class="col-md-12" style="display: flex; justify-content: space-between;"></div>

          <form method="post" action="dang_nhap_thuc_hien.php" onsubmit="return validateForm()">
            <br><br>
            <h1 style="color: white; text-shadow: black 0.1em 0.1em 0.2em"><b>Đăng nhập hệ thống quản trị</b></h1>
            <div>
              <input type="text" class="form-control" placeholder="Tên đăng nhập" required="" name="txtTaiKhoan"
                id="txtTaiKhoan" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Mật khẩu" required="" name="txtMatKhau"
                id="txtMatKhau" />
            </div>
            <div>
              <button style="background: #4a90e2;border-color: black;padding: 10px;color:  #fff;border-radius: 10px;"
                type="submit">Đăng nhập hệ thống</button>
            </div>
            <div class="clearfix"></div>
          </form>

        </section>
        <form action="trovehome.php" method="post">
          <div style="display: flex; justify-content:center; align-items: center;">
            <br><br><br><br><br><br><br><br><br>
            <button type="submit"
              style=" align-items: center; margin-top: 80px; background-color: black; height: 45px; width: 180px; color: white; font-size: 16px; border-style: solid; border-color: #black;">
              <img style="height: 16px; width: auto;">
              Trở về trang chủ
            </button>
          </div>
        </form>
      </div>

    </div>
  </div>

</body>

</html>