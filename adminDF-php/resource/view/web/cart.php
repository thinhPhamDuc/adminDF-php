<?php
session_start();
include '../../../database/database.php';
include '../../../function/function.php';

$query = "SELECT * from inventory";
$result = $conn->query($query);
if (isset($_POST["add"])) {
    if (isset($_SESSION["cart"])) {
        $item_array_id = array_column($_SESSION["cart"], "product_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][$count] = $item_array;
            echo '<script>window.location="cart.php"</script>';
        } else {
            echo '<script>alert("Product is already Added to Cart")</script>';
            echo '<script>window.location="cart.php"</script>';
        }
    } else {
        $item_array = array(
            'product_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'item_quantity' => $_POST["quantity"],
        );
        $_SESSION["cart"][0] = $item_array;
    }
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["cart"] as $keys => $value) {
            if ($value["product_id"] == $_GET["id"]) {
                unset($_SESSION["cart"][$keys]);
                echo '<script>alert("Product has been Removed...!")</script>';
                echo '<script>window.location="Cart.php"</script>';
            }
        }
    }
}
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../../public/frontend/assets/css/stylescart.css">


    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        * {
            font-family: 'Titillium Web', sans-serif;
        }

        .product {
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }

        table,
        th,
        tr {
            text-align: center;
        }

        .title2 {
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }

        h2 {
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }

        table th {
            background-color: #efefef;
        }
    </style>
</head>

<body>
<div class="body-wrapper  gdlr-icon-dark gdlr-header-transparent" data-home="cart.php">
  <div id="gdlr-header-substitute"></div>
  <!-- is search -->	
  <div class="content-wrapper">
    <div class="gdlr-content">
      <div class="with-sidebar-wrapper">
        <section id="content-reservations">
          <!--     CONTENT HERE       -->
        </section>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="container">
        <h2>Shopping Cart</h2>

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
                        <div class="product col-lg-3">
                            <img src="<?php if (substr($row['images'], 3)) {
                                            echo substr($row['images'], 3);
                                        } else {
                                            echo '../../../public/backend/assets/images/defaultImages.png';
                                        } ?>" alt="" style="width: 100px; height:100px;" class="img-responsive">
                            <h5 class="text-info"><?php echo $row["name"]; ?></h5>
                            <h5 class="text-info"><?php echo $row["stock"]; ?></h5>
                            <input type="text" name="quantity" class="form-control" value="1">
                            <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                            <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success" value="Add to Cart">
                        </div>
                    </form>
            <?php
                }
            } else {
                echo "0 results";
            }
            ?>
        <div style="clear: both"></div>
        <h3 class="title2">Shopping Cart Details</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th width="30%">Product Name</th>
                    <th width="10%">Stock</th>
                    <th width="17%">Remove Item</th>
                </tr>

                <?php
                if (!empty($_SESSION["cart"])) {
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                ?>
                        <tr>
                            <td><?php echo $value["item_name"]; ?></td>
                            <td><?php echo number_format($value["item_quantity"]); ?></td>
                            <td><a href="cart.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span class="text-danger">Remove Item</span></a></td>

                        </tr>
                    <?php
                    }
                    ?>
                <?php
                }
                ?>
                <tr>
                    <th align="left">Total</th>
                    <th width="10%">Stock</th>
                </tr>
            </table>
        </div>
    </div>
  <footer class="footer-wrapper">
    <div class="footer-container container">
      <div class="footer-column three columns" id="footer-widget-1">
        <div id="text-5" class="widget widget_text gdlr-item gdlr-widget">
          <h3 class="gdlr-widget-title">Book Now!</h3>
          <div class="clear"></div>
          <div class="textwidget">
            <p><i class="gdlr-icon fa fa-phone" style="color: #333; font-size: 16px; "></i> <a href="tel:+18666251829">+1 866-625-1829</a></p>
            <div class="clear"></div>
            <div class="gdlr-space" style="margin-top: -15px;"></div>
            <p><i class="gdlr-icon fa fa-envelope-o" style="color: #333; font-size: 16px; "></i> <a href="mailto:info@timezonehostel.com" target="_blank">info@timezonehostel.com</a></p>
            <div class="clear"></div>
            <div class="gdlr-space" style="margin-top: -15px;"></div>
            <p><i class="gdlr-icon fa fa-pencil" style="color: #333; font-size: 16px; "></i> <a href="https://www.google.com/search?q=time+zone+hostel&amp;oq=time+zone+hostel&amp;aqs=chrome.0.69i59j69i60l3j0l2.6743j0j4&amp;ie=UTF-8#lrd=0x80c2bf31eddd58e1:0x91ee68302a455bd0,3" target="_blank">Write a Review</a></p>
            <div class="clear"></div>
            <div class="gdlr-space" style="margin-top: 25px;"></div>
            <p><a href="https://www.facebook.com/Timezonehostelhollywood/" target="_blank"><i class="gdlr-icon fa fa-facebook-square" style="color: #333333; font-size: 24px; "></i></a> <a href="https://twitter.com/timezonehostel" target="_blank"><i class="gdlr-icon fa fa-twitter-square" style="color: #333333; font-size: 24px; "></i></a> <a href="https://www.instagram.com/Timezonehostelhollywood/" target="_blank"><i class="gdlr-icon fa fa-instagram" style="color: #333333; font-size: 24px; "></i></a></p>
          </div>
        </div>
      </div>
      <div class="footer-column three columns" id="footer-widget-2">
      </div>
      <div class="footer-column six columns" id="footer-widget-3">
        <div id="text-10" class="widget widget_text gdlr-item gdlr-widget">
          <h3 class="gdlr-widget-title">Be Ready!</h3>
          <div class="clear"></div>
          <div class="textwidget">
            <p>We believe that cheap is not the same as bad, prepare to have one of the best experiences of your life.</p>
          </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="copyright-wrapper">
      <div class="copyright-container container">
        <div class="copyright-left">
          <a href="cart.php" style="margin-right: 10px;">Home</a>|<a href="cart.php" style="margin-right: 10px; margin-left: 10px;">Booking</a> | <a href="cart.phpabout-us/" style="margin-right: 10px; margin-left: 10px;">About</a> | <a href="cart.phpcontact/" style="margin-right: 10px; margin-left: 10px;">Contact</a>				
        </div>
        <div class="copyright-right">
          Copyright 2018 All Right Reserved				
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </footer>
</div>
   


</body>

</html>