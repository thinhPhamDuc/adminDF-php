<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['user'])) {
    header('Location:  ../auth/login.php');
}

include '../../../../database/database.php';
include '../../../../function/function.php';
$query = "SELECT * from order_item where order_id = " . $_GET['id'];
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminDF-php||Quản lí sản phẩm</title>
    <link rel="icon" href="../../../../public/backend/assets/images/icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <!-- Custom styles for this template-->
    <link href="../../../../public/backend/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include '../../partial/sideBar.php'; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include '../../partial/topBar.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Orders Detail</h1>
                        <form action="../products/exportProduct.php" method="post">
                            <button type="submit" name="export" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</button>
                        </form>

                    </div>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <!-- <button class="btn btn-primary"  data-toggle="modal" data-target="#addProduct" type="button">Thêm</button> -->
                    </div>

                    <table id="example" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th style="display:none;">ID</th>
                                <th style="display:none;">order_id</th>
                                <th style="display:none;">product_id</th>
                                <th>stock</th>
                                <th>item_price</th>
                                <th>total</th>
                                <th>client_id</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td style="display:none;"><?php echo $row['id']; ?></td>
                                        <td style="display:none;"><?php echo $row['order_id']; ?></td>
                                        <td style="display:none;"><?php echo $row['product_id']; ?></td>
                                        <td><?php echo $row['stock']; ?></td>
                                        <td><?php echo $row['item_price']; ?></td>
                                        <td><?php echo $row['total']; ?></td>
                                        <?php
                                        $us = getClientName($row['client_id']);
                                        ?>
                                        <td class="field-category"><?php if ($us['name']) echo $us['name'] ?></td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="display:none;">ID</th>
                                <th style="display:none;">order_id</th>
                                <th style="display:none;">product_id</th>
                                <th>stock</th>
                                <th>item_price</th>
                                <th>total</th>
                                <th>client_id</th>
                            </tr>
                            </tr>
                        </tfoot>
                    </table>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <?php include '../../partial/footer.php'; ?>


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <!-- Bootstrap core JavaScript-->
    <script src="../../../../public/backend/assets/js/jquery.min.js"></script>
    <script src="../../../../public/backend/assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../../../public/backend/assets/js/jquery.easing.min.js"></script>
    <script src="../../../../public/backend/assets/js/sb-admin-2.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="../../../../public/backend/assets/js/main.js"></script>


</body>

</html>