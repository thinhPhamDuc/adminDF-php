<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();

include '../../../database/database.php';
include '../../../function/function-web.php';
$sql = "SELECT * FROM products INNER JOIN inventory on products.id = inventory.product_id where stock > 0";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html class="no-js" lang="vi-vn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Mặc mới mỗi ngày với thời trang ADELLA. Hơn 100+ mẫu quần áo & phụ kiện nam, nữ lên kệ hàng ngày. MUA SẮM ONLINE & TẠI CỬA HÀNG!">
    <meta name="keywords" content="thời trang">
    <title>Adella Fashion 💚 Trang Chủ</title>

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

<body>
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
                                        <li class="active"><a href="index-new.php">Trang chủ</a></li>
                                        <?php include '../web/partial/menu.php'; ?>
                                    </ul>
                                </nav>
                            </div>
                            <!-- menu-area end -->
                        </div>
                        <div class="col-6 col-md-3">
                            <!-- header-right-area start -->
                            <div class="header-right-area">
                                <ul>
                                    <li><a id="show-search" href="#"><i class="icon ion-ios-search-strong"></i></a>
                                        <div class="search-content" id="hide-search">
                                            <span class="close" id="close-search">
                                                <i class="ion-close"></i>
                                            </span>
                                            <div class="search-text">
                                                <h1>Tìm Kiếm</h1>
                                                <form action="#">
                                                    <input type="text" placeholder="Tìm Kiếm" />
                                                    <button class="btn" type="button">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="cart.php"><i class="icon ion-bag"></i></a>
                                        <span>2</span>
                                        <div class="mini-cart-sub">
                                            <div class="cart-product">
                                                <div class="single-cart">
                                                    <div class="cart-img">
                                                        <a href="product-details.php"><img src="../../../public/frontend/assetss/images/product/1.jpg" alt="book" /></a>
                                                    </div>
                                                    <div class="cart-info">
                                                        <h5><a href="product-details.php">Áo len nam</a></h5>
                                                        <p>1 x 499,000đ</p>
                                                    </div>
                                                </div>
                                                <div class="single-cart">
                                                    <div class="cart-img">
                                                        <a href="product-details.php"><img src="../../../public/frontend/assetss/images/product/3.jpg" alt="book" /></a>
                                                    </div>
                                                    <div class="cart-info">
                                                        <h5><a href="product-details.php">Áo Len Dài Tay Nữ</a></h5>
                                                        <p>1 x 499,000đ</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cart-totals">
                                                <h5>Tổng <span>998,000đ</span></h5>
                                            </div>
                                            <div class="cart-bottom">
                                                <a href="checkout.php">Thanh Toán</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="#" id="show-cart"><i class="icon ion-android-person"></i></a>
                                        <div class="shapping-area" id="hide-cart">
                                            <div class="single-shapping">
                                                <span>Tài khoản</span>
                                                <ul>
                                                    <li><a href="register.php">Đăng Ký</a></li>
                                                    <li><a href="login.php">Đăng Nhập</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- header-right-area end -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header-area end -->
        <!-- slider-area start -->
        <div class="slider-area">
            <div id="slider">
                <img src="../../../public/frontend/assetss/images/slider/1.jpg" alt="slider-img" title="#caption1" />
                <img src="../../../public/frontend/assetss/images/slider/2.jpg" alt="slider-img" title="#caption2" />
                <img src="../../../public/frontend/assetss/images/slider/3.jpg" alt="slider-img" title="#caption3" />
            </div>
            <div class="nivo-html-caption" id="caption1">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider-text">
                                <h5 class="wow fadeInLeft" data-wow-delay=".3s">túi xách</h5>
                                <h5 class="wow fadeInLeft" data-wow-delay=".5s">bộ sưu tập mới</h5>
                                <h2 class="wow fadeInRight" data-wow-delay=".7s">sản phẩm độc đáo! </h2>
                                <h1 class="wow fadeInRight" data-wow-delay=".9s">backpack</h1>
                                <p class="wow fadeInLeft" data-wow-delay="1.3s">Thiết kế theo xu hướng thời trang đương
                                    đại mới nhất, khẳng định <br /> phong cách của bạn. </p>
                                <a href="shop.php" class=" wow bounceInRight" data-wow-delay="1.5s">xem thêm</a>
                            </div>
                        </div><!-- col -->
                    </div><!-- row -->
                </div><!-- container -->
            </div>
            <div class="nivo-html-caption" id="caption2">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider-text">
                                <h5 class="wow fadeInLeft" data-wow-delay=".3s">túi xách</h5>
                                <h5 class="wow fadeInLeft" data-wow-delay=".5s">bộ sưu tập mới</h5>
                                <h2 class="wow fadeInRight" data-wow-delay=".7s">sang trọng & lịch lãm! </h2>
                                <h1 class="wow fadeInRight" data-wow-delay=".9s">Black Handbag</h1>
                                <p class="wow fadeInLeft" data-wow-delay="1.3s">Những dòng sản phẩm được yêu thích nhất
                                    và được chế tác từ các chất liệu<br /> nhập khẩu 100%.</p>
                                <a href="shop.php" class=" wow bounceInRight" data-wow-delay="1.5s">xem thêm</a>
                            </div>
                        </div><!-- col -->
                    </div><!-- row -->
                </div><!-- container -->
            </div>
            <div class="nivo-html-caption" id="caption3">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider-text">
                                <h5 class="wow fadeInLeft" data-wow-delay=".3s">quần áo</h5>
                                <h5 class="wow fadeInLeft" data-wow-delay=".5s">bộ sưu tập mới</h5>
                                <h2 class="wow fadeInRight" data-wow-delay=".7s">Hàng mới về!</h2>
                                <h1 class="wow fadeInRight" data-wow-delay=".9s">amazing adella</h1>
                                <p class="wow fadeInLeft" data-wow-delay="1.3s">Năng động, trẻ trung & phong cách.</p>
                                <a href="shop.php" class=" wow bounceInRight" data-wow-delay="1.5s">xem thêm</a>
                            </div>
                        </div><!-- col -->
                    </div><!-- row -->
                </div><!-- container -->
            </div>
        </div>
        <!-- slider-area end -->
        <!-- founder-area start -->
        <div class="founder-area ptb-80">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="founder-description text-center">
                            <h3>chùng tôi là ai</h3>
                            <h1>chào mừng bạn đến với Adella</h1>
                            <img src="../../../public/frontend/assetss/images/banner/1.png" alt="banner" />
                            <p>Adella theo đuổi triết lí kinh doanh nhân văn: Được <em><strong>là người tử tế, lương
                                        thiện</strong></em> và được
                                phục vụ <em><strong>những vị khách hàng tử tế, lương thiện</strong></em>.</p>
                            <h4>Mrs Đoàn Ngọc - <span>CEO Adella</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- founder-area end -->
        <!-- banner-area start -->
        <div class="banner-area">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <!-- single-banner start -->
                        <div class="single-banner mb-20 mb-rsp-3">
                            <div class="banner-img">
                                <a href="shop.php"><img src="../../../public/frontend/assetss/images/banner/1.jpg" alt="banner"></a>
                            </div>
                            <div class="banner-content">
                                <a href="shop.php">Kính</a>
                            </div>
                        </div>
                        <!-- single-banner end -->
                        <!-- single-banner start -->
                        <div class="single-banner mb-rsp-3">
                            <div class="banner-img">
                                <a href="shop.php"><img src="../../../public/frontend/assetss/images/banner/2.jpg" alt="banner"></a>
                            </div>
                            <div class="banner-content">
                                <a href="shop.php">phụ kiện</a>
                            </div>
                        </div>
                        <!-- single-banner end -->
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 order-lg-12">
                        <!-- single-banner start -->
                        <div class="single-banner mb-20">
                            <div class="banner-img">
                                <a href="shop.php"><img src="../../../public/frontend/assetss/images/banner/4.jpg" alt="banner"></a>
                            </div>
                            <div class="banner-content">
                                <a href="shop.php">túi xách</a>
                            </div>
                        </div>
                        <!-- single-banner end -->
                        <!-- single-banner start -->
                        <div class="single-banner mb-rsp-3">
                            <div class="banner-img">
                                <a href="shop.php"><img src="../../../public/frontend/assetss/images/banner/5.jpg" alt="banner"></a>
                            </div>
                            <div class="banner-content">
                                <a href="shop.php">giày</a>
                            </div>
                        </div>
                        <!-- single-banner end -->
                    </div>
                    <div class="col-12 col-lg-6">
                        <!-- single-banner start -->
                        <div class="single-banner">
                            <div class="banner-img">
                                <a href="shop.php"><img src="../../../public/frontend/assetss/images/banner/3.jpg" alt="banner"></a>
                            </div>
                            <div class="banner-content">
                                <a href="shop.php">Quần áo</a>
                            </div>
                        </div>
                        <!-- single-banner end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- banner-area end -->
        <!-- feature-product-area start -->
        <div class="feature-product-area ptb-80">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title mb-30 text-center">
                            <h2>Sản phẩm bán chạy</h2>
                        </div>
                    </div>
                    <div class="col-12">
                        <!-- tab-menu start -->
                        <div class="tab-menu mb-50 text-center">
                            <ul>
                                <li class="active"><a href="#Clothing" data-toggle="tab">quần áo</a></li>
                                <li><a href="#Handbags" data-toggle="tab">túi xách</a></li>
                                <li><a href="#Shoes" data-toggle="tab">giày</a></li>
                                <li><a href="#Accessories" data-toggle="tab">phụ kiện</a></li>
                            </ul>
                        </div>
                        <!-- tab-menu end -->
                    </div>
                </div>
                <!-- tab-area start -->
                <div class="tab-content">
                    <div class="tab-pane active" id="Clothing">
                        <div class="row">
                            <div class="product-active">
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                ?>
                                        <div class="col-12">
                                            <!-- product-wrapper start -->
                                            <div class="product-wrapper">
                                                <div class="product-img">
                                                    <a href="product-details.php?id=<?php echo $row['product_id'] ?>">
                                                        <img src="<?php if (substr($row['images'], 3)) {
                                                                        echo substr($row['images'], 3);
                                                                    } else {
                                                                        echo '../../../public/backend/assets/images/defaultImages.png';
                                                                    } ?>" alt="product" class="primary" />
                                                        <!-- <img src="../../../public/frontend/assetss/images/product/2.jpg" alt="product" class="secondary" /> -->
                                                    </a>
                                                    <span class="sale">sale</span>
                                                    <div class="product-icon">
                                                        <a href="#" data-toggle="tooltip" title="Thêm vào Giỏ Hàng"><i class="icon ion-bag"></i></a>
                                                        <a href="#" data-toggle="tooltip" title="So Sánh Sản Phẩm"><i class="icon ion-android-options"></i></a>
                                                        <a href="#" data-toggle="modal" data-target="#mymodal" title="Xem Nhanh"><i class="icon ion-android-open"></i></a>
                                                    </div>
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
                                                            <!-- <li class="oldprice"><del>625,000đ</strike></li> -->
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
                    <div class="tab-pane fade" id="Handbags">
                        <div class="row">
                            <div class="product-active">
                                <div class="col-12">
                                    <!-- product-wrapper start -->
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <a href="product-details.php">
                                                <img src="../../../public/frontend/assetss/images/product/11.jpg" alt="product" class="primary" />
                                                <img src="../../../public/frontend/assetss/images/product/12.jpg" alt="product" class="secondary" />
                                            </a>
                                            <span class="sale">sale</span>
                                            <div class="product-icon">
                                                <a href="#" data-toggle="tooltip" title="Thêm vào Giỏ Hàng"><i class="icon ion-bag"></i></a>
                                                <a href="#" data-toggle="tooltip" title="So Sánh Sản Phẩm"><i class="icon ion-android-options"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#mymodal" title="Xem Nhanh"><i class="icon ion-android-open"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content pt-20">
                                            <div class="manufacture-product">
                                                <a href="shop.php">Chanel</a>
                                                <div class="rating">
                                                    <div class="rating-box">
                                                        <div class="rating1">rating</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h2><a href="product-details.php">Quần Dài Nam</a></h2>
                                            <div class="price">
                                                <ul>
                                                    <li class="old-price"><del>600,000đ</strike></li>
                                                    <li class="new-price">449,000đ</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product-wrapper end -->
                                </div>
                                <div class="col-12">
                                    <!-- product-wrapper start -->
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <a href="product-details.php">
                                                <img src="../../../public/frontend/assetss/images/product/13.jpg" alt="product" class="primary" />
                                                <img src="../../../public/frontend/assetss/images/product/14.jpg" alt="product" class="secondary" />
                                            </a>
                                            <div class="product-icon">
                                                <a href="#" data-toggle="tooltip" title="Thêm vào Giỏ Hàng"><i class="icon ion-bag"></i></a>
                                                <a href="#" data-toggle="tooltip" title="So Sánh Sản Phẩm"><i class="icon ion-android-options"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#mymodal" title="Xem Nhanh"><i class="icon ion-android-open"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content pt-20">
                                            <div class="manufacture-product">
                                                <a href="shop.php">IVY Moda</a>
                                                <div class="rating">
                                                    <div class="rating-box">
                                                        <div class="rating2">rating</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h2><a href="product-details.php">Áo Sơ Mi Nữ Linen</a></h2>
                                            <div class="price">
                                                <ul>
                                                    <li class="new-price">199,000đ</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product-wrapper end -->
                                </div>
                                <div class="col-12">
                                    <!-- product-wrapper start -->
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <a href="product-details.php">
                                                <img src="../../../public/frontend/assetss/images/product/15.jpg" alt="product" class="primary" />
                                                <img src="../../../public/frontend/assetss/images/product/16.jpg" alt="product" class="secondary" />
                                            </a>
                                            <span class="sale">sale</span>
                                            <div class="product-icon">
                                                <a href="#" data-toggle="tooltip" title="Thêm vào Giỏ Hàng"><i class="icon ion-bag"></i></a>
                                                <a href="#" data-toggle="tooltip" title="So Sánh Sản Phẩm"><i class="icon ion-android-options"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#mymodal" title="Xem Nhanh"><i class="icon ion-android-open"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content pt-20">
                                            <div class="manufacture-product">
                                                <a href="shop.php">Dior </a>
                                                <div class="rating">
                                                    <div class="rating-box">
                                                        <div class="rating3">rating</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h2><a href="product-details.php">Áo Hoodie Nữ</a></h2>
                                            <div class="price">
                                                <ul>
                                                    <li class="old-price"><del>400,000đ</strike></li>
                                                    <li class="new-price">299,000đ</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product-wrapper end -->
                                </div>
                                <div class="col-12">
                                    <!-- product-wrapper start -->
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <a href="product-details.php">
                                                <img src="../../../public/frontend/assetss/images/product/17.jpg" alt="product" class="primary" />
                                                <img src="../../../public/frontend/assetss/images/product/18.jpg" alt="product" class="secondary" />
                                            </a>
                                            <div class="product-icon">
                                                <a href="#" data-toggle="tooltip" title="Thêm vào Giỏ Hàng"><i class="icon ion-bag"></i></a>
                                                <a href="#" data-toggle="tooltip" title="So Sánh Sản Phẩm"><i class="icon ion-android-options"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#mymodal" title="Xem Nhanh"><i class="icon ion-android-open"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content pt-20">
                                            <div class="manufacture-product">
                                                <a href="shop.php">Chanel</a>
                                                <div class="rating">
                                                    <div class="rating-box">
                                                        <div class="rating4">rating</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h2><a href="product-details.php">Váy Len Nữ Dài Tay</a></h2>
                                            <div class="price">
                                                <ul>
                                                    <li class="new-price">499,000đ</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product-wrapper end -->
                                </div>
                                <div class="col-12">
                                    <!-- product-wrapper start -->
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <a href="product-details.php">
                                                <img src="../../../public/frontend/assetss/images/product/19.jpg" alt="product" class="primary" />
                                                <img src="../../../public/frontend/assetss/images/product/20.jpg" alt="product" class="secondary" />
                                            </a>
                                            <div class="product-icon">
                                                <a href="#" data-toggle="tooltip" title="Thêm vào Giỏ Hàng"><i class="icon ion-bag"></i></a>
                                                <a href="#" data-toggle="tooltip" title="So Sánh Sản Phẩm"><i class="icon ion-android-options"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#mymodal" title="Xem Nhanh"><i class="icon ion-android-open"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content pt-20">
                                            <div class="manufacture-product">
                                                <a href="shop.php">H&M </a>
                                                <div class="rating">
                                                    <div class="rating-box">
                                                        <div class="rating5">rating</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h2><a href="product-details.php">Áo Mặc Nhà Nữ</a>
                                            </h2>
                                            <div class="price">
                                                <ul>
                                                    <li class="new-price">149,000đ</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product-wrapper end -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Shoes">
                        <div class="row">
                            <div class="product-active">
                                <div class="col-12">
                                    <!-- product-wrapper start -->
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <a href="product-details.php">
                                                <img src="../../../public/frontend/assetss/images/product/21.jpg" alt="product" class="primary" />
                                                <img src="../../../public/frontend/assetss/images/product/22.jpg" alt="product" class="secondary" />
                                            </a>
                                            <span class="sale">sale</span>
                                            <div class="product-icon">
                                                <a href="#" data-toggle="tooltip" title="Thêm vào Giỏ Hàng"><i class="icon ion-bag"></i></a>
                                                <a href="#" data-toggle="tooltip" title="So Sánh Sản Phẩm"><i class="icon ion-android-options"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#mymodal" title="Xem Nhanh"><i class="icon ion-android-open"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content pt-20">
                                            <div class="manufacture-product">
                                                <a href="shop.php">H&M </a>
                                                <div class="rating">
                                                    <div class="rating-box">
                                                        <div class="rating1">rating</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h2><a href="product-details.php">Váy Liền Nữ</a>
                                            </h2>
                                            <div class="price">
                                                <ul>
                                                    <li class="old-price"><del>500,000đ</strike></li>
                                                    <li class="new-price">249,000đ</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product-wrapper end -->
                                </div>
                                <div class="col-12">
                                    <!-- product-wrapper start -->
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <a href="product-details.php">
                                                <img src="../../../public/frontend/assetss/images/product/23.jpg" alt="product" class="primary" />
                                                <img src="../../../public/frontend/assetss/images/product/24.jpg" alt="product" class="secondary" />
                                            </a>
                                            <div class="product-icon">
                                                <a href="#" data-toggle="tooltip" title="Thêm vào Giỏ Hàng"><i class="icon ion-bag"></i></a>
                                                <a href="#" data-toggle="tooltip" title="So Sánh Sản Phẩm"><i class="icon ion-android-options"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#mymodal" title="Xem Nhanh"><i class="icon ion-android-open"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content pt-20">
                                            <div class="manufacture-product">
                                                <a href="shop.php">Chanel</a>
                                                <div class="rating">
                                                    <div class="rating-box">
                                                        <div class="rating2">rating</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h2><a href="product-details.php">Túi Xách Nam Công Sở Da</a>
                                            </h2>
                                            <div class="price">
                                                <ul>
                                                    <li class="new-price">999,000đ</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product-wrapper end -->
                                </div>
                                <div class="col-12">
                                    <!-- product-wrapper start -->
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <a href="product-details.php">
                                                <img src="../../../public/frontend/assetss/images/product/25.jpg" alt="product" class="primary" />
                                                <img src="../../../public/frontend/assetss/images/product/26.jpg" alt="product" class="secondary" />
                                            </a>
                                            <span class="sale">sale</span>
                                            <div class="product-icon">
                                                <a href="#" data-toggle="tooltip" title="Thêm vào Giỏ Hàng"><i class="icon ion-bag"></i></a>
                                                <a href="#" data-toggle="tooltip" title="So Sánh Sản Phẩm"><i class="icon ion-android-options"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#mymodal" title="Xem Nhanh"><i class="icon ion-android-open"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content pt-20">
                                            <div class="manufacture-product">
                                                <a href=shop.php>Dior </a>
                                                <div class="rating">
                                                    <div class="rating-box">
                                                        <div class="rating3">rating</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h2><a href="product-details.php">Giày Da Nam Dáng Thể Thao</a>
                                            </h2>
                                            <div class="price">
                                                <ul>
                                                    <li class="old-price"><del>900,000đ</del></li>
                                                    <li class="new-price">650,000đ</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product-wrapper end -->
                                </div>
                                <div class="col-12">
                                    <!-- product-wrapper start -->
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <a href="product-details.php">
                                                <img src="../../../public/frontend/assetss/images/product/27.jpg" alt="product" class="primary" />
                                                <img src="../../../public/frontend/assetss/images/product/28.jpg" alt="product" class="secondary" />
                                            </a>
                                            <div class="product-icon">
                                                <a href="#" data-toggle="tooltip" title="Thêm vào Giỏ Hàng"><i class="icon ion-bag"></i></a>
                                                <a href="#" data-toggle="tooltip" title="So Sánh Sản Phẩm"><i class="icon ion-android-options"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#mymodal" title="Xem Nhanh"><i class="icon ion-android-open"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content pt-20">
                                            <div class="manufacture-product">
                                                <a href="shop.php">IVY Moda</a>
                                                <div class="rating">
                                                    <div class="rating-box">
                                                        <div class="rating4">rating</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h2><a href="product-details.php">Balo Thời Trang</a>
                                            </h2>
                                            <div class="price">
                                                <ul>
                                                    <li class="new-price">599,000đ</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product-wrapper end -->
                                </div>
                                <div class="col-12">
                                    <!-- product-wrapper start -->
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <a href="product-details.php">
                                                <img src="../../../public/frontend/assetss/images/product/29.jpg" alt="product" class="primary" />
                                                <img src="../../../public/frontend/assetss/images/product/30.jpg" alt="product" class="secondary" />
                                            </a>
                                            <div class="product-icon">
                                                <a href="#" data-toggle="tooltip" title="Thêm vào Giỏ Hàng"><i class="icon ion-bag"></i></a>
                                                <a href="#" data-toggle="tooltip" title="So Sánh Sản Phẩm"><i class="icon ion-android-options"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#mymodal" title="Xem Nhanh"><i class="icon ion-android-open"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content pt-20">
                                            <div class="manufacture-product">
                                                <a href="shop.php">Dior</a>
                                                <div class="rating">
                                                    <div class="rating-box">
                                                        <div class="rating5">rating</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h2><a href="product-details.php">Xăng Đan Thời Trang Nam</a>
                                            </h2>
                                            <div class="price">
                                                <ul>
                                                    <li class="new-price">450,000đ</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product-wrapper end -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Accessories">
                        <div class="row">
                            <div class="product-active">
                                <div class="col-12">
                                    <!-- product-wrapper start -->
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <a href="#">
                                                <img src="../../../public/frontend/assetss/images/product/23.jpg" alt="product" class="primary" />
                                                <img src="../../../public/frontend/assetss/images/product/24.jpg" alt="product" class="secondary" />
                                            </a>
                                            <div class="product-icon">
                                                <a href="#" data-toggle="tooltip" title="Thêm vào Giỏ Hàng"><i class="icon ion-bag"></i></a>
                                                <a href="#" data-toggle="tooltip" title="So Sánh Sản Phẩm"><i class="icon ion-android-options"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#mymodal" title="Xem Nhanh"><i class="icon ion-android-open"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content pt-20">
                                            <div class="manufacture-product">
                                                <a href="#">Chanel</a>
                                                <div class="rating">
                                                    <div class="rating-box">
                                                        <div class="rating2">rating</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h2><a href="product-details.php">Túi Xách Nam Công Sở Da</a>
                                            </h2>
                                            <div class="price">
                                                <ul>
                                                    <li class="new-price">999,000đ</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product-wrapper end -->
                                </div>
                                <div class="col-12">
                                    <!-- product-wrapper start -->
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <a href="product-details.php">
                                                <img src="../../../public/frontend/assetss/images/product/31.jpg" alt="product" class="primary" />
                                                <img src="../../../public/frontend/assetss/images/product/32.jpg" alt="product" class="secondary" />
                                            </a>
                                            <div class="product-icon">
                                                <a href="#" data-toggle="tooltip" title="Thêm vào Giỏ Hàng"><i class="icon ion-bag"></i></a>
                                                <a href="#" data-toggle="tooltip" title="So Sánh Sản Phẩm"><i class="icon ion-android-options"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#mymodal" title="Xem Nhanh"><i class="icon ion-android-open"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content pt-20">
                                            <div class="manufacture-product">
                                                <a href="shop.php">Dior</a>
                                                <div class="rating">
                                                    <div class="rating-box">
                                                        <div class="rating3">rating</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h2><a href="product-details.php">Túi Xâch Công Sở Da Bò</a>
                                            </h2>
                                            <div class="price">
                                                <ul>
                                                    <li class="new-price">1,950,000đ</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product-wrapper end -->
                                </div>
                                <div class="col-12">
                                    <!-- product-wrapper start -->
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <a href="product-details.php">
                                                <img src="../../../public/frontend/assetss/images/product/7.jpg" alt="product" class="primary" />
                                                <img src="../../../public/frontend/assetss/images/product/8.jpg" alt="product" class="secondary" />
                                            </a>
                                            <div class="product-icon">
                                                <a href="#" data-toggle="tooltip" title="Thêm vào Giỏ Hàng"><i class="icon ion-bag"></i></a>
                                                <a href="#" data-toggle="tooltip" title="So Sánh Sản Phẩm"><i class="icon ion-android-options"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#mymodal" title="Xem Nhanh"><i class="icon ion-android-open"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content pt-20">
                                            <div class="manufacture-product">
                                                <a href="shop.php">Chanel</a>
                                                <div class="rating">
                                                    <div class="rating-box">
                                                        <div class="rating4">rating</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h2><a href="product-details.php">Áo Khoác Nam Mặc Nhà</a>
                                            </h2>
                                            <div class="price">
                                                <ul>
                                                    <li class="new-price">449,000đ</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product-wrapper end -->
                                </div>
                                <div class="col-12">
                                    <!-- product-wrapper start -->
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <a href="product-details.php">
                                                <img src="../../../public/frontend/assetss/images/product/11.jpg" alt="product" class="primary" />
                                                <img src="../../../public/frontend/assetss/images/product/12.jpg" alt="product" class="secondary" />
                                            </a>
                                            <span class="sale">sale</span>
                                            <div class="product-icon">
                                                <a href="#" data-toggle="tooltip" title="Thêm vào Giỏ Hàng"><i class="icon ion-bag"></i></a>
                                                <a href="#" data-toggle="tooltip" title="So Sánh Sản Phẩm"><i class="icon ion-android-options"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#mymodal" title="Xem Nhanh"><i class="icon ion-android-open"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content pt-20">
                                            <div class="manufacture-product">
                                                <a href="shop.php">Chanel</a>
                                                <div class="rating">
                                                    <div class="rating-box">
                                                        <div class="rating5">rating</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h2><a href="product-details.php">Quần Dài Nam</a>
                                            </h2>
                                            <div class="price">
                                                <ul>
                                                    <li class="old-price"><del>600,000đ</strike></li>
                                                    <li class="new-price">449,000đ</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product-wrapper end -->
                                </div>
                                <div class="col-12">
                                    <!-- product-wrapper start -->
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <a href="#">
                                                <img src="../../../public/frontend/assetss/images/product/33.jpg" alt="product" class="primary" />
                                                <img src="../../../public/frontend/assetss/images/product/34.jpg" alt="product" class="secondary" />
                                            </a>
                                            <div class="product-icon">
                                                <a href="#" data-toggle="tooltip" title="Thêm vào Giỏ Hàng"><i class="icon ion-bag"></i></a>
                                                <a href="#" data-toggle="tooltip" title="So Sánh Sản Phẩm"><i class="icon ion-android-options"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#mymodal" title="Xem Nhanh"><i class="icon ion-android-open"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content pt-20">
                                            <div class="manufacture-product">
                                                <a href="#">IVY Moda</a>
                                                <div class="rating">
                                                    <div class="rating-box">
                                                        <div class="rating4">rating</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h2><a href="product-details.php">Giày Thể Thao Nam</a>
                                            </h2>
                                            <div class="price">
                                                <ul>
                                                    <li class="new-price">699,000đ</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product-wrapper end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- tab-area end -->
            </div>
        </div>
        <!-- feature-product-area end -->
        <!-- testimonial-area start -->
        <div class="testimonial-area bg ptb-80">
            <div class="container">
                <div class="row">
                    <div class="testimonial-active">
                        <div class="col-12">
                            <div class="single-testimonial text-center">
                                <div class="testimonial-img">
                                    <a href="#"><img src="../../../public/frontend/assetss/images/testimonial/1.jpeg" alt="avatar"></a>
                                </div>
                                <div class="testimonial-content">
                                    <p>Những sản phẩm của ADELLA không chỉ phong phú đa dạng về màu mắc, form dáng, mẫu
                                        mã, mà còn cảm nhận được những giá trị
                                        không thể nhìn thấy - đó là tình yêu của những nhà thiết kế, nhân viên..ADELLA
                                        trong từng đường may, sợi chỉ của mỗi sản
                                        phẩm. Sự lịch lãm mà vẫn trẻ trung, năng động của ADELLA mang lại luôn tạo cho
                                        mình sự tự tin, mình sẽ luôn tin tưởng và sử dụng. Chúc ADELLA ngày
                                        càng vững mạnh!</p>
                                    <i class="fa fa-quote-right"></i>
                                    <h4>Quang Hải</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="single-testimonial text-center">
                                <div class="testimonial-img">
                                    <a href="#"><img src="../../../public/frontend/assetss/images/testimonial/2.jpeg" alt="avatar"></a>
                                </div>
                                <div class="testimonial-content">
                                    <p>Đến với ADELLA bạn có thể lựa chọn trang phục công sở, đi chơi, dự tiệc… rất
                                        phong phú để
                                        bạn lựa chọn. Tôi còn rất ấn tượng với ADELLA ở đường kim mũi chỉ sắc nét và
                                        chắc chắn, và chiếc quần âu hay chiếc áo
                                        dạ luôn có đính kèm cúc sơ cua - đó là sự chu đáo mà ADELLA dành tới khách hàng
                                        của mình.
                                    </p>
                                    <i class="fa fa-quote-right"></i>
                                    <h4>Ngọc Anh</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- testimonial-area end -->
        <!-- arrivals-area start -->
        <div class="arrivals-area ptb-80">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title mb-30 text-center">
                            <h2>Sản phẩm mới nhất </h2>
                        </div>
                    </div>
                </div>
                <!-- tab-area start -->
                <div class="tab-content">
                    <div class="row">
                        <div class="product-active">
                            <div class="col-12">
                                <!-- product-wrapper start -->
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="product-details.php">
                                            <img src="../../../public/frontend/assetss/images/product/3.jpg" alt="product" class="primary" />
                                            <img src="../../../public/frontend/assetss/images/product/4.jpg" alt="product" class="secondary" />
                                        </a>
                                        <div class="product-icon">
                                            <a href="#" data-toggle="tooltip" title="Thêm vào Giỏ Hàng"><i class="icon ion-bag"></i></a>
                                            <a href="#" data-toggle="tooltip" title="So Sánh Sản Phẩm"><i class="icon ion-android-options"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#mymodal" title="Xem Nhanh"><i class="icon ion-android-open"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content pt-20">
                                        <div class="manufacture-product">
                                            <a href="shop.php">Prada</a>
                                            <div class="rating">
                                                <div class="rating-box">
                                                    <div class="rating2">rating</div>
                                                </div>
                                            </div>
                                        </div>
                                        <h2><a href="product-details.php">Áo Len Dài Tay Nữ</a>
                                        </h2>
                                        <div class="price">
                                            <ul>
                                                <li class="new-price">499,000đ</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-wrapper end -->
                            </div>
                            <div class="col-12">
                                <!-- product-wrapper start -->
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="product-details.php">
                                            <img src="../../../public/frontend/assetss/images/product/7.jpg" alt="product" class="primary" />
                                            <img src="../../../public/frontend/assetss/images/product/8.jpg" alt="product" class="secondary" />
                                        </a>
                                        <div class="product-icon">
                                            <a href="#" data-toggle="tooltip" title="Thêm vào Giỏ Hàng"><i class="icon ion-bag"></i></a>
                                            <a href="#" data-toggle="tooltip" title="So Sánh Sản Phẩm"><i class="icon ion-android-options"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#mymodal" title="Xem Nhanh"><i class="icon ion-android-open"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content pt-20">
                                        <div class="manufacture-product">
                                            <a href="shop.php">Chanel</a>
                                            <div class="rating">
                                                <div class="rating-box">
                                                    <div class="rating4">rating</div>
                                                </div>
                                            </div>
                                        </div>
                                        <h2><a href="product-details.php">Áo Khoác Nam Mặc Nhà</a>
                                        </h2>
                                        <div class="price">
                                            <ul>
                                                <li class="new-price">449,000đ</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-wrapper end -->
                            </div>
                            <div class="col-12">
                                <!-- product-wrapper start -->
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="product-details.php">
                                            <img src="../../../public/frontend/assetss/images/product/15.jpg" alt="product" class="primary" />
                                            <img src="../../../public/frontend/assetss/images/product/16.jpg" alt="product" class="secondary" />
                                        </a>
                                        <span class="sale">sale</span>
                                        <div class="product-icon">
                                            <a href="#" data-toggle="tooltip" title="Thêm vào Giỏ Hàng"><i class="icon ion-bag"></i></a>
                                            <a href="#" data-toggle="tooltip" title="So Sánh Sản Phẩm"><i class="icon ion-android-options"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#mymodal" title="Xem Nhanh"><i class="icon ion-android-open"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content pt-20">
                                        <div class="manufacture-product">
                                            <a href="shop.php">Dior </a>
                                            <div class="rating">
                                                <div class="rating-box">
                                                    <div class="rating3">rating</div>
                                                </div>
                                            </div>
                                        </div>
                                        <h2><a href="product-details.php">Áo Hoodie Nữ</a>
                                        </h2>
                                        <div class="price">
                                            <ul>
                                                <li class="new-price"><del>400,000đ</strike></li>
                                                <li class="old-price">299,000đ</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-wrapper end -->
                            </div>
                            <div class="col-12">
                                <!-- product-wrapper start -->
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="product-details.php">
                                            <img src="../../../public/frontend/assetss/images/product/23.jpg" alt="product" class="primary" />
                                            <img src="../../../public/frontend/assetss/images/product/24.jpg" alt="product" class="secondary" />
                                        </a>
                                        <div class="product-icon">
                                            <a href="#" data-toggle="tooltip" title="Thêm vào Giỏ Hàng"><i class="icon ion-bag"></i></a>
                                            <a href="#" data-toggle="tooltip" title="So Sánh Sản Phẩm"><i class="icon ion-android-options"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#mymodal" title="Xem Nhanh"><i class="icon ion-android-open"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content pt-20">
                                        <div class="manufacture-product">
                                            <a href="shop.php">Chanel</a>
                                            <div class="rating">
                                                <div class="rating-box">
                                                    <div class="rating2">rating</div>
                                                </div>
                                            </div>
                                        </div>
                                        <h2><a href="product-details.php">Túi Xách Nam Công Sở Da</a>
                                        </h2>
                                        <div class="price">
                                            <ul>
                                                <li class="new-price">999,000đ</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-wrapper end -->
                            </div>
                            <div class="col-12">
                                <!-- product-wrapper start -->
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="#">
                                            <img src="../../../public/frontend/assetss/images/product/33.jpg" alt="product" class="primary" />
                                            <img src="../../../public/frontend/assetss/images/product/34.jpg" alt="product" class="secondary" />
                                        </a>
                                        <div class="product-icon">
                                            <a href="#" data-toggle="tooltip" title="Thêm vào Giỏ Hàng"><i class="icon ion-bag"></i></a>
                                            <a href="#" data-toggle="tooltip" title="So Sánh Sản Phẩm"><i class="icon ion-android-options"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#mymodal" title="Xem Nhanh"><i class="icon ion-android-open"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content pt-20">
                                        <div class="manufacture-product">
                                            <a href="#">IVY Moda</a>
                                            <div class="rating">
                                                <div class="rating-box">
                                                    <div class="rating5">rating</div>
                                                </div>
                                            </div>
                                        </div>
                                        <h2><a href="product-details.php">Giày Thể Thao Nam</a>
                                        </h2>
                                        <div class="price">
                                            <ul>
                                                <li class="new-price">699,000đ</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-wrapper end -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- tab-area end -->
            </div>
        </div>
        <!-- arrivals-area end -->
        <!-- banner-area start -->
        <div class="banner-area">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <!-- single-banner start -->
                        <div class="single-banner mb-rsp-3">
                            <div class="banner-img">
                                <a href="shop.php"><img src="../../../public/frontend/assetss/images/banner/7.jpg" alt="banner"></a>
                            </div>
                            <div class="banner-content-2">
                                <h3>Hàng Mới Về</h3>
                                <h2>Sneakers trắng</h2>
                                <h2>cho nam</h2>
                                <a href="shop.php">mua ngay</a>
                            </div>
                        </div>
                        <!-- single-banner end -->
                    </div>
                    <div class="col-12 col-md-6">
                        <!-- single-banner start -->
                        <div class="single-banner">
                            <div class="banner-img">
                                <a href="shop.php"><img src="../../../public/frontend/assetss/images/banner/8.jpg" alt="banner"></a>
                            </div>
                            <div class="banner-content-2">
                                <h3>Sản Phẩm Độc Đáo!</h3>
                                <h2>Bộ sưu tập hè</h2>
                                <h2>cho nữ</h2>
                                <a href="shop.php">mua ngay</a>
                            </div>
                        </div>
                        <!-- single-banner end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- banner-area end -->
        <!-- banner-area-2 start -->
        <div class="banner-area-2">
            <div class="container">
                <div class="br-bottom ptb-80">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <!-- single-banner-2 start -->
                            <div class="single-banner-2 text-center mb-rsp-3">
                                <div class="banner-icon">
                                    <a href="#"><img src="../../../public/frontend/assetss/images/banner/2.png" alt="banner" /></a>
                                </div>
                                <div class="banner-text">
                                    <h2>Giao Hàng Tận Nơi</h2>
                                    <p>ADELLA giao hàng thanh toán tận nơi toàn quốc. ADELLA hỗ trợ phí ship chỉ còn 10K
                                        cho đơn hàng thanh toán qua chuyển khoản.</p>
                                </div>
                            </div>
                            <!-- single-banner-2 end -->
                        </div>
                        <div class="col-12 col-md-4">
                            <!-- single-banner-2 start -->
                            <div class="single-banner-2 text-center mb-rsp-3">
                                <div class="banner-icon">
                                    <a href="#"><img src="../../../public/frontend/assetss/images/banner/3.png" alt="banner" /></a>
                                </div>
                                <div class="banner-text">
                                    <h2>Chính sách đổi trả và hoàn tiền</h2>
                                    <p>Hệ thống cửa hàng ADELLA luôn luôn chấp nhận Đổi – Trả trong thời gian quy định
                                        và theo quy trình Đổi - Trả</p>
                                </div>
                            </div>
                            <!-- single-banner-2 end -->
                        </div>
                        <div class="col-12 col-md-4">
                            <!-- single-banner-2 start -->
                            <div class="single-banner-2 text-center">
                                <div class="banner-icon">
                                    <a href="#"><img src="../../../public/frontend/assetss/images/banner/4.png" alt="banner" /></a>
                                </div>
                                <div class="banner-text">
                                    <h2>Hỗ trợ trực tuyến 24/7</h2>
                                    <p>Luôn lắng nghe mong muốn của bạn và tư vấn sản phẩm một cách có tâm nhất.</p>
                                </div>
                            </div>
                            <!-- single-banner-2 end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner-area-2 end -->
        <!-- blog-area start -->
        <div class="blog-aea ptb-80">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title mb-30 text-center">
                            <h2>Bài Viết Mới Nhất</h2>
                        </div>
                    </div>
                    <div class="blog-active">
                        <div class="col-12">
                            <!-- single-blog start -->
                            <div class="single-blog">
                                <div class="blog-img">
                                    <a href="#"><img src="../../../public/frontend/assetss/images/blog/1.jpg" alt="blog"></a>
                                    <div class="date">
                                        Aug <span>09</span>
                                    </div>
                                </div>
                                <div class="blog-content pt-20">
                                    <h3><a href="blog-details.php">Vì sao chất lượng vẫn cao nhưng giá phải chăng.</a>
                                    </h3>
                                    <span>By Adella</span>
                                    <p>Câu trả lời và thông báo về một số thay đổi “nhỏ mà không nhỏ”. 2 ngày qua ADELLA
                                        nhận được nhiều sự quan tâm của các chị nhà mình về vấn đề này. Nên hôm nay em
                                        xin phép viết bài dài xíu
                                        để trả lời các chị</p>
                                    <a href="blog-details.php">Xem thêm...</a>
                                </div>
                            </div>
                            <!-- single-blog end -->
                        </div>
                        <div class="col-12">
                            <!-- single-blog-start -->
                            <div class="single-blog">
                                <div class="blog-img">
                                    <a href="#"><img src="../../../public/frontend/assetss/images/blog/2.jpg" alt="blog" /></a>
                                    <div class="date">
                                        Aug <span>10</span>
                                    </div>
                                </div>
                                <div class="blog-content pt-20">
                                    <h3><a href="blog-details.php">Các cách chăm sóc Sneaker.</a></h3>
                                    <span>By Adella</span>
                                    <p>Xin chào các độc giả của AĐELLA , hôm nay tôi sẽ nói cho các bạn về cách
                                        chăm sóc giầy Sneaker. Sở hữu những đôi giày Sneaker chất lượng là điều
                                        vô cùng tuyệt vời đối rất nhiều người mê giày. Tuy nhiên bạn còn phải
                                        biết cách giặt giày Sneaker
                                    </p>
                                    <a href="blog-details.php">Xem thêm ...</a>
                                </div>
                            </div>
                            <!-- single-blog-end -->
                        </div>
                        <div class="col-12">
                            <!-- single-blog-start -->
                            <div class="single-blog">
                                <div class="blog-img">
                                    <a href="#"><img src="../../../public/frontend/assetss/images/blog/3.jpg" alt="blog" /></a>
                                    <div class="date">
                                        Aug <span>11</span>
                                    </div>
                                </div>
                                <div class="blog-content pt-20">
                                    <h3><a href="blog-details.php">Những mẫu thời trang công sở cao cấp đẹp 2019.</a>
                                    </h3>
                                    <span>By Adella</span>
                                    <p>Thời trang công sở ngày nay không còn là những khái niệm khô cứng về áo sơ mi,
                                        quần tây, chân váy. Mà đó là một sàn diễn
                                        thời trang với sự biến tấu đầy mới mẻ từ kiểu dáng, chất liệu đến màu sắc.
                                    </p>
                                    <a href="blog-details.php">Xem thêm ...</a>
                                </div>
                            </div>
                            <!-- single-blog-end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- blog-area end -->
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
                                <p>Copyright &copy 2019 <a href="#">Adella</a> . All Right Reserved</p>
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
    <!-- page-wraper end -->


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