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
$sql = "SELECT * FROM products order by id DESC";

$result = $conn->query($sql);

$sql = "SELECT * FROM product_categories ORDER BY id DESC";
$categories = $conn->query($sql);

$sql = "SELECT * FROM product_tag ORDER BY name ASC";
$tags = $conn->query($sql);

$sql = "SELECT * FROM users WHERE status = '1' ";

$users = $conn->query($sql);
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
                        <form action="../products/exportProduct.php" method="post">
                            <button type="submit" name="export" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</button>
                        </form>
                        
                    </div>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <button class="btn btn-primary"  data-toggle="modal" data-target="#addProduct" type="button">Thêm</button>
                    </div>

                    <!--Add Modal -->
                    <div class="modal fade" id="addProduct" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="../products/addProduct.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                
                                    <div class="modal-body">
                                        <div class="form-group position-relative text-center">
                                            <img id="image-preview" class="form__img" src="../../../../public/backend/assets/images/defaultImages.png" width="100" >
                                            <label for="fileProduct" class="form__label">
                                                <i class="fas fa-pen"></i>
                                                <input type="file" name="fileProduct" id="fileProduct">
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="name_addProduct">Name:</label>
                                            <input type="text" name="name_addProduct" id="name_addProduct" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="description_addProduct">Description:</label>
                                            <input type="text" name="description_addProduct" id="description_addProduct" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="price_addProduct">Price:</label>
                                            <input type="number" name="price_addProduct" id="price_addProduct" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="category_addProduct">Categories:</label>
                                            <select name="category_addProduct" id="category_addProduct" class="form-control">
                                                <?php
                                                echo productCategoryTree();
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="brand_addProduct">Brand:</label>
                                            <select name="brand_addProduct" id="brand_addProduct" class="form-control">
                                                <?php
                                                echo productBrandTree();
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tags_addProduct">Tags:</label>
                                            <?php
                                            $list_tags = [];
                                            if ($tags->num_rows > 0) {
                                                while ($row = $tags->fetch_assoc()) {
                                                echo '<label style="display: block;"><input style="margin-right: 5px;" name="tags[]" type="checkbox" value="' . $row['id'] . '">' . $row['name'] .  '</label>';
                                                $list_tags[] = $row;
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <input style="display:none;" type="text" name="user_addProduct" id="user_addProduct"  
                                            value="<?php echo $user['id'] ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" name="addProduct" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                     <!-- ///========= Edit Modal =========/// -->
                    <div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="../products/editProduct.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Product</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" id="id_editProduct" name="id_editProduct">
                                    <div class="form-group position-relative text-center">
                                    <img class="form__img" width="100" id="img_editProduct">
                                    <label for="fileProduct" class="form__label">
                                        <i class="fas fa-pen"></i>
                                        <input type="file" name="fileProduct" id="fileProductEdit">
                                    </label>
                                    </div>
                                    <div class="form-group">
                                    <label for="name_editProduct">Name:</label>
                                    <input type="text" name="name_editProduct" id="name_editProduct" class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <label for="description_editProduct">Description:</label>
                                    <input type="text" name="description_editProduct" id="description_editProduct" class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <label for="price_editProduct">Price:</label>
                                    <input type="number" name="price_editProduct" id="price_editProduct" class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <label for="category_editProduct">Categories:</label>
                                    <select name="category_editProduct" id="category_editProduct" class="form-control">
                                        <?php
                                        echo productCategoryTree();
                                        ?>
                                    </select>
                                    </div>
                                    <div class="form-group form-tag">
                                    <label for="tags_editProduct">Tags:</label>
                                    <?php
                                    foreach ($list_tags as $item) {
                                        echo '<label style="display: block;"><input style="margin-right: 5px;" name="tags[]" class="tag-' . $item['id'] . '" type="checkbox" value="' . $item['id'] . '">' . $item['name'] . '</label>';
                                    }
                                    ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="editProduct" class="btn btn-success">Edit</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                      <!-- ///========= Delete Modal =========/// -->
                    <div class="modal fade" id="deleteProduct">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="../products/deleteProduct.php" method="POST" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h4 class="modal-title">Delete Product</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h5>Are you sure?</h5>
                                <input type="hidden" id="id_deleteProduct" name="id_deleteProduct">
                                <div class="form-group">
                                <input type="hidden" name="fileProduct" id="fileProduct">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="deleteProduct" class="btn btn-danger">Delete</button>
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
                                <th>Images</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Tags</th>
                                <th style="display: none;">Price</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Seller</th>
                                <th>Brand</th>
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
                            <td class="imgProductBtn text-center">
                                <img src="<?php if ($row['images']) {
                                                                                    echo $row['images'];
                                                                                } else {
                                                                                    echo '../../../../public/backend/assets/images/defaultImages.png';
                                                                                } ?>" width="100" alt="">
                            </td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['description']; ?>
                            </td>
                            <?php
                                $cate = getProductCategory($row['category_id']);
                                ?>
                            <td class="field-category" data-category_id="<?php if ($cate['id']) echo $cate['id'] ?>">
                                <?php if ($cate['name']) echo $cate['name'] ?>
                            
                            <?php
                                $tags = getProductTags($row['id']);
                                ?>
                            <td class="field-tag" data-tag_id="<?php foreach ($tags as $tag) {
                                                                        if ($tag['id']) {
                                                                        echo $tag['id'] . ',';
                                                                        }
                                                                    } ?>">
                                <?php foreach ($tags as $tag) {
                                    if ($tag['name']) {
                                        echo $tag['name'] . ',';
                                    }
                                    } ?>
                            </td>
                            <td style="display: none;"><?php echo $row['price']; ?></td>
                            <?php
                                $status = $row['status'];
                                if ($status == 0) {
                                    $strStatus = "<a class='btn btn-secondary' href=../products/activeProduct.php?id=" . $row['id'] . ">Deactivate</a>";
                                }
                                if ($status == 1) {
                                    $strStatus = "<a class='btn btn-warning text-white' href=../products/deactiveProduct.php?id=" . $row['id'] . ">Active</a>";
                                }
                                ?>
                            <td><?php echo $strStatus ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <?php
                                $us = getSellerName($row['seller_id']);
                                ?>
                            <td class="field-category" data-seller_id="<?php if ($us['id']) echo $us['id'] ?>">
                            <?php if ($us['lastname']) echo $us['lastname'] ?></td>
                            <?php
                                $us = getBrandName($row['brand_id']);
                                ?>
                            <td class="field-category" data-brand_id="<?php if ($us['id']) echo $us['id'] ?>">
                            <?php if ($us['name']) echo $us['name'] ?></td>
                            <td>
                                <button type="button"  data-toggle="modal" class="btn btn-success editProductBtn" data-target="#editProduct">Edit</button>
                                <button type="button" class="btn btn-danger deleteProductBtn">Delete</button>
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
                                <th>Images</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Tags</th>
                                <th style="display: none;">Price</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Seller</th>
                                <th>Brand</th>
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