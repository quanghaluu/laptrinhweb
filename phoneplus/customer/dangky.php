<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/yoyo.ico" type="image/ico" />

  <title>YOYO |Trang đăng ký </title>

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

  <script>
    function validateForm() {
      // Bước 1: Lấy dữ liệu để check
      var tenkhach = document.getElementById("txtTaiKhoan").value;
      var sdt = document.getElementById("txtSDT").value;
      var email = document.getElementById("txtEmail").value;
      var matkhau = document.getElementById("txtMatkhau").value;
      //var repass = document.getElementById("txtrepass").value;

      // Bước 2: Kiểm tra dữ liệu hợp lệ hay không?
      if (tenkhach == "") {
        window.alert("Bạn chưa nhập tên tài khoản");
        $("#txtTaiKhoan").focus();
      }
      else if (sdt == "") {
        alert("Bạn chưa nhập số điện thoại");
        $("#txtSDT").focus();

      }
      else if (email == "") {
        alert("Bạn chưa nhập Email");
        $("#txtEmail").focus();

      }
      else if (matkhau == "") {
        alert("Bạn chưa nhập mật khẩu");
        $("#txtMatKhau").focus();
      }
      // else if (repass == "") {
      //     alert("Bạn chưa nhập lại mật khẩu");
      //     $("#txtrepass").focus();  
      // } 
      // else if (repass!=matkhau) {
      //     alert("Mật khẩu chưa trùng khớp");
      //     $("#txtrepass").focus(); 
      // }         
      else {
        //alert("Đăng kí tài khoản thành công");
        return true;

      }

      return false;
    }

  </script>
</head>

<body class="login"
  style="background-image: url('../img/nendangky.jpg');height: 900px;background-repeat: no-repeat; background-size: 100% 100%;">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <div
            style="background-color: rgb(143, 196, 240);border-radius: 30px; height: 800px; width:600px; align-items:center;  display: flex; justify-content: center; margin-right: 300px; margin-left: 300px;  ">
            <div style="background-color: rgb(143, 196, 240); height: 500px ; width:450px;">
              <div class="col-md-12"></div>

              <form method="post" onsubmit="return validateForm()" action="xldangky.php" name="formdk">
                <br><br>
                <h1 style="color: white; text-shadow: black 0.1em 0.1em 0.2em"><b>Đăng ký tài khoản</b></h1>
                <div>
                  <input type="text" class="form-control" placeholder="Tên đăng nhập" required="" name="txtTaiKhoan"
                    id="txtTaiKhoan" />
                </div>
                <div>
                  <input type="text" class="form-control" placeholder="Số điện thoại" required="" name="txtSDT"
                    id="txtSDT" />
                </div>
                <div>
                  <input type="email" class="form-control" placeholder="Email" required="" name="txtEmail"
                    id="txtEmail" />
                </div>
                <div>
                  <input type="password" class="form-control" placeholder="Mật khẩu" required="" name="txtMatKhau"
                    id="txtMatKhau" />
                </div>
                <!-- <div>
                <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" required="" name="txtrepass" id="repass" />
              </div> -->
                <div class="checkbox">
                  <label style="color:white;"><input type="checkbox" name="remember"> Nhớ tôi </label>
                </div>
                <div>
                  <button
                    style="background: #4a90e2;border-color: black;padding: 10px;color:  #fff;border-radius: 30px;"
                    type="submit">Đăng ký</button>
                </div>
                <div>
                  <scan style="color:black;">Bạn đã có tài khoản? </scan> <b><a href="../customer/dang_nhap.php">Đăng
                      nhập ngay!</a></b>
                </div>

                <div class="clearfix"></div>
              </form>
            </div>
            <br><br><br><br><br><br><br><br><br>



            </button>
          </div>
          </form>

      </div>
      </section>
    </div>

    <form action="trovehome.php" method="post">
      <div style="display: flex; justify-content:center; align-items: center; ">
        <br><br><br><br><br><br><br><br><br>
        <button type="submit"
          style=" align-items: center; margin-top: 550px; margin-right: 900px; background-color: black; height: 45px; width: 180px; color: white; font-size: 16px; border-style: solid; border-color: #black;">
          <img style="height: 16px; width: auto;">
          Trở về trang chủ
      </div>
  </div>


  <div>

    <div>
</body>

</html>