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

$sql = "SELECT * FROM product_tag ORDER BY name ASC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminDF-php||Quản lí sản phẩm</title>
    <link rel="icon" href="../../../../public/backend/assets/images/icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <button class="btn btn-primary"  data-toggle="modal" data-target="#addProductTag" type="button">Thêm</button>
                    </div>

                    <!--Add Modal -->
                    <div class="modal fade" id="addProductTag" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="../productsTag/addProductTag.php" method="POST">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thêm Tag</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name_addProductTag">Name:</label>
                                            <input type="text" name="name_addProductTag" id="name_addProductTag" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" name="addProductTag" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                     <!-- ///========= Edit Modal =========/// -->
                     <div class="modal fade" id="editProductTag" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="../productsTag/editProductTag.php" method="POST">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Product</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="id_editProductTag" name="id_editProductTag">
                                <div class="form-group">
                                <label for="name_editProductTag">Name:</label>
                                <input type="text" name="name_editProductTag" id="name_editProductTag" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="editProductTag" class="btn btn-success">Edit</button>
                                <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                            </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    <!-- ///========= Delete Modal =========/// -->
                    <div class="modal fade" id="deleteProductTag">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="../productsTag/deleteProductTag.php" method="POST">
                            <div class="modal-header">
                                <h4 class="modal-title">Delete Tag</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h5>Are you sure?</h5>
                                <input type="hidden" id="id_deleteProductTag" name="id_deleteProductTag">
                                <div class="form-group">
                                <input type="hidden" name="fileProduct" id="fileProduct">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="deleteProductTag" class="btn btn-danger">Delete</button>
                                <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                            </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    <table id="example" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th style="display: none;">ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td style="display: none;"><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td>
                                <button type="button"  data-toggle="modal" class="btn btn-success editProductTagBtn" data-target="#editProduct">Edit</button>
                                <button type="button" class="btn btn-danger deleteProductTagBtn">Delete</button>
                            </td>
                            
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
                                <th style="display: none;">ID</th>
                                <th>Name</th>
                                <th>Action</th>
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