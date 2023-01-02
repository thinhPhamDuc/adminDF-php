<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
if (!isset($_SESSION['user'])) {
    header('Location:../auth/login.php');
}

include '../../../../database/database.php';
include '../../../../function/function.php';
$query = mysqli_query($conn, "SELECT * FROM roles WHERE id =" . $_GET['id']);
$role = $query->fetch_assoc();

$sql = "SELECT * FROM `permissions` ORDER BY code ASC";
$permissions = $conn->query($sql);

if ($_POST) {
    //  Xóa các quyền cũ của nhóm quyền
    $sql = "DELETE FROM `link_role_permission` WHERE role_id = $role[id]";
    $conn->query($sql);
    foreach ($_POST['pers'] as $per_id) {
        //  Gán các quyền mới chọn vào nhóm quyền
        $sql = "INSERT INTO `link_role_permission` (role_id, permission_id) VALUES ( $role[id]  , $per_id)";
        $conn->query($sql);
    }
    echo "<script>window.location = '../main/manage-permissions.php';</script>";
}


$sql = "SELECT * FROM `link_role_permission` WHERE role_id = $role[id]";
$permissions_checked = $conn->query($sql);
$pers_checked = [];
if ($permissions->num_rows > 0) {
    while ($row = $permissions_checked->fetch_assoc()) {
        $pers_checked[] = $row['permission_id'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminDF-php||Quản lí người dùng</title>
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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

                    </div>
                    <!-- ///========= Edit Modal =========/// -->
                    <table id="example" class="display nowrap" style="width:100%">
                        <div id="layoutSidenav_content" style="background: #f2f3f8">
                            <main>
                                <div class="container-fluid">
                                    <h1 class="mt-4">Edit Role: <?php echo $role['name']; ?></h1>
                                    <ol class="breadcrumb mb-4" style="background: white">
                                        <li class="breadcrumb-item"><a href="../main/index.php">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Edit Role: <?php echo $role['name']; ?></li>
                                    </ol>
                                    <form action="" method="POST">
                                        <div class="role__content row">
                                            <div class="col-md-4">
                                                <div class="role__left">
                                                    <div class="form-group">
                                                        <label for="name_editRole">Tên quyền:</label>
                                                        <input value="<?php echo $role['name']; ?>" type="text" name="name_editRole" class="form-control" id="name_editRole">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary editRoleBtn">Lưu
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="role__right">
                                                    <?php
                                                    $code = '';
                                                    if ($permissions->num_rows > 0) {
                                                        while ($row = $permissions->fetch_assoc()) {
                                                            $module_name = @explode('_', $row['code'])[0];
                                                            if ($module_name != $code) {
                                                                $code = $module_name;
                                                                if ($module_name === "post") {
                                                                    $module_name = "Bài viết";
                                                                } elseif ($module_name === "product") {
                                                                    $module_name = "Sản phẩm";
                                                                } elseif ($module_name === "role") {
                                                                    $module_name = "Quyền";
                                                                } elseif ($module_name === "user") {
                                                                    $module_name = "Người dùng";
                                                                } elseif ($module_name === "order") {
                                                                    $module_name = "Order";
                                                                } elseif ($module_name === "new") {
                                                                    $module_name = "Bài viết";
                                                                }
                                                    ?>
                                                                <br><br><label class="perChecked"><input id='perChecked' style='margin-right: 5px;' name='inputPers' type='checkbox' checked value=value="<?php echo $row['id']; ?>"><?php echo $module_name; ?>
                                                                </label>
                                                            <?php
                                                            }
                                                            ?>
                                                            <label style="display: inline-block; width: 100%; margin-left: 20px">
                                                                <input style="margin-right: 5px;" name="pers[]" type="checkbox" <?php if (in_array($row['id'], $pers_checked)) echo 'checked'; ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?>
                                                            </label>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </main>
                        </div>
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