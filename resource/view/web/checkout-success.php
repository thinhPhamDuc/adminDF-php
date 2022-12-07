<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();

include '../../../database/database.php';
include '../../../function/function-web.php';

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Adella Fashion 💚 Đặt Hàng Thành Công</title>
    <meta name="description" content="Mặc mới mỗi ngày với thời trang ADELLA. Hơn 100+ mẫu quần áo & phụ kiện nam, nữ lên kệ hàng ngày. MUA SẮM ONLINE & TẠI CỬA HÀNG!">
    <meta name="keywords" content="thời trang">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../../../public/frontend/assetss/images/favicon.png">

    <!-- all css here -->
    <!-- bootstrap v4.3.1 css -->
    <link rel="stylesheet" href="../../../public/frontend/assetss/css/bootstrap.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="../../../public/frontend/assetss/css/animate.css">
    <!-- jquery-ui.min css -->
    <link rel="stylesheet" href="../../../public/frontend/assetss/css/jquery-ui.min.css">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="../../../public/frontend/assetss/css/meanmenu.min.css">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="../../../public/frontend/assetss/css/owl.carousel.css">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="../../../public/frontend/assetss/css/font-awesome.min.css">
    <!-- ionicons.min css -->
    <link rel="stylesheet" href="../../../public/frontend/assetss/css/ionicons.min.css">
    <!-- nivo-slider.css -->
    <link rel="stylesheet" href="../../../public/frontend/assetss/css/nivo-slider.css">
    <!-- style css -->
    <link rel="stylesheet" href="../../../public/frontend/assetss/css/style.min.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="../../../public/frontend/assetss/css/responsive.min.css">
    <!-- modernizr css -->
    <script src="../../../public/frontend/assetss/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body class="checkout-success">
    <!-- page-wraper start -->
    <div id="page-wrapper">
        <!-- header-area start -->
        <header>
            <!-- header-top-area start -->
            <div class="header-top-area" id="sticky-header">
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-md-2">
                            <!-- logo-area start -->
                            <div class="logo-area">
                                <a href="index.php"><img src="../../../public/frontend/assetss/images/logo/1.png" alt="logo"></a>
                            </div>
                            <!-- logo-area end -->
                        </div>
                        <div class="col-md-7 d-none d-lg-block">
                            <!-- menu-area start -->
                            <div class="menu-area">
                                <nav>
                                    <ul>
                                        <li class="active"><a href="index.php">Trang chủ</a></li>
                                        <?php include '../web/partial/menu.php'; ?>
                                        <li><a href="blog.php">Tin Tức</a></li>
                                        <li><a href="contact.php">liên hệ</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- menu-area end -->
                        </div>

                        <?php include '../web/partial/cart-ping.php'; ?>

                        <!-- header-right-area end -->
                    </div>
                </div>
            </div>
    </div>
    <!-- header-top-area end -->
    <!-- mobile-menu-area start -->
    <div class="mobile-menu-area d-lg-none">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                            <ul id="nav">
                                <li><a href="index.php">trang chủ</a></li>
                                <li><a href="shop.php">nam</a>
                                    <ul>
                                        <li><a href="shop.php">áo khoác</a></li>
                                        <li><a href="shop.php">áo len</a></li>
                                        <li><a href="shop.php">áo nỉ chui đầu</a></li>
                                        <li><a href="shop.php">áo sơ mi</a></li>
                                        <li><a href="shop.php">áo phông</a></li>
                                        <li><a href="shop.php">áo polo</a></li>
                                        <li><a href="shop.php">quần jeans</a></li>
                                        <li><a href="shop.php">quần vải</a></li>
                                        <li><a href="shop.php">quần kaki</a></li>
                                        <li><a href="shop.php">quần shorts</a></li>
                                        <li><a href="shop.php">áo phông active</a></li>
                                        <li><a href="shop.php">quần active</a></li>
                                        <li><a href="shop.php">áo mặc nhà</a></li>
                                        <li><a href="shop.php">quần mặc nhà</a></li>
                                        <li><a href="shop.php">áo ba lỗ mặc nhà</a></li>
                                        <li><a href="shop.php">bộ mặc nhà</a></li>
                                        <li><a href="shop.php">áo mặc trong</a></li>
                                        <li><a href="shop.php">quần mặc trong</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop.php">phụ kiện</a>
                                    <ul>
                                        <li><a href="shop.php">khăn ống</a></li>
                                        <li><a href="shop.php">khăn choàng</a></li>
                                        <li><a href="shop.php">khăn quàng cổ</a></li>
                                        <li><a href="shop.php">khăn họa tiết</a></li>
                                        <li><a href="shop.php">mũ len</a></li>
                                        <li><a href="shop.php">mũ hiphop</a></li>
                                        <li><a href="shop.php">mũ bóng chày</a></li>
                                        <li><a href="shop.php">mũ lưỡi chai</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop.php">nữ</a>
                                    <ul>
                                        <li><a href="shop.php">áo khoác</a></li>
                                        <li><a href="shop.php">áo len</a></li>
                                        <li><a href="shop.php">áo nỉ chui đầu</a></li>
                                        <li><a href="shop.php">áo sơ mi</a></li>
                                        <li><a href="shop.php">áo phông</a></li>
                                        <li><a href="shop.php">áo polo</a></li>
                                        <li><a href="shop.php">váy liền</a></li>
                                        <li><a href="shop.php">chân váy</a></li>
                                        <li><a href="shop.php">quần jeans</a></li>
                                        <li><a href="shop.php">quần vải</a></li>
                                        <li><a href="shop.php">quần kaki</a></li>
                                        <li><a href="shop.php">quần shorts</a></li>
                                        <li><a href="shop.php">áo mặc nhà</a></li>
                                        <li><a href="shop.php">quần mặc nhà</a></li>
                                        <li><a href="shop.php">áo ba lỗ mặc nhà</a></li>
                                        <li><a href="shop.php">váy mặc nhà mặc nhà</a></li>
                                        <li><a href="shop.php">bộ mặc nhà</a></li>
                                        <li><a href="shop.php">áo mặc trong</a></li>
                                        <li><a href="shop.php">quần mặc trong</a></li>
                                        <li><a href="shop.php">quần tất mặc trong</a></li>
                                    </ul>
                                </li>
                                <li><a href="blog.php">Tin Tức</a></li>
                                <li><a href="contact.php">liên hệ</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile-menu-area end -->
    </header>
    <!-- header-area end -->
    <!-- breadcrumbs-area start -->
    <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2>Đặt Hàng Thành Công</h2>
                        <ul>
                            <li><a href="index.php">Trang chủ /</a></li>
                            <li><a href="cart.php">Giỏ hàng /</a></li>
                            <li><a href="checkout.php">Thanh toán /</a></li>
                            <li class="active"><a href="#"> Đặt Hàng Thành Công</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs-area end -->
    <!-- shop-main-area start -->
    <div class="shop-main-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>BẠN ĐÃ ĐẶT HÀNG THÀNH CÔNG!</h1>
                    <p>Đơn hàng của bạn đã được xử lý thành công!</p>
                    <p>Nếu có bất kỳ câu hỏi nào, hãy gửi cho <a href="#" style="color: #292929">cửa hàng</a></p>
                    <p>Cám ơn bạn đã mua sắm tại cửa hàng chúng tôi!</p>
                    <div class="buttons">
                        <div class="pull-right">
                            <a href="index.php" class="btn btn-primary">Tiếp Tục Mua Sắm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop-main-area end -->
    <!-- newsletter-area start -->
    <div class="newsletter-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bt-top ptb-80">
                        <div class="newsletter-content text-center">
                            <h6>Ưu đãi đặc biệt khi đăng ký</h6>
                            <h3>Thành viên giảm giá 10%</h3>
                            <p>Đăng ký để nhận bản tin của chúng tôi ngay bây giờ, cập nhật những bộ sưu tập mới và
                                những ưu đãi dành cho thành viên .
                            </p>
                            <form action="#">
                                <input type="email" placeholder="Địa chỉ email của bạn" />
                                <button type="submit">Đăng ký</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- newsletter-area end -->
    <!-- footer-area start -->
    <footer>
        <div class="footer-area ptb-40">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <!-- footer-logo start -->
                        <div class="footer-logo mb-rsp-3">
                            <a href="#"><img src="../../../public/frontend/assetss/images/logo/1.png" alt="logo" /></a>
                        </div>
                        <!-- footer-logo end -->
                    </div>
                    <div class="col-12 col-md-6">
                        <!-- copy-right-area start -->
                        <div class="copy-right-area mb-rsp-3 text-center">
                            <p>Copyright © 2019 <a href="#">Adella</a> . All Right Reserved</p>
                        </div>
                        <!-- copy-right-area end -->
                    </div>
                    <div class="col-12 col-md-3">
                        <!-- footer-social-icon start -->
                        <div class="footer-social-icon">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <!-- footer-social-icon end -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-area end -->
    </div>
    <!-- page-wraper-start -->


    <!-- all js here -->
    <!-- jquery latest version -->
    <script src="../../../public/frontend/assetss/js/vendor/jquery-1.12.0.min.js"></script>
    <!-- bootstrap js -->
    <script src="../../../public/frontend/assetss/js/bootstrap.min.js"></script>
    <!-- owl.carousel js -->
    <script src="../../../public/frontend/assetss/js/owl.carousel.min.js"></script>
    <!-- meanmenu js -->
    <script src="../../../public/frontend/assetss/js/jquery.meanmenu.js"></script>
    <!-- jquery-ui js -->
    <script src="../../../public/frontend/assetss/js/jquery-ui.min.js"></script>
    <!-- wow js -->
    <script src="../../../public/frontend/assetss/js/wow.min.js"></script>
    <!-- owl.carousel.min.js -->
    <script src="../../../public/frontend/assetss/js/owl.carousel.min.js"></script>
    <!-- jquery.nivo.slider.js -->
    <script src="../../../public/frontend/assetss/js/jquery.nivo.slider.js"></script>
    <!-- jquery.elevateZoom-3.0.8.min.js -->
    <script src="../../../public/frontend/assetss/js/jquery.elevateZoom-3.0.8.min.js"></script>
    <!-- jquery.parallax-1.1.3.js -->
    <script src="../../../public/frontend/assetss/js/jquery.parallax-1.1.3.js"></script>
    <!-- jquery.counterup.min.js -->
    <script src="../../../public/frontend/assetss/js/jquery.counterup.min.js"></script>
    <!-- waypoints.min.js -->
    <script src="../../../public/frontend/assetss/js/waypoints.min.js"></script>
    <!-- plugins js -->
    <script src="../../../public/frontend/assetss/js/plugins.js"></script>
    <!-- main js -->
    <script src="../../../public/frontend/assetss/js/main.js"></script>
</body>

</html>