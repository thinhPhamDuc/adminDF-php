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

$sql = "SELECT * FROM users WHERE NOT (id = '5')";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminDF-php||Quản lí người dùng</title>
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
                        <button class="btn btn-primary"  data-toggle="modal" data-target="#addProduct" type="button">Thêm</button>
                    </div>

                    <!-- Add Modal -->
                    <div class="modal fade" id="addProduct" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="../employee/addEmployees.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thêm người dùng</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                
                                    <div class="modal-body">
                                        <div class="form-group position-relative text-center">
                                            <img id="avatar_pro" class="form__img" src="../../../../public/backend/assets/images/defaultImages.png" width="100" >
                                            <label for="fileProduct" class="form__label">
                                                <i class="fas fa-pen"></i>
                                                <input type="file" name="fileProduct" id="fileUser">
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="name_addProduct">Firstname:</label>
                                            <input type="text" name="firstname_addUser" id="firstname_addUser" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="description_addProduct">Lastname:</label>
                                            <input type="text" name="lastname_addUser" id="lastname_addUser" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="price_addProduct">Email:</label>
                                            <input type="text" name="email_addUser" id="email_addUser" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="price_addProduct">Password:</label>
                                            <input type="text"  id="password_addUser"  placeholder="admin là mật khẩu mặc định" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" name="addUser" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                     <!-- ///========= Edit Modal =========/// -->
                    <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="../employee/editEmployees.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Product</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" id="id_editUser" name="id_editUser">
                                    <div class="form-group position-relative text-center">
                                    <img class="form__img" width="100" id="img_editUser">
                                    <label for="fileProduct" class="form__label">
                                        <i class="fas fa-pen"></i>
                                        <input type="file" name="fileProduct" id="fileUserEdit">
                                    </label>
                                    </div>
                                    <div class="form-group">
                                    <label for="firstname_editUser">Firstname:</label>
                                    <input type="text" name="firstname_editUser" id="firstname_editUser" class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <label for="lastname_editUser">Lastname:</label>
                                    <input type="text" name="lastname_editUser" id="lastname_editUser" class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <label for="email_editUser">Email:</label>
                                    <input type="text" name="email_editUser" id="email_editUser" class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <label for="phone_editUser">Phone:</label>
                                    <input type="text" name="phone_editUser" id="phone_editUser" class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <label for="address_editUser">Address:</label>
                                    <input type="text" name="address_editUser" id="address_editUser" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="editUser" class="btn btn-success">Edit</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                      <!-- ///========= Delete Modal =========/// -->
                    <div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="../employee/deleteEmployees.php" method="POST" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h4 class="modal-title">Delete User</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h5>Are you sure?</h5>
                                <input type="hidden" id="id_deleteUser" name="id_deleteUser">
                                <div class="form-group">
                                <input type="hidden" name="fileProduct" id="fileProduct">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="deleteUser" class="btn btn-danger">Delete</button>
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
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>        
                                <th>Status</th>
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
                            <td class="imgUserBtn text-center"><img src="<?php if ($row['images']) {
                                                                                    echo $row['images'];
                                                                                } else {
                                                                                    echo '../../../../public/backend/assets/images/defaultImages.png';
                                                                                } ?>" width="100" alt="">
                            </td>
                            <td><?php echo $row['firstname']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <?php
                                $status = $row['active'];
                                if ($status == 0) {
                                    $strStatus = "<a class='btn btn-secondary' href=../employee/activeEmployees.php?id=" . $row['id'] . ">Deactivate</a>";
                                }
                                if ($status == 1) {
                                    $strStatus = "<a class='btn btn-warning text-white' href=../employee/deactiveEmployess.php?id=" . $row['id'] . ">Active</a>";
                                }
                                ?>
                            <td><?php echo $strStatus ?></td>
                            <td>
                                <button type="button"  data-toggle="modal" class="btn btn-success editUserBtn" data-target="#editUser">Edit</button>
                                <button type="button" data-toggle="modal" class="btn btn-danger deleteUserBtn" data-target="#deleteUser">Delete</button>
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
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>        
                                <th>Status</th>
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