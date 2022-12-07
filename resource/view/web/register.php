<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();

include '../../../database/database.php';
include '../../../function/function-web.php';
$nameError = $phoneError = $passwordError = $confirmError = $textError = $addressError = "";
$name = $phone =  $password = $confirm = $address = "";
if (isset($_POST["register"])) {
  $name = test_input($_POST["name"]);
  $phone = test_input($_POST["phone"]);
  $password = test_input($_POST["password"]);
  $confirm = test_input($_POST["confirm"]);
  $address = test_input($_POST["address"]);
  if ($name === "" || $phone === "" || $password === "" || $confirm === "" || $address === "") {
    $textError = "Please enter information";
  } else {
    $sql = "SELECT * FROM client WHERE phone = '$phone' ";
    $check = mysqli_query($conn, $sql);
    if (mysqli_num_rows($check) > 0) {
      $phoneError = "Account already exists";
    } else {
      if ($password === $confirm) {
        $password = md5($password);
        $time = date('Y-m-d H:i:s');
        $sql = "INSERT INTO client (name, phone, password, created_at,address) VALUES ('$name', '$phone', '$password','$time','$address')";
        if ($conn->query($sql) === TRUE) {
          echo '<script language="javascript">alert("Đăng ký thành công"); window.location="login.php";</script>';
        } else {
          echo "Error Insert: " . $sql . "<br>" . $conn->error;
        }
      } else {
        $passwordError = "Password Error";
      }
    }
  }
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Adella Fashion 💚 Đăng Ký</title>
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

<body class="register">
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
                                <a href="index.html"><img src="../../../public/frontend/assetss/images/logo/1.png" alt="logo"></a>
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
                            <h2>Đăng Ký</h2>
                            <ul>
                                <li><a href="index.html">Trang Chủ /</a></li>
                                <li class="active"><a href="#">Đăng Ký</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumbs-area end -->
        <!-- shop-main-area start -->
        <div class="shop-main-area">
            <!-- user-login-area start -->
            <div class="user-login-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8 offset-lg-2">
                            <form action="" method="post">
                            <div class="billing-fields">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="single-register">
                                            <!-- <form action="#"> -->
                                                <label>Tên<span>*</span></label>
                                                <input type="text" id="exampleName" value="<?php echo $name ?>" name="name"
                                                placeholder="Tên"/>
                                                <span class="error"><?php echo $textError; ?></span>
                                                <span class="error"><?php echo $nameError; ?></span>
                                            <!-- </form> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="single-register">
                                            <!-- <form action="#"> -->
                                                <label>Điện Thoại<span>*</span></label>
                                                <input type="text"  id="examplephone" value="<?php echo $phone ?>" name="phone"
                                                placeholder="ĐIện Thoại"/>
                                                <span class="error"><?php echo $textError; ?></span>
                                            <span class="error"><?php echo $phoneError; ?></span>
                                            <!-- </form> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="single-register">
                                    <!-- <form action="#"> -->
                                        <label>Địa Chỉ<span>*</span></label>
                                        <input type="text" id="exampleNameaddress" value="<?php echo $address ?>" name="address"
                                                placeholder="Địa Chỉ"/>
                                                <span class="error"><?php echo $textError; ?></span>
                                            <span class="error"><?php echo $addressError; ?></span>
                                    <!-- </form> -->
                                </div>
                                <div class="single-register">
                                    <!-- <form action="#"> -->
                                        <label>Mật khẩu<span>*</span></label>
                                        <input type="password" id="exampleNamepassword" name="password"
                                                placeholder="Mật khẩu"/>
                                                <span class="error"><?php echo $textError; ?></span>
                                            <span class="error"><?php echo $passwordError; ?></span>
                                    <!-- </form> -->
                                </div>
                                <div class="single-register">
                                    <!-- <form action="#"> -->
                                        <label>Xác Nhận Mật Khẩu<span>*</span></label>
                                        <input type="password" id="exampleNamepassword" name="confirm"
                                                placeholder="Mật khẩu"/>
                                                <span class="error"><?php echo $textError; ?></span>
                                            <span class="error"><?php echo $passwordError; ?></span>
                                    <!-- </form> -->
                                </div>
                                <div class="single-register">
                                    <button name="register">Đăng Ký</button>
                                </div>
                            </div>
                            </form>      
                        </div>
                    </div>
                </div>
            </div>
            <!-- user-login-area end -->
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
                                <a href="#"><img src="images/logo/1.png" alt="logo" /></a>
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
    <style>
        .single-register button {
    background: rgba(0,0,0,0) none repeat scroll 0 0;
    border: 1px solid #eceff8;
    box-shadow: none;
    color: #626262;
    display: inline-block;
    font-size: 16px;
    margin-top: 6px;
    padding: 12px 48px;
    transition: 0.3s;
}
.single-register button:hover {
    background-color:#e33;
    color:#fff;
    border:1px solid #e33;
}
    </style>
</body>

</html>