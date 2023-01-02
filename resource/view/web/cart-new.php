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
    <title>Adella Fashion 💚 Giỏ Hàng</title>
    <meta name="description"
        content="Mặc mới mỗi ngày với thời trang ADELLA. Hơn 100+ mẫu quần áo & phụ kiện nam, nữ lên kệ hàng ngày. MUA SẮM ONLINE & TẠI CỬA HÀNG!">
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

<body class="cart">
    <!-- page-wraper start -->
    <div id="page-wrapper">
        <!-- header-area start -->
        <?php include '../web/partial/topBar.php'; ?>

        <!-- header-area end -->
        <!-- breadcrumbs-area start -->
        <div class="breadcrumbs-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content text-center">
                            <h2>Giỏ Hàng</h2>
                            <ul>
                                <li><a href="index.php">Trang chủ /</a></li>
                                <li class="active"><a href="#">Giỏ hàng</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumbs-area end -->
        <!-- shop-main-area start -->
        <div class="shop-main-area">
            <!-- cart-main-area start -->
            <div class="cart-main-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form action="#">
                                <div class="table-content table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-thumbnail">Ảnh</th>
                                                <th class="product-name">Sản phẩm</th>
                                                <th class="product-price">Giá</th>
                                                <th class="product-quantity">số lượng</th>
                                                <th class="product-subtotal">tổng</th>
                                                <th class="product-remove">xóa</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            if (isset($_SESSION['cart'])) {
                                                foreach ($_SESSION['cart'] as $itemCart) {
                                            ?>
                                        <tbody>
                                            <tr>
                                                <td class="product-thumbnail"><a href="#"><img src="<?php echo substr($itemCart['image'], 3); ?>"
                                                            alt="man" /></a></td>
                                                <td class="product-name"><a href="#"><?php echo $itemCart['name']; ?></a></td>
                                                <td class="product-price"><span class="amount"><?php echo $itemCart['price']; ?>,000đ</span></td>
                                                <td class="product-quantity"><input type="number" value="<?php echo $itemCart['stock']; ?>"></td>
                                                <td class="product-subtotal"><?php echo $itemCart['total']; ?>,000đ</td>
                                                <td class="product-remove"><a href="#"><i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                           
                                        </tbody>
                                        <?php
                                                }
                                            }
                                            ?>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-7">
                            <div class="buttons-cart mb-30 mt-3">
                                <ul>
                                    <li><a href="#">Cập nhật giỏ hàng</a></li>
                                    <li><a href="shop.php">tiếp tục mua sắm</a></li>
                                </ul>
                            </div>
                            <div class="coupon">
                                <h3>phiếu giảm giá</h3>
                                <p>Điền mã giảm giá của bạn.</p>
                                <form action="#">
                                    <input type="text" placeholder="Mã giảm giá">
                                    <a href="#">Áp dụng</a>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-5">
                            <div class="cart_totals">
                                <h2>Tổng giỏ hàng</h2>
                                <table>
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>tiền hàng</th>
                                            <td>
                                                <span class="amount"><?php echo $_SESSION['total']; ?>,000đ</span>
                                            </td>
                                        </tr>
                                        <tr class="shipping">
                                            <th>vận chuyển</th>
                                            <td>
                                                <ul id="shipping_method">
                                                    <li>
                                                        <input name="shipping" type="radio">
                                                        <label>
                                                            Giao nhanh:
                                                            <span class="amount">30,000đ</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <input name="shipping" type="radio" checked>
                                                        <label> Giao hàng tiêu chuẩn:
                                                            <span class="amount">0đ</span>
                                                        </label>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>tổng</th>
                                            <td>
                                                <strong>
                                                    <span class="amount"><?php echo $_SESSION['total']; ?>,000đ</span>
                                                </strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="wc-proceed-to-checkout">
                                    <a href="checkout.php">Tiến Hành Thanh Toán</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- cart-main-area end -->
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