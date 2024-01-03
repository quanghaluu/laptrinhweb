<div class="card">
    <div class="card-heading">
        <a data-toggle="collapse" data-target="#collapseOne">Danh mục</a>
    </div>
    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
        <div class="card-body">
            <div class="shop__sidebar__categories">
                <ul class="nice-scroll">
                    <?php

                    $ket_noi = mysqli_connect("localhost", "root", "", "phoneplus");
                    $sql = "SELECT * FROM tbl_danh_muc

                ";
                    $sanpham = mysqli_query($ket_noi, $sql);
                    while ($row = mysqli_fetch_array($sanpham)) {
                        ; ?>
                        <li><a href="san_pham_theo_danh_muc.php?id_dm=<?php echo $row["danh_muc_id"]; ?>"><?php echo $row["ten_danh_muc"] ?></a></li>
                    <?php }
                    ; ?>


                </ul>
            </div>
        </div>
    </div>
</div>