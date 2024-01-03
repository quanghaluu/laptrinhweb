<!DOCTYPE html>
<html lang="zxx">
<?php
require("layout/header.php");
include("commo/connect.php");
; ?>

<body id="home">
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>


    <!-- Header Section Begin -->
    <?php
    require("layout/menu.php")
    ; ?>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->

    <style type="text/css">
        a.active {
            color: black;
        }

        .nav-tabs {
            border-bottom: 5px solid #ddd;
            text-align: center;
            display: flex;
            justify-content: center;
        }

        .nav-tabs li a {
            display: inline-block;
            padding: 20px;
            font-size: 19px;
            text-align: center;
            position: relative;
            color: #ffba0d;
            background: transparent;
            text-decoration: none;

        }

        .nav-tabs li a: after {
            background: lightgoldenrodyellow;
        }


        .nav-tabs li.active a,
        .nav-tabs li:hover a {
            background: lightgoldenrodyellow;
        }
    </style>



    <!--start tabs-->
    <div class="col-md-12">
        <div class="tabs tabs-main">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#one" data-toggle="tab">CHI NHÁNH ĐỐNG ĐA</a></li>
                <li><a href="#two" data-toggle="tab">CHI NHÁNH SƠN TÂY</a></li>
            </ul>
            <div class="tab-content">

                <!--Start Tab Item #1-->
                <div class="tab-pane in active" id="one">
                    <div class="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.5883669608406!2d105.82623827411732!3d21.009131388454733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac800f450807%3A0x419a49bcd94b693a!2zSOG7jWMgVmnhu4duIE5nw6JuIEjDoG5n!5e0!3m2!1svi!2s!4v1692638799087!5m2!1svi!2s"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <!--End Tab-->

                <!--Start Tab Item #2-->
                <div class="tab-pane" id="two">
                    <div class="map"><iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14887.783069093477!2d105.46574692648414!3d21.114728218837357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31345f46e3190b59%3A0xab93fc0e31308a8a!2zSOG7jWMgVmnhu4duIE5nw6JuIEjDoG5nIC0gQ8ahIFPhu58gxJDDoG8gVOG6oW8gU8ahbiBUw6J5!5e0!3m2!1svi!2s!4v1692638904314!5m2!1svi!2s"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Map End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                        <div class="section-title">
                            <span>Thông tin</span>
                            <h2>Liên hệ Phoneplus</h2>
                            <h6> Một vài "địa chỉ" mà bạn có thể liên hệ với chúng mình ^^: </h6>
                            <p>- Facebook:
                                <a href="#">https://www.facebook.com/PhonePlus </a> <br>
                                - Instagram:
                                <a href="#">https://www.instagram.com/PhonePlus/ </a> <br>
                                - Shoppe:
                                <a href="#">https://shopee.vn/PhonePlus.official </a> <br>
                            </p>
                        </div>
                        <ul>
                            <li>
                                <h4>TP. Hà Nội</h4>
                                <p>12 Chùa Bộc, Quang Trung, Đống Đa, Thanh Xuân, Hà Nội<br />+84 977 230 660</p>
                            </li>
                            <li>
                                <h4>TP. Hà Nội</h4>
                                <p>Phố Thanh Vị, Thanh Mỹ, Sơn Tây, Hà Nội, Việt Nam <br />+84 904 839 203</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="contact__form">
                        <form action="lienhethuchien.php" id="contact" method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="text" placeholder="Họ & tên" name="HoTen" id="name">
                                </div>
                                <div class="col-lg-6">
                                    <input placeholder="Số điện thoại" type="sodienthoai" name="SoDienThoai">
                                </div>
                                <div class="col-lg-6">
                                    <input placeholder="Email" type="email" name="Email">
                                </div>
                                <div class="col-lg-12">
                                    <input placeholder="Tiêu đề" type="tieude" name="TieuDe"></input>
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="NoiDung" placeholder="Nội dung"></textarea>
                                    <button type="submit" class="site-btn">Gửi tin nhắn</button>
                                    <br><br>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Contact Section End -->
    <!-- Latest Blog Section End -->

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        $(document).ready(function () {
            $('.nav-tabs li').click(function () {
                $('.nav-tabs li').removeClass('active');
                $(this).addClass('active');

            });
        });
    </script>


    <!-- Footer Section Begin -->

    <?php
    require("layout/footer.php")
    ; ?>
</body>

</html>