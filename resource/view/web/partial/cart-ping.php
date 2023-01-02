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
<?php
                                    if (isset($_SESSION['cart'])) {
                                        $_SESSION['total'] == 0;
                                    ?>
                                        <li><a href="cart-new.php"><i class="icon ion-bag"></i></a>
                                            <span><?php
                                                    if (isset($_SESSION['cart'])) {
                                                        $count = count($_SESSION['cart']);
                                                        echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                                                    } else {
                                                        echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                                                    }

                                                    ?></span>
                                            <div class="mini-cart-sub">
                                                <div class="cart-product">
                                                    <?php
                                                    if (isset($_SESSION['cart'])) {
                                                        $_SESSION['total'] = 0;
                                                        foreach ($_SESSION['cart'] as $itemCart) {
                                                            $_SESSION['total'] += $itemCart['total'];
                                                    ?>

                                                            <div class="single-cart">
                                                                <div class="cart-img">
                                                                    <a href="product-details.php?id=<?php echo $itemCart['product_id'] ?>"><img src="<?php echo substr($itemCart['image'], 3); ?>" alt="book" /></a>
                                                                </div>
                                                                <div class="cart-info">
                                                                    <h5><a href="product-details.php"><?php echo $itemCart['name']; ?></a></h5>
                                                                    <p><?php echo $itemCart['stock']; ?> x <?php echo $itemCart['price']; ?>,000đ</p>
                                                                </div>
                                                            </div>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="cart-totals">
                                                    <?php
                                                    if (isset($_SESSION['total'])) {
                                                        $_SESSION['total'] == 0;
                                                    ?>
                                                        <h5>Tổng <span><?php echo $_SESSION['total']; ?>,000đ</span></h5>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="cart-bottom">
                                                    <a href="checkout.php">Thanh Toán</a>
                                                </div>
                                            </div>
                                        </li>
                                    <?php
                                    }
                                    ?>
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