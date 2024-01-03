<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn mua</title>
    <link rel="stylesheet" href="css/giohang.css">

    <?php
    require("layout/header.php"); // đã có Session_start
    ; ?>
    <!-- Header Section Begin -->
    <?php
    require("layout/menu.php");
    ?>

</head>

<body>

    <?php
    include("commo/connect.php");

    ?>

    <div class="container">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h2
                style="height: 100px; width: 180px; line-height: 100px; font-weight: 600; color: #fff; background-color: #141249; text-align: center; border-radius: 0 115px 115px 0; ">
                Đơn mua</h2>

            <?php
            $account = 'abc';
            if (isset($_SESSION["makhach"]))
                $account = $_SESSION["makhach"];
            $sql = "SELECT tbl_order.Sohoadon as shd, tbl_sp.san_pham_id, anh_san_pham, ten_san_pham, gia_ban, tbl_orderdetail.soluong as sl, ngaydathang, ten, sdt, diachi, ghichu";
            $sql .= " FROM tbl_order INNER JOIN tbl_orderdetail ON tbl_order.Sohoadon = tbl_orderdetail.Sohoadon";
            $sql .= " INNER JOIN tbl_sp ON tbl_orderdetail.san_pham_id = tbl_sp.san_pham_id WHERE makhach = '$account' AND chedo = 1";
            $sql .= " ORDER BY ngaydathang DESC"; // Sx theo thứ tự giảm dần của ngaydathang để hiển thị các hóa đơn mới nhất trước (csdlđặt datetime, chỉ date không thì ko chạy)
            // echo $sql;
            $result = $ketnoi->query($sql);

            $currentOrder = null; // Biến để theo dõi đơn hàng hiện tại
            while ($row = $result->fetch_assoc()) {
                // Kiểm tra nếu đơn hàng thay đổi thì đóng thẻ div trước và mở thẻ div mới cho đơn hàng mới
                if ($currentOrder !== $row["shd"]) {
                    if ($currentOrder !== null) {
                        echo '<div class="total-amount" style="font-weight: bold; color: blue; margin-left: 80%;font-size: large;">Tổng tiền: ' . $totalAmount . ' đ </div>'; // Hiển thị tổng tiền cho đơn hàng
                        echo "</div>"; // Đóng thẻ div cho đơn hàng cũ
                    }
                    echo '<div class="row">';
                    // echo '<div class="col-md-12 order-date" style="font-weight:bold">Số hóa đơn: ' . $row["shd"] . '</div>'; // Hiển thị ngày đặt
                    // echo '<div class="col-md-12 order-date" style="background-color: rgb(106, 201, 252)">Ngày đặt: ' . $row["ngaydathang"] . '</div>'; // Hiển thị ngày đặt
                    // echo '<div class="col-md-12 order-date" style="background-color: rgb(106, 201, 252)">Tên: ' . $row["ten"] . '</div>';
                    // echo '<div class="col-md-12 order-date" style="background-color: rgb(106, 201, 252)">Sđt: ' . $row["sdt"] . '</div>';
                    echo '<div class="col-md-12 order-info" style="background-color: rgb(106, 201, 252)">
                    <h4>Số hóa đơn: ' . $row["shd"] . '</h4>
                        <div class="col-md-4">
                            Ngày đặt: ' . $row["ngaydathang"] . '</div>
                        <div class="col-md-4">
                            Tên: ' . $row["ten"] . '</div>
                        <div class="col-md-4">
                            SĐT: ' . $row["sdt"] . '</div>
                        <div class="col-md-4">
                            Địa chỉ: ' . $row["diachi"] . '</div>
                    </div>';

                    $currentOrder = $row["shd"]; // Cập nhật đơn hàng hiện tại
                    $totalAmount = 0; // Reset tổng tiền cho đơn hàng mới
                }
                $totalAmount += $row["gia_ban"] * $row["sl"]; // Tính tổng tiền của mỗi đơn hàng
                ?>

                <div class="khungsp">
                    <div class="colpic"><img class="anhsp" width="200px" src="<?php echo $row["anh_san_pham"]; ?>"
                            alt="Ảnh sản phẩm"></div>
                    <div class="khungtt">
                        <input type="hidden" value="<?php echo $row["shd"]; ?>" name="sohoadon">

                        <div class="col"><b>
                                <h3>
                                    <?php echo $row["ten_san_pham"]; ?>
                                </h3>
                            </b></div>
                        <div class="col">Giá:
                            <?php echo $row["gia_ban"]; ?>
                        </div>
                        <div class="col">Số lượng: <input readonly class="smallinput" type="text"
                                value="<?php echo $row["sl"]; ?>" name="<?php echo "sl" . $i; ?>" style="text-align: center;">
                        </div>


                    </div>
                    <div class="colgia" style="padding-top: 5%;color: blue;">Giá tiền:
                        <?php echo $row["gia_ban"] * $row["sl"]; ?>
                    </div>
                </div>

                <?php
            }

            if ($currentOrder !== null) {
                echo '<div class="total-amount" style="font-weight: bold; color: blue; margin-left: 80%;font-size: large">Tổng tiền: ' . $totalAmount . ' đ </div>'; // Hiển thị tổng tiền cho đơn hàng cuối cùng
                echo "</div>"; // Đóng thẻ div cho đơn hàng cuối cùng
            }
            ?>
        </div>
    </div>

</body>

</html>