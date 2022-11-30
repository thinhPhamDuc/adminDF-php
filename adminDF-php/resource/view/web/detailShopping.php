<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);



include '../../../database/database.php';
include '../../../function/function.php';

$query = "SELECT * from products where id = " . $_GET['id'];
$result = $conn->query($query);

$size = "SELECT * from sizes";
$sizes = $conn->query($size);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-DF</title>
    <link rel="icon" href="../../../public/backend/assets/images/icon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public/frontend/assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">All Products</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                            <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex ml-auto">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </button>
                </form>
            </div>

        </div>
    </nav>
    <div class="container">
        <div class="super_container">
            <header class="header" style="display: none;">
                <div class="header_main">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                                <div class="header_search">
                                    <div class="header_search_content">
                                        <div class="header_search_form_container">
                                            <form action="#" class="header_search_form clearfix">
                                                <div class="custom_dropdown">
                                                    <div class="custom_dropdown_list"> <span class="custom_dropdown_placeholder clc">All Categories</span> <i class="fas fa-chevron-down"></i>
                                                        <ul class="custom_list clc">
                                                            <li><a class="clc" href="#">All Categories</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="single_product">
                        <div class="container-fluid" style=" background-color: #fff; padding: 11px;">
                            <div class="row">
                                <div class="col-lg-6 order-lg-2 order-1">
                                    <div class="image_selected"><img src="<?php if (substr($row['images'], 3)) {
                                                                                echo substr($row['images'], 3);
                                                                            } else {
                                                                                echo '../../../public/backend/assets/images/defaultImages.png';
                                                                            } ?>" alt="" style="width: 75%;"></div>
                                </div>
                                <div class="col-lg-6 order-3">
                                    <div class="inventory_description">
                                        <nav>
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="shoppingIndex.php">Home</a></li>
                                                <li class="breadcrumb-item active">Products</li>
                                            </ol>
                                        </nav>
                                        <div class="inventory_id" style="display:none;" name="id"><?php echo $row['id'] ?></div>

                                        <div class="inventory_name" name="name"><?php echo $row['name'] ?></div>
                                        <div>
                                            <span class="inventory_price" name="price">Giá của sản phẩm :<?php echo $row['price'] ?> đ</span>
                                        </div>
                                        <hr class="singleline">
                                        <div>
                                            <span class="inventory_info" name="description">Mô tả : <?php echo $row['description'] ?></span>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label for="price_addinventory">Số lượng:</label>
                                            </div>
                                            <input type="number" min="0" name="stock" id="stock" class="form-control">
                                            <div class="col-xs-6">
                                                <a href="cart.php?action&id=<?php echo $row['id'] ?>" class="btn btn-primary shop-button">Add to Cart</a>
                                                <button type="button" class="btn btn-success shop-button">Buy Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Core theme JS-->
    <script src="../../../public/frontend/assets/js/scripts.js"></script>
</body>

</html>