<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();

include '../../../database/database.php';
include '../../../function/function-web.php';
$sql = "SELECT * FROM products INNER JOIN inventory on products.id = inventory.product_id where stock > 0";

$result = $conn->query($sql);

$sql1 = "SELECT * FROM products INNER JOIN inventory on products.id = inventory.product_id where stock > 0";

$result1 = $conn->query($sql1);

?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Adella Fashion 💚 Shop</title>
    <meta name="description" content="Mặc mới mỗi ngày với thời trang ADELLA. Hơn 100+ mẫu quần áo & phụ kiện nam, nữ lên kệ hàng ngày. MUA SẮM ONLINE & TẠI CỬA HÀNG!">
    <meta name="keywords" content="thời trang">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
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

<body class="shop">
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
                                        <li><a href="shop.php">Shop</a></li>
                                        <li><a href="blog.php">Tin Tức</a></li>
                                        <li><a href="contact.php">liên hệ</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- menu-area end -->
                        </div>
                        <?php include '../web/partial/cart-ping.php'; ?>

                    </div>
                </div>
            </div>
        </header>
        <!-- header-area end -->
        <!-- breadcrumbs-area start -->
        <div class="breadcrumbs-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content text-center">
                            <h2>shop</h2>
                            <ul>
                                <li><a href="index.php">Trang chủ /</a></li>
                                <li class="active"><a href="#">shop</a></li>
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
                        <!-- page-bar start -->
                        <div class="page-bar">
                            <div class="shop-tab">
                                <!-- tab-menu start -->
                                <div class="tab-menu-3">
                                    <ul>
                                        <li class="active"><a href="#th" data-toggle="tab"><i class="fa fa-list"></i></a></li>
                                        <li><a href="#list" data-toggle="tab"><i class="fa fa-th"></i></a></li>
                                    </ul>
                                </div>
                                <!-- tab-menu end -->
                                <!-- toolbar-sort start -->
                                <div class="toolbar-sorter">
                                    <select class="sorter-options" data-role="sorter">
                                        <option selected="selected" value="Lowest">Sắp xếp theo: Mặc Định</option>
                                        <option value="Highest">Sắp xếp theo: Tên (A - Z)</option>
                                        <option value="Product">Sắp xếp theo: Tên (Z - A)</option>
                                    </select>
                                </div>
                                <!-- toolbar-sort end -->
                                <!-- toolbar-sort-2 start -->
                                <div class="toolbar-sorter-2">
                                    <select class="sorter-options" data-role="sorter">
                                        <option selected="selected" value="Lowest">Hiện: 9</option>
                                        <option value="Highest">Hiện: 25</option>
                                        <option value="Product">Hiện: 50</option>
                                    </select>
                                </div>
                                <!-- toolbar-sort end -->
                            </div>
                        </div>
                        <!-- page-bar end -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-9 order-lg-12">
                        <!-- shop-right-area start -->
                        <div class="shop-right-area mb-30">
                            <!-- tab-area start -->

                            <div class="tab-content">
                                <div class="tab-pane active" id="th">
                                    <!-- product-wrapper start -->
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                            <div class="product-wrapper product-wrapper-3 mb-40">
                                                <div class="product-img">
                                                    <a href="product-details.php?id=<?php echo $row['product_id'] ?>">
                                                        <img src="<?php if (substr($row['images'], 3)) {
                                                                        echo substr($row['images'], 3);
                                                                    } else {
                                                                        echo '../../../public/backend/assets/images/defaultImages.png';
                                                                    } ?>" alt="product" class="primary">
                                                        <!-- <img src="../../../public/frontend/assetss/images/product/2.jpg" alt="product" class="secondary"> -->
                                                    </a>
                                                    <!-- <span class="sale">sale</span> -->
                                                    <!-- <form action="" method="post">
                                                        <div class="product-icon">
                                                            <a href="#" data-toggle="tooltip" title="Thêm vào Giỏ Hàng"><i class="icon ion-bag"></i></a>
                                                            <a href="#" data-toggle="tooltip" title="So Sánh Sản Phẩm"><i class="icon ion-android-options"></i></a>
                                                            <button href="#" data-toggle="modal" class="mymodalBtn" data-target="#mymodal" title="Xem Nhanh"><i class="icon ion-android-open"></i></button>
                                                        </div>
                                                    </form> -->
                                                </div>
                                                <div class="product-content">
                                                    <div class="manufacture-product">
                                                        <?php
                                                        $us = getBrandName($row['brand_id']);
                                                        ?>
                                                        <a data-brand_id="<?php if ($us['id']) echo $us['id'] ?>" href="shop.php">
                                                            <?php if ($us['name']) echo $us['name'] ?></a>
                                                        <div class="rating">
                                                            <div class="rating-box">
                                                                <div class="rating1">rating</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h2><a href="product-details.php?id=<?php echo $row['product_id'] ?>"><?php echo $row['name']; ?></a></h2>
                                                    <div class="price">
                                                        <ul>
                                                            <!-- <li class="old-price"><del>625,000đ</del></li> -->
                                                            <li class="new-price"><?php echo $row['price']; ?>,000đ</li>
                                                        </ul>
                                                    </div>
                                                    <p><?php echo $row['description']; ?></p>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    ?>

                                </div>

                                <div class="tab-pane fade" id="list">
                                    <div class="row">
                                        <?php
                                        $i = 0;
                                        if ($result1->num_rows > 0) {
                                            while ($row = $result1->fetch_assoc()) {
                                                $i++;
                                        ?>
                                                <div class="col-12 col-md-6 col-lg-4<?php echo $i % 2 != 0 ? ' d-lg-block' : '' ?>">
                                                    <!-- product-wrapper start -->

                                                    <div class="product-wrapper mb-40">
                                                        <div class="product-img">
                                                            <a href="product-details.php?id=<?php echo $row['product_id'] ?>">
                                                                <img src="<?php if (substr($row['images'], 3)) {
                                                                                echo substr($row['images'], 3);
                                                                            } else {
                                                                                echo '../../../public/backend/assets/images/defaultImages.png';
                                                                            } ?>" alt="product" class="primary">
                                                                <!-- <img src="../../../public/frontend/assetss/images/product/2.jpg" alt="product" class="secondary"> -->
                                                            </a>
                                                            <!-- <span class="sale">sale</span>
                                                            <div class="product-icon">
                                                                <a href="#" data-toggle="tooltip" title="Thêm vào Giỏ Hàng"><i class="icon ion-bag"></i></a>
                                                                <a href="#" data-toggle="tooltip" title="So Sánh Sản Phẩm"><i class="icon ion-android-options"></i></a>
                                                                <a href="#" data-toggle="modal" data-target="#mymodal" title="Xem Nhanh"><i class="icon ion-android-open"></i></a>
                                                            </div> -->
                                                        </div>
                                                        <div class="product-content pt-20">
                                                            <div class="manufacture-product">
                                                                <?php
                                                                $us = getBrandName($row['brand_id']);
                                                                ?>
                                                                <a data-brand_id="<?php if ($us['id']) echo $us['id'] ?>" href="shop.php">
                                                                    <?php if ($us['name']) echo $us['name'] ?></a>
                                                                <div class="rating">
                                                                    <div class="rating-box">
                                                                        <div class="rating1">rating</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <h2><a href="product-details.php?id=<?php echo $row['product_id'] ?>"><?php echo $row['name']; ?></a></h2>
                                                            <div class="price">
                                                                <ul>
                                                                    <!-- <li class="old-price"><del>625,000đ</del></li> -->
                                                                    <li class="new-price"><?php echo $row['price']; ?>,000đ</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- product-wrapper end -->
                                                </div>
                                        <?php
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                        ?>
                                    </div>
                                </div>

                            </div>
                            <!-- tab-area end -->
                            <!-- pagination-area start -->
                            <div class="pagination-area">
                                <div class="pagination-number">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-count">
                                    <p>Hiện 1 - 9 trong 25 (3 trang)</p>
                                </div>
                            </div>
                            <!-- pagination-area end -->
                        </div>
                        <!-- shop-right-area end -->
                    </div>
                    <div class="col-12 col-lg-3">
                        <!-- shop-left-area start -->
                        <div class="shop-left-area">
                            <!-- single-shop start -->
                            <div class="single-shop mb-40">
                                <div class="categories-title">
                                    <h3>Danh Mục Sản Phẩm</h3>
                                </div>
                                <div class="categories-list">
                                    <ul>
                                        <li><a href="#">Nữ (69)</a></li>
                                        <li><a href="#">Áo len (19)</a></li>
                                        <li><a href="#">Aó Khoác (16)</a></li>
                                        <li><a href="#">Nam (59)</a></li>
                                        <li><a href="#">Áo sơ mi (14)</a></li>
                                        <li><a href="#">Quần áo Thể Thao (12)</a></li>
                                        <li><a href="#">Thời trang công sở (17)</a></li>
                                        <li><a href="#">Phụ kiện (17)</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- single-shop end -->
                            <!-- singl-shop start -->
                            <div class="single-shop mb-40">
                                <div class="categories">
                                    <h3>Lọc Giá</h3>
                                </div>
                                <div id="slider-range"></div>
                                <input type="text" name="text" id="amount" />
                            </div>
                            <!-- singl-shop end -->
                            <div class="single-shop mb-40">
                                <div class="categories-title">
                                    <h3>Thương Hiệu</h3>
                                </div>
                                <div class="categories-list">
                                    <ul>
                                        <li><a href="#">Calvin Klein (11)</a></li>
                                        <li><a href="#">Diesel (15)</a></li>
                                        <li><a href="#">Polo (13)</a></li>
                                        <li><a href="#">Tommy Hilfiger (14)</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- single-shop end -->
                            <!-- single-shop start -->
                            <div class="single-shop mb-40">
                                <div class="categories-title">
                                    <h3>Size</h3>
                                </div>
                                <div class="categories-list">
                                    <ul>
                                        <li><a href="#">L (14)</a></li>
                                        <li><a href="#">M (11)</a></li>
                                        <li><a href="#">S (12)</a></li>
                                        <li><a href="#">XL (14)</a></li>
                                        <li><a href="#">XS (12)</a></li>
                                        <li><a href="#">XXL (13)</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- single-shop end -->
                            <!-- single-shop start -->
                            <div class="single-shop mb-40">
                                <div class="categories-title">
                                    <h3>Màu Sắc</h3>
                                </div>
                                <div class="categories-list">
                                    <ul>
                                        <li><a href="#">Đen(12)</a></li>
                                        <li><a href="#">Xanh da trời (10)</a></li>
                                        <li><a href="#">Xanh lá (14)</a></li>
                                        <li><a href="#">Xám (14)</a></li>
                                        <li><a href="#">Đỏ (12)</a></li>
                                        <li><a href="#">Trắng (13)</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- single-shop end -->
                        </div>
                        <!-- shop-left-area end -->
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
        <!-- modal-area start -->
        <div class="modal-area">
            <!-- single-modal start -->
            <div class="modal fade" id="mymodal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-img">
                                <div class="single-img">
                                    <a href="product-details.php"><img src="../../../public/frontend/assetss/images/product/1.jpg" alt="product" class="primary" /></a>
                                </div>
                            </div>
                            <div class="modal-text">
                                <h2><a href="product-details.php">Áo Len Nam</a> </h2>
                                <div class="rating">
                                    <div class="rating-box">
                                        <div class="rating5">rating</div>
                                    </div>
                                </div>
                                <div class="price-rate">
                                    <span class="old-price"><del>625,000đ</del></span>
                                    <span class="new-price">499,000đ</span>
                                </div>
                                <div class="short-description mt-20">
                                    <p> Áo len phom dáng Slim Fit ôm gọn gàng, tôn dáng và ấm áp. Thiết kế cổ tròn
                                        basic, bo gấu và tay áo gọn gàng. Mặt trước dệt đan xen tạo điểm nhấn ấn tượng.
                                        Màu sắc trẻ trung kết
                                        hợp hiệu ứng màu melange mang đến diện mạo thu hút cho người mặc. Chất liệu len
                                        Acrylic nhẹ, ấm, hạn chế xù lông. Đặc biệt co giãn, đàn hồi và giữ định hình
                                        tốt. Áo có khả năng kiểm soát ẩm tốt, thoáng, vẫn giữ ấm cơ thể nhưng không bí.
                                    </p>
                                </div>
                                <form action="#">
                                    <input type="number" value="1" />
                                    <button type="submit">Thêm vào Giỏ Hàng</button>
                                </form>
                                <div class="product-meta">
                                    <span>
                                        Category:
                                        <a href="#">áo len</a>,<a href="#">áo nam</a>
                                    </span>
                                    <span>
                                        Tags:
                                        <a href="#">áo len</a>,<a href="#">áo nam</a>
                                    </span>
                                </div>
                                <!-- social-icon-start -->
                                <div class="social-icon mt-20">
                                    <ul>
                                        <li><a href="#" data-toggle="tooltip" title="Share on Facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="Share on Twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="Email to a Friend"><i class="fa fa-envelope-o"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="Pin on Pinterest"><i class="fa fa-pinterest"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="Share on Instagram"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                                <!-- social-icon-end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single-modal end -->
        </div>
        <!-- modal-area end -->
    </div>
    <!-- page-wraper start -->


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
    <style type="text/css">
        .product-wrapper .product-img .product-icon button {
            color: #292929;
            display: inline-block;
            font-size: 21px;
            line-height: 1;
            text-align: center;
            width: 60px;
            background: #fff none repeat scroll 0 0;
            box-shadow: 1px 1px 1px 0 rgba(0, 0, 0, 0.1);
            padding: 16px 0;
            text-align: center;
            transition: 0.3s;
            border: none;
        }

        .product-wrapper .product-img .product-icon button:hover {
            color: #ee3333;
        }
    </style>
</body>

</html>