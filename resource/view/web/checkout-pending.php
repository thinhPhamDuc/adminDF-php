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
    <title>Adella Shop</title>
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

<body class="checkout">
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
                            <h2>Thanh Toán</h2>
                            <ul>
                                <li><a href="index.php">Trang Chủ /</a></li>
                                <li><a href="cart.php">Giỏ Hàng /</a></li>
                                <li class="active"><a href="#">Thanh Toán</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumbs-area end -->
        <!-- shop-main-area start -->
        <div class="shop-main-area">
            <!-- coupon-area start -->
            <div class="coupon-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-accordion">
                                <h3>Bạn đã là thành viên? <span id="showlogin">Ấn vào đây để đăng nhập</span></h3>
                                <div class="coupon-content" id="checkout-login">
                                    <div class="coupon-info">
                                        <form action="#">
                                            <p class="form-row-first">
                                                <label>Tên Đăng Nhập hoặc Email <span class="required">*</span></label>
                                                <input type="text">
                                            </p>
                                            <p class="form-row-last">
                                                <label>Mật Khẩu<span class="required">*</span></label>
                                                <input type="text">
                                            </p>
                                            <p class="form-row">
                                                <input type="submit" value="Đăng Nhập">
                                                <label>
                                                    <input type="checkbox">
                                                    Nhớ Mật Khẩu
                                                </label>
                                            </p>
                                            <p class="lost-password">
                                                <a href="#">Quên Tài Khoản?</a>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- coupon-area end -->
            <!-- checkout-area start -->
            <div class="check-out-area">
                <div class="container">
                    <form action="#">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="checkbox-form">
                                    <h3>Thông Tin nhận hàng</h3>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Họ <span class="required">*</span></label>
                                                <input type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Tên <span class="required">*</span></label>
                                                <input type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="checkout-form-list">
                                                <label>Địa Chỉ <span class="required">*</span></label>
                                                <input type="text" placeholder="Số nhà - Phố">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Xã/ Phường <span class="required">*</span></label>
                                                <input type="text">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Quận/ Huyện <span class="required">*</span></label>
                                                <input type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="checkout-form-list">
                                                <label>Tỉnh / Thành Phố <span class="required">*</span></label>
                                                <input type="text">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Điện Thoại <span class="required">*</span></label>
                                                <input type="text">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Địa Chỉ Email <span class="required">*</span></label>
                                                <input type="email" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="checkout-form-list create-acc">
                                                <input type="checkbox" id="cbox">
                                                <label>Tạo Tài Khoản?</label>
                                            </div>
                                            <div class="checkout-form-list create-account" id="cbox_info" style="display: none;">
                                                <p>Tạo một tài khoản bằng cách nhập thông tin dưới đây. Nếu bạn là khách
                                                    hàng cũ, vui lòng đăng nhập ở đầu trang.</p>
                                                <label>Tên Đăng Nhập hoặc Email <span class="required">*</span></label>
                                                <input type="text">
                                                <label>Mật Khẩu <span class="required">*</span></label>
                                                <input type="password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="different-address">
                                        <div class="ship-different-title">
                                            <h3>
                                                <label>Nhận Hàng Tại Địa Chỉ Khác?</label>
                                                <input type="checkbox" id="ship-box">
                                            </h3>
                                        </div>
                                        <div class="row" id="ship-box-info" style="display: none;">
                                            <div class="col-12 col-md-6">
                                                <div class="checkout-form-list">
                                                    <label>Họ<span class="required">*</span></label>
                                                    <input type="text" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="checkout-form-list">
                                                    <label>Tên<span class="required">*</span></label>
                                                    <input type="text" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="checkout-form-list">
                                                    <label>Địa Chỉ <span class="required">*</span></label>
                                                    <input type="text" placeholder="Số nhà - Phố">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="checkout-form-list">
                                                    <label>Xã/ Phường <span class="required">*</span></label>
                                                    <input type="text">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="checkout-form-list">
                                                    <label>Quận/ Huyện <span class="required">*</span></label>
                                                    <input type="text" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="checkout-form-list">
                                                    <label>Tỉnh/ Thành Phố <span class="required">*</span></label>
                                                    <input type="text">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="checkout-form-list">
                                                    <label>Điện Thoại <span class="required">*</span></label>
                                                    <input type="text">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="checkout-form-list">
                                                    <label>Địa Chỉ Email <span class="required">*</span></label>
                                                    <input type="email" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="order-notes">
                                            <div class="checkout-form-list">
                                                <label>Ghi chú </label>
                                                <textarea placeholder="Ghi chú về đơn hàng của bạn, Ví dụ ghi chú đặc biệt để nhận hàng." rows="10" cols="30" id="checkout-mess"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="your-order">
                                    <h3>Đơn hàng của bạn</h3>
                                    <div class="your-order-table table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product-name">Sản phẩm</th>
                                                    <th class="product-total">Tổng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($_SESSION['cart'])) {
                                                    foreach ($_SESSION['cart'] as $itemCart) {
                                                ?>
                                                        <tr class="cart_item">
                                                            <td class="product-name">
                                                                <?php echo $itemCart['name']; ?> <strong class="product-quantity"> ×
                                                                    <?php echo $itemCart['stock']; ?></strong>
                                                            </td>
                                                            <td class="product-total">
                                                                <span class="amount"><?php echo $itemCart['total']; ?>,000đ</span>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr class="cart-subtotal">
                                                    <th>Tổng tiền hàng</th>
                                                    <td><span class="amount"><?php echo $_SESSION['total']; ?>,000đ</span></td>
                                                </tr>
                                                <tr class="shipping">
                                                    <th>Vận Chuyển</th>
                                                    <td>
                                                        <ul>
                                                            <li></li>
                                                            <label>Giao hàng tiêu chuẩn</label>
                                                            </li>
                                                            <li></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Tổng đơn hàng</th>
                                                    <td><strong><span class="amount"><?php echo $_SESSION['total']; ?>,000đ</span></strong>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="payment-method">
                                        <div class="payment-accordion">
                                            <div class="collapses-group">
                                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="headingOne">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    Chuyển khoản trực tiếp
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                            <div class="panel-body">
                                                                <p>Chuyển khoản trực tiếp vào tài khoản ngân hàng của
                                                                    chúng tôi. Vui lòng ghi chú mã đơn hàng của bạn. Đơn
                                                                    hàng của bạn sẽ được vận chuyển khi chúng tôi nhận
                                                                    được tiền trong tài khoản</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="headingTwo">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                    Thanh toán bằng ví điện tử
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                            <div class="panel-body">
                                                                <p>Hỗ trợ thanh toán qua các ví điện tử: MoMo, Zalo Pay,
                                                                    Payoo, Vtc Pay, Viettel Pay</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="headingThree">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                    Thanh toán bằng thẻ<img src="../../../public/frontend/assetss/images/2.png" alt="payment" />
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                            <div class="panel-body">
                                                                <p>Thanh toán bằng thẻ ghi nợ nội địa, thẻ tín dụng hoặc
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($_SESSION['client'])) {
                                            echo '<div class="order-button-payment">
                                                <input type="submit" value="Đặt Hàng" id="order">
                                            </div>';
                                        } else {
                                            echo '<div class="order-button-payment">
                                                <a href="login.php">Đăng nhập để đặt hàng</a>
                                            </div>';
                                        }
                                        ?>
                                        <!-- <div class="order-button-payment">
                                        <input type="submit" value="Đặt Hàng" id="order">
                                    </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- checkout-area end -->
        </div>
        <!-- shop-main-area end -->
        <!-- newsletter-area start -->
        <div class=" newsletter-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="bt-top ptb-80">
                            <div class="newsletter-content text-center">
                                <h6>Ưu đãi đặc biệt khi đăng ký</h6>
                                <h3>Thành viên giảm giá 10%</h3>
                                <p>Đăng ký để nhận bản tin của chúng tôi ngay bây giờ,
                                    cập nhật những bộ sưu tập mới và
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
                                <p>Copyright © 2019 <a href="#">Adella</a> . All Right
                                    Reserved</p>
                            </div>
                            <!-- copy-right-area end -->
                        </div>
                        <div class="col-12 col-md-3">
                            <!-- footer-social-icon start -->
                            <div class="footer-social-icon">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                    </li>
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