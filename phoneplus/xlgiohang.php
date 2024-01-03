<?php
session_start();
include("commo/connect.php");

//lấy mã sản phẩm
$san_pham_id = $_GET["san_pham_id"];

//Kiểm tra nếu chưa đăng nhập

if (isset($_SESSION["makhach"]))
    $account = $_SESSION["makhach"];

//Thêm đơn đặt hàng
//Kiểm tra xem với acc hiện tại đã tồn tại giỏ hàng chưa nếu có rồi không thêm giỏ hàng mới
$sql_search = "SELECT * FROM tbl_order WHERE makhach=$account AND chedo=0";
$result = $ketnoi->query($sql_search);
//
if ($result->num_rows > 0) {
    $sql = "SELECT sohoadon FROM tbl_order WHERE makhach ='$account' AND chedo = 0 ORDER BY ngaychonhang DESC LIMIT 1";
    $result = $ketnoi->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $sohoadon = $row["sohoadon"];

        $sql = "SELECT gia_ban FROM tbl_sp WHERE san_pham_id = '$san_pham_id'"; //giá này lấy từ bảng sản phẩm dùng để insert vào cthd
        $result = $ketnoi->query($sql);
        //kiểm tra xem nếu sp đã tồn tại thì cập nhật số lượng, chưa tồn tại thì thêm mới
        if ($result) {
            $row = $result->fetch_assoc();
            $gia_ban = $row["gia_ban"];

            // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
            $existing_product_sql = "SELECT soluong FROM tbl_orderdetail WHERE sohoadon = $sohoadon AND san_pham_id = '$san_pham_id'";
            $existing_product_result = $ketnoi->query($existing_product_sql);

            if ($existing_product_result->num_rows > 0) {
                // Sản phẩm đã tồn tại, cập nhật số lượng
                $existing_row = $existing_product_result->fetch_assoc();
                $new_quantity = $existing_row["soluong"] + 1;

                $update_quantity_sql = "UPDATE tbl_orderdetail SET soluong = $new_quantity WHERE sohoadon = $sohoadon AND san_pham_id = '$san_pham_id'";
                if ($ketnoi->query($update_quantity_sql) === TRUE) {
                    echo "Cập nhật số lượng sản phẩm";
                    header("location: giohang.php");
                }
            } else {
                // Sản phẩm chưa tồn tại, thêm mới
                $sql_insert_ctdh = "INSERT INTO tbl_orderdetail(sohoadon, san_pham_id, giaban, soluong) VALUES ($sohoadon, '$san_pham_id', $gia_ban, 1)";
                if ($ketnoi->query($sql_insert_ctdh) === TRUE) {
                    header("location: giohang.php");
                }
            }
        }
    }
} else //chưa tồn tại giỏ hàng
{
    $sql_insert = "insert into tbl_order(makhach,chedo) values('$account',0)";
    echo $sql_insert;
    if ($ketnoi->query($sql_insert) == TRUE) {
        //thêm được đơn đặt hàng
        //them chi tiet dathang
        //echo "Thêm thành công";
        //Lấy lại số hóa đơn vừa thêm
        $sql = "select  sohoadon from tbl_order Where makhach ='$account' and chedo=0 order by ngaychonhang desc limit 1";
        //echo $sql;
        $result = $ketnoi->query($sql);
        $row = $result->fetch_assoc();
        $sohoadon = $row["sohoadon"];
        //echo "sohoadon".$sohoadon;
        $sql = "select gia_ban from tbl_sp where san_pham_id='$san_pham_id'";
        $result = $ketnoi->query($sql);
        $row = $result->fetch_assoc();
        $gia_ban = $row["gia_ban"];
        $sql_insert_ctdh = "insert into tbl_orderdetail(sohoadon,san_pham_id,giaban,soluong) values($sohoadon,'$san_pham_id',$gia_ban,1)";
        if ($ketnoi->query($sql_insert_ctdh) == TRUE) {
            header("location: giohang.php");
        } else
            echo "Lỗi thêm chi tiết đặt hàng";
    } else
        echo "Lỗi thêm đơn đặt hàng";
}
?>