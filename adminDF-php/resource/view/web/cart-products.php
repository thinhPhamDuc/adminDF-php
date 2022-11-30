<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);



include '../../../database/database.php';
include '../../../function/function.php';

session_start();
print_r($_SESSION['cart']);
$total = 0;
                    if (isset($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'], 'product_id');

                        $result = $db->getData();
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($product_id as $id){
                                if ($row['id'] == $id){
                                    cartElement($row['product_image'], $row['product_name'],$row['product_price'], $row['id']);
                                    $total = $total + (int)$row['product_price'];
                                }
                            }
                        }
                    }else{
                        echo "<h5>Cart is Empty</h5>";
                    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <!-- Title  -->
  <title>Amado - Furniture Ecommerce Template | Cart</title>

  <link rel="icon" href="../../../public/frontend/assets/img/core-img/favicon.ico">

  <!-- Core Style CSS -->
  <link rel="stylesheet" href="../../../public/frontend/assets/css/core-style.css">
  <link rel="stylesheet" href="../../../public/frontend/assets/css/style.css">

</head>

<body>
  <!-- Search Wrapper Area Start -->
  <div class="search-wrapper section-padding-100">
    <div class="search-close">
      <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="search-content">
            <form action="#" method="get">
              <input type="search" name="search" id="search" placeholder="Type your keyword...">
              <button type="submit"><img src="img/core-img/search.png" alt=""></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Search Wrapper Area End -->

  <div class="container">
  <div class="main-content-wrapper d-flex clearfix">

<!-- Mobile Nav (max width 767px)-->
<div class="mobile-nav">
  <!-- Navbar Brand -->
  <div class="amado-navbar-brand">
    <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
  </div>
  <!-- Navbar Toggler -->
  <div class="amado-navbar-toggler">
    <span></span><span></span><span></span>
  </div>
</div>

<!-- Header Area Start -->
<header class="header-area clearfix">
  <!-- Close Icon -->
  <div class="nav-close">
    <i class="fa fa-close" aria-hidden="true"></i>
  </div>
  <!-- Logo -->
  <div class="logo">
    <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
  </div>
  <!-- Amado Nav -->
  <nav class="amado-nav">
    <ul>
      <li><a href="index.php">Home</a></li>
      <!-- <li><a href="shop.html">Shop</a></li>
      <li><a href="product-details.html">Product</a></li>
      <li class="active"><a href="cart.html">Cart</a></li>
      <li><a href="checkout.html">Checkout</a></li> -->
    </ul>
  </nav>
  <!-- Button Group -->
  <div class="amado-btn-group mt-30 mb-100">
    <a href="#" class="btn amado-btn mb-15">%Discount%</a>
    <a href="#" class="btn amado-btn active">New this week</a>
  </div>
  <!-- Cart Menu -->
  <div class="cart-fav-search mb-100">
    <a href="cart.html" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Cart <span>(0)</span></a>
    <a href="#" class="fav-nav"><img src="img/core-img/favorites.png" alt=""> Favourite</a>
    <a href="#" class="search-nav"><img src="img/core-img/search.png" alt=""> Search</a>
  </div>
  <!-- Social Button -->
  <div class="social-info d-flex justify-content-between">
    <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
  </div>
</header>
<!-- Header Area End -->

<div class="cart-table-area section-padding-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-6 col-lg-12">
        <div class="cart-title mt-50">
          <h2>Shopping Cart</h2>
        </div>

        <div>
          <table class="table">
            <thead>
              <tr>
                <th></th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
              ?>
                  <tr>
                    <form action="cart-products.php?action=add&id=<?php echo $row["id"]; ?>" method="post">
                    <td class="cart_product_img">
                    <img src="<?php if (substr($row['images'], 3)) {
                                        echo substr($row['images'], 3);
                                    } else {
                                        echo '../../../public/backend/assets/images/defaultImages.png';
                                    } ?>" alt="" style="width: 100px; height:100px;" class="img-responsive">
                    </td>
                    <td class="cart_product_desc">
                      <input name="hidden_name" readonly value="<?php echo $row['name'] ?>"></input>
                    </td>
                    <td class="price">
                      <input name="price" readonly value="<?php echo '$' . $row['price'] ?>"></input>
                    </td>
                    <td class="qty">
                      <div class="qty-btn d-flex">
                        <p>Qty</p>
                        <div class="quantity">
                          <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                          <input type="number" class="qty-text" id="qty" step="1" min="1" max="<?php echo $row['stock'] ?>" name="quantity" value="1">
                          <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        </div>
                      </div>
                    </td>
                    <td>
                      <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success cart-btn" value="Add to Cart">
                    </td>
                    </form>    
                  </tr>
              <?php
                }
              } else {
                echo "0 results";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
  </div>
  <!-- ##### Main Content Wrapper Start ##### -->
  
  <!-- ##### Main Content Wrapper End ##### -->

  <!-- ##### Newsletter Area Start ##### -->
  <section class="newsletter-area section-padding-100-0">
    <div class="container">
      <div class="row align-items-center">
        <!-- Newsletter Text -->
        <div class="col-12 col-lg-6 col-xl-7">
          <div class="newsletter-text mb-100">
            <h2>Subscribe for a <span>25% Discount</span></h2>
            <p>Nulla ac convallis lorem, eget euismod nisl. Donec in libero sit amet mi vulputate consectetur. Donec auctor interdum purus, ac finibus massa bibendum nec.</p>
          </div>
        </div>
        <!-- Newsletter Form -->
        <div class="col-12 col-lg-6 col-xl-5">
          <div class="newsletter-form mb-100">
            <form action="#" method="post">
              <input type="email" name="email" class="nl-email" placeholder="Your E-mail">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ##### Newsletter Area End ##### -->

  <!-- ##### Footer Area Start ##### -->
  <!-- ##### Footer Area End ##### -->

  <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
  <script src="../../../public/frontend/assets/js/jquery/jquery-2.2.4.min.js"></script>
  <!-- Popper js -->
  <script src="../../../public/frontend/assets/js/popper.min.js"></script>
  <!-- Bootstrap js -->
  <script src="../../../public/frontend/assets/js/bootstrap.min.js"></script>
  <!-- Plugins js -->
  <script src="../../../public/frontend/assets/js/plugins.js"></script>
  <!-- Active js -->
  <script src="../../../public/frontend/assets/js/active.js"></script>

</body>

</html>