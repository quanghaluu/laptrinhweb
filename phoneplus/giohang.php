<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="css/giohang.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <?php
    require("layout/header.php"); // đã có Session_start
    ; ?>
    <!-- Header Section  -->
    <?php
    require("layout/menu.php")
    ; ?>

    <!-- Cảnh báo để trống thông tin đặt hàng -->
    <script>
        function validateForm() {
            var name = document.getElementById("name").value;
            var phone = document.getElementById("phone").value;
            var address = document.getElementById("address").value;
            var dinhdangphone = /^\d{10}$/;

            var errorMessages = [];

            if (name.trim() === "") {
                errorMessages.push("Vui lòng nhập tên.");
            }

            if (phone.trim() === "") {
                errorMessages.push("Vui lòng nhập số điện thoại.");
            } else if (!dinhdangphone.test(phone)) {
                errorMessages.push("Số điện thoại không hợp lệ.");
            }

            if (address.trim() === "") {
                errorMessages.push("Vui lòng nhập địa chỉ.");
            }

            var errorList = document.getElementById("errorList");
            if (errorMessages.length > 0) {
                var errorMessageList = "<ul>";
                for (var i = 0; i < errorMessages.length; i++) {
                    errorMessageList += "<li>" + errorMessages[i] + "</li>";
                }
                errorMessageList += "</ul>";

                errorList.innerHTML = errorMessageList;
                errorList.style.display = "block";
                return false;
                errorList.style.display = "none";
                return true;
            }
        }
    </script>
</head>



<body>
    <?php include("commo/connect.php"); ?>

    <div class="container">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h1
                style="height: 100px; width: 180px; line-height: 100px; font-weight: 600; color: #fff; background-color: #141249; text-align: center; border-radius: 0 115px 115px 0; ">
                Giỏ hàng</h1>
            <a href="san_pham.php" class="button-link">Thêm sản phẩm</a>
            <?php
            // Kiểm tra xem giỏ hàng có trống không
            $cartIsEmpty = true;
            $account = 'abc';
            if (isset($_SESSION["makhach"])) {
                $account = $_SESSION["makhach"];
            }
            $sql = "SELECT tbl_order.Sohoadon as shd, tbl_sp.san_pham_id, anh_san_pham, ten_san_pham, gia_ban, tbl_orderdetail.soluong as sl FROM tbl_order INNER JOIN tbl_orderdetail ON tbl_order.Sohoadon=tbl_orderdetail.Sohoadon";
            $sql .= " INNER JOIN tbl_sp ON tbl_orderdetail.san_pham_id=tbl_sp.san_pham_id WHERE makhach='$account' AND chedo=0";
            $result = $ketnoi->query($sql);
            while ($row = $result->fetch_assoc()) {
                $cartIsEmpty = false;
                break; // Dừng vòng lặp ngay khi tìm thấy sản phẩm trong giỏ hàng
            }

            if ($cartIsEmpty) {
                echo "<center><h2>Giỏ hàng rỗng</h2></center>";
            } else {
                ?>

                <table class="table table-bordered" style="width: 90%; margin: auto">
                    <tr>
                        <th> STT
                        </th>
                        <th> Ảnh
                        </th>
                        <th> Tên sản phẩm
                        </th>
                        <th> Giá hàng
                        </th>
                        <th> Số lượng
                        </th>
                        <th> Thành tiền
                        </th>
                        <th> Xóa
                        </th>
                    </tr>

                    <form name="frmdathang" action="xldathang.php" method="POST" onsubmit="return validateForm();">
                        <?php
                        $account = 'abc';
                        if (isset($_SESSION["makhach"]))
                            $account = $_SESSION["makhach"];
                        $sql = "select tbl_order.Sohoadon as shd, tbl_sp.san_pham_id, anh_san_pham,ten_san_pham,gia_ban,tbl_orderdetail.soluong as sl from tbl_order inner join tbl_orderdetail on tbl_order.Sohoadon=tbl_orderdetail.Sohoadon";
                        $sql .= " inner join tbl_sp on tbl_orderdetail.san_pham_id=tbl_sp.san_pham_id where makhach='$account' and chedo=0";
                        // echo $sql;
                        $result = $ketnoi->query($sql);
                        $i = 1;
                        $tongtien = 0;
                        while ($row = $result->fetch_assoc()) {

                            ?>
                            <tr>
                                <input type="hidden" value="<?php echo $row["shd"]; ?>" name="sohoadon">

                                <td>
                                    <?php echo $i; ?>
                                </td>

                                <input type="hidden" value='<?php echo $row["san_pham_id"]; ?>'
                                    name='<?php echo "san_pham_id" . $i; ?>'>
                                <td><img src="<?php echo $row["anh_san_pham"]; ?>" alt="Ảnh sản phẩm" style="width: 200px;">
                                </td>
                                <td id="tensp">
                                    <?php echo $row["ten_san_pham"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["gia_ban"]; ?>
                                </td>
                                <input type="hidden" value="<?php echo $row["sl"]; ?>" name='<?php echo "sl" . $i; ?>'>
                                <td>
                                    <b style="font-size: 19px;"><a
                                            href="capnhapgiohang.php?action=tru&shd=<?= $row['shd'] ?>&masp=<?= $row['san_pham_id'] ?>&sl=<?= $row['sl'] ?>">
                                            - </a></b>
                                    <scan style="font-size: 18px;"> |
                                        <?php echo $row["sl"]; ?> | <scan?>
                                            <b style="font-size: 19px;"><a
                                                    href="capnhapgiohang.php?action=cong&shd=<?= $row['shd'] ?>&masp=<?= $row['san_pham_id'] ?>&sl=<?= $row['sl'] ?>">
                                                    + </a></b>
                                </td>

                                <td>
                                    <?php echo $row["gia_ban"] * $row["sl"]; ?>
                                </td>
                                <!-- Sửa lại nút xóa -->
                                <td><a
                                        href="xlxoagiohang.php?action=delete&shd=<?= $row['shd'] ?>&masp=<?= $row['san_pham_id'] ?>">Xóa</a>
                                </td>

                                <?php
                                $i++;
                                $tongtien = $tongtien + $row["gia_ban"] * $row["sl"];
                        }
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td> <b> Tổng Tiền</b> </td>
                            <td></td>
                            <td> </td>
                            <td><b>
                                    <?php echo $tongtien ?>
                                </b> </td>
                        </tr>


                </table>


                <!-- Kết thúc ngoặc Else dòng 53 check giỏ hàng rỗng -->
            <?php } ?>

            <!-- Form thông tin -->
            <div class="contact__form" style="margin-left: 0px; border: gray 1px solid">
                <div class="col">
                    <br>
                    <h4><b>THÔNG TIN ĐẶT HÀNG</b></h4>
                    <br>
                    <div class="col-lg-8">

                        <input type="text" placeholder="Name" value="" name="name" id="name" />


                    </div>
                    <div class="col-lg-8">

                        <input type="text" placeholder="SDT" value="" name="phone" id="phone" />

                    </div>
                    <div class="col-lg-8">

                        <input type="text" placeholder="DiaChi" value="" name="address" id="address" />

                    </div>
                    <div class="col-lg-8">
                        <textarea name="note" placeholder="GhiChu" cols="50" rows="7"></textarea>
                    </div>
                    <div id="errorList" style="color: red; display: none;"></div>
                </div>
            </div>
            <div id="form-button" style="text-align: right; margin-top: 2%; margin-right: 35%;">
                <input style="letter-spacing: 3px;
    padding: 5px 20px; background-color:#141249; color: white;" type="submit" name="dathang" value="Đặt hàng" />
            </div>

        </div>

    </div>
    <input type="hidden" value="<?php echo $i; ?>" name="slmathang">

    </form>

    <?php
    require("layout/footer.php")
    ; ?>


</body>

</html>