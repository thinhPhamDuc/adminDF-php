<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();

include '../../../database/database.php';
include '../../../function/function-web.php';

$query = "SELECT * from products where id = " . $_GET['id'];
$result = $conn->query($query);

if (isset($_POST['add'])) {
    /// print_r($_POST['product_id']);
    if (isset($_SESSION['cart']) && isset($_SESSION['total'])) {

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if (in_array($_POST['product_id'], $item_array_id)) {
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        } else {

            $count = count($_SESSION['cart']);

            $item_array = array(
                'product_id' => $_POST['product_id'],
                'price' => $_POST['price'],
                'stock' => $_POST['stock'],
                'image' => $_POST['images'],
                'name' => $_POST['name'],
                'total' => $_POST['price'] * $_POST['stock'],
            );

            $_SESSION['total'] = 0;
            $_SESSION['cart'][$count] = $item_array;


        }
    } else {

        $item_array = array(
            'product_id' => $_POST['product_id'],
            'price' => $_POST['price'],
            'stock' => $_POST['stock'],
            'image' => $_POST['images'],
            'name' => $_POST['name'],
            'total' => $_POST['price'] * $_POST['stock'],
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        $_SESSION['total'] = 0;

    }
}


?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Adella Fashion 💚 Chi tiết sản phẩm</title>
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

<body class="product-details">
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
    </header>
    <!-- header-area end -->
    <!-- breadcrumbs-area start -->
    <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2>Chi Tiết Sản Phẩm</h2>
                        <ul>
                            <li><a href="index.php">Trang Chủ /</a></li>
                            <li class="active"><a href="#">Chi Tiết Sản Phẩm</a></li>
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
            <form action="" method="post">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <!-- zoom-area start -->
                                <div class="zoom-area mb-rsp-3">
                                    <img id="zoompro" src="<?php if (substr($row['images'], 3)) {
                                                                echo substr($row['images'], 3);
                                                            } else {
                                                                echo '../../../../public/backend/assets/images/defaultImages.png';
                                                            } ?>" data-zoom-image="<?php if (substr($row['images'], 3)) {
                                                                                            echo substr($row['images'], 3);
                                                                                        } else {
                                                                                            echo '../../../../public/backend/assets/images/defaultImages.png';
                                                                                        } ?>" alt="zoom" />
                                </div>
                                <!-- zoom-area end -->
                            </div>
                            <div class="col-12 col-md-6">
                                <!-- zoom-product-details start -->

                                <div class="zoom-product-details">
                                    <h1><?php echo $row['name']; ?></h1>
                                    <div class="main-area mtb-30">
                                        <div class="rating">
                                            <div class="rating-box">
                                                <div class="rating5">rating</div>
                                            </div>

                                        </div>
                                        <div class="review-2">
                                            <a href onclick="$('a[href=\'#Reviews\']').trigger('click'); $('body,html').animate({scrollTop: $('.products-detalis-area .tab-menu').offset().top}, 800); return false;">1
                                                Đánh Giá</a> /
                                            <a href onclick="$('a[href=\'#Reviews\']').trigger('click'); $('body,html').animate({scrollTop: $('.products-detalis-area .tab-menu').offset().top}, 800); return false;">Viết
                                                Đánh Giá</a>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <ul>
                                            <li class="new-price"><?php echo $row['price']; ?> ,000đ</li>
                                        </ul>
                                    </div>
                                    <div class="list-unstyled">
                                        <ul>
                                            <?php
                                            $us = getBrandName($row['brand_id']);
                                            ?>
                                            <li>Thương Hiệu: <span data-brand_id="<?php if ($us['id']) echo $us['id'] ?>"><?php if ($us['name']) echo $us['name'] ?></span></li>
                                            <?php
                                            $querystock = "SELECT * from inventory where product_id = " . $_GET['id'];
                                            $stock = $conn->query($querystock);
                                            if ($stock->num_rows > 0) {
                                                while ($row = $stock->fetch_assoc()) {
                                                    if ($row['stock'] > 0) {
                                                        $strStatus = '<span>Còn Hàng</span>';
                                                    } else {
                                                        $strStatus = '<span>Hết Hàng</span>';
                                                    }
                                                }
                                            }
                                            ?>
                                            <li>Tình Trạng: <span><?php echo $strStatus; ?></span></li>
                                        </ul>
                                    </div>
                                    <div class="catagory-select mb-30">
                                        <h3>Kích cỡ</h3>
                                        <form action="#">
                                            <label for="#">Chọn:</label>
                                            <select class="sorter-options" data-role="sorter">
                                                <?php
                                                echo productBrandTree();
                                                ?>
                                            </select>
                                        </form>
                                    </div>
                                    <?php
                                    $querystock = "SELECT * from inventory where product_id = " . $_GET['id'];
                                    $stock = $conn->query($querystock);
                                    if ($stock->num_rows > 0) {
                                        while ($row = $stock->fetch_assoc()) {
                                    ?>

                                            <form action="" method="post">
                                                <div class="quality-button">
                                                    <input class="qty" type="text" value="0" name="stock" />
                                                    <input type="button" value="+" data-max="<?php echo $row['stock']; ?>" class="plus" />
                                                    <input type="button" value="-" data-min="0" class="minus" />
                                                </div>
                                                <button name="add" type="submit">Thêm vào Giỏ Hàng</button>
                                                <input type="hidden" name='product_id' value='<?php echo $row['product_id']; ?>'>
                                                <input type="hidden" name='images' value='<?php echo $row['images']; ?>'>
                                                <input type="hidden" name='price' value='<?php echo $row['price']; ?>'>
                                                <input type="hidden" name='name' value='<?php echo $row['name']; ?>'>
                                                <div class="product-icon">
                                                    <a href="#" data-toggle="tooltip" title="Thêm vào Yêu Thích"><i class="ion-android-favorite-outline"></i></a>
                                                    <a href="#" data-toggle="tooltip" title="So Sánh Sản Phẩm"><i class="icon ion-android-options"></i></a>
                                                </div>
                                            </form>
                                    <?php

                                        }
                                    }
                                    ?>
                                </div>

                                <!-- zoom-product-details end -->
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </form>

            <div class="row">
                <!-- products-detalis-area start -->
                <div class="products-detalis-area pt-80">
                    <div class="col-lg-12">
                        <!-- tab-menu start -->
                        <div class="tab-menu mb-30 text-center">
                            <ul>
                                <li class="active"><a href="#Description" data-toggle="tab">Mô tả</a></li>
                                <li><a href="#Reviews" data-toggle="tab">Đánh Giá (0)</a></li>
                            </ul>
                        </div>
                        <!-- tab-menu end -->
                    </div>
                    <!-- tab-content start -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="Description">
                            <div class="col-lg-12">
                                <div class="tab-description">
                                    <p>Áo nỉ nữ in hình, dáng regular, cổ tròn, tay dài. Chất liệu mềm mại,ấm áp về
                                        mùa
                                        đông. <br>
                                        71.6% cotton 28.4%polyester. Để sản phẩm nơi khô ráo, tránh tiếp xúc trực
                                        tiếp với
                                        ánh nắng mặt trời và nhiệt độ cao. Tránh để bề mặt sản phẩm tiếp xúc với các
                                        vật sắc
                                        nhọn.</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Reviews">
                            <div class="col-lg-12">
                                <div class="reviews-area">
                                    <h3>Đánh Giá</h3>
                                    <p>Hãy là người đầu tiền đánh giá “Áo Nỉ Nữ In Hình” </p>
                                    <div class="rating-area mb-10">
                                        <h4>Bình Chọn Của Bạn</h4>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                    <div class="comment-form mb-10">
                                        <label>Đánh Giá Của Bạn</label>
                                        <textarea name="comment" id="comment" cols="20" rows="7"></textarea>
                                    </div>
                                    <div class="comment-form-author mb-10">
                                        <label>Tên</label>
                                        <input type="text" />
                                    </div>
                                    <div class="comment-form-email mb-10">
                                        <label>email</label>
                                        <input type="text" />
                                    </div>
                                    <button type="submit">Gửi</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- tab- end -->
                </div>
                <!-- products-detalis-area end -->
            </div>
            <!-- product-details-area end -->
        </div>
    </div>
    <!-- shop-main-area end -->
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
                                    <a href="#">
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
                                        <a href="#">Prada</a>
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
                                    <a href="#">
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
                                        <a href="#">Chanel</a>
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
                                    <a href="#">
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
                                        <a href="#">Dior </a>
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
                                                <div class="rating5">rating</div>
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
            <!-- tab-area end -->
        </div>
    </div>
    <!-- arrivals-area end -->
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
                            <div class="product-rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star-o"></i></a>
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
</body>

</html>