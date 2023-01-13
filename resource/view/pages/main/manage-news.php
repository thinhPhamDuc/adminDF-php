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
// PHẦN XỬ LÝ PHP
// BƯỚC 1: KẾT NỐI CSDL
// $conn = mysqli_connect('localhost', 'root', 'vertrigo', 'paging_example');

// BƯỚC 2: TÌM TỔNG SỐ RECORDS
$result = mysqli_query($conn, 'select count(id) as total from products');
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];

// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 5;

// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
// tổng số trang
$total_page = ceil($total_records / $limit);

// Giới hạn current_page trong khoảng 1 đến total_page
if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}

// Tìm Start
$start = ($current_page - 1) * $limit;

// BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
// Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
// $result = mysqli_query($conn, "SELECT * FROM news LIMIT $start, $limit");

$sql = "SELECT * FROM new order by id desc LIMIT $start, $limit";

$result = $conn->query($sql);

// $sql = "SELECT * FROM product_categories ORDER BY id DESC";
// $categories = $conn->query($sql);

$sql = "SELECT * FROM new_tag ORDER BY name ASC";
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
                        <h1 class="h3 mb-0 text-gray-800">Quản lí bài viết</h1>
                    </div>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#addProduct" type="button">Thêm</button>
                        <!-- <form action="../products/importProduct.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="import_file" class="form-control" />
                            <button type="submit" name="save_excel_data" class="btn btn-primary mt-3">Import</button>
                        </form> -->
                    </div>

                    <!--Add Modal -->
                    <div class="modal fade" id="addProduct" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="../news/addNews.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="form-group position-relative text-center">
                                            <p>Main images</p>
                                            <img id="image-preview" class="form__img" src="../../../../public/backend/assets/images/defaultImages.png" width="100">
                                            <label for="fileProduct" class="form__label">
                                                <i class="fas fa-pen"></i>
                                                <input type="file" name="fileProduct" id="fileProduct" class="upload__inputfile">
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="title_addNew">Title:</label>
                                            <input type="text" name="title_addNew" id="title_addNew" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="description_addNew">Description:</label>
                                            <!-- <input type="text" name="description_addNew" id="description_addNew" class="form-control"> -->
                                            <textarea rows="4" cols="50" type="text" name="description_addNew" id="description_addNew" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="tags_addNew">Tags:</label>
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
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" name="addNew" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- ///========= Edit Modal =========/// -->
                    <div class="modal fade" id="editNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="../news/editNews.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Product</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" id="id_editProduct" name="id_editNew">
                                        <div class="form-group position-relative text-center">
                                            <img class="form__img" width="100" id="img_editProduct">
                                            <label for="fileProduct" class="form__label">
                                                <p>Main images</p>
                                                <i class="fas fa-pen"></i>
                                                <input type="file" name="fileProduct" id="fileProductEdit">
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="title_editNew">Title:</label>
                                            <input type="text" name="title_editNew" id="title_editNew" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="description_editNew">Description:</label>
                                            <textarea rows="4" cols="50" name="description_editNew" id="description_editNew" class="form-control"></textarea>
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
                                        <button type="submit" name="editNew" class="btn btn-success">Edit</button>
                                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- ///========= Delete Modal =========/// -->
                    <div class="modal fade" id="deleteNew">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="../news/deleteNews.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Delete Product</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Are you sure?</h5>
                                        <input type="hidden" id="id_deleteNew" name="id_deleteNew">
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
                                <th class="text-center">Main images</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Tag</th>
                                <td>Action</td>
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
                                        <td style="overflow:hidden; white-space:nowrap; text-overflow:ellipsis; width:100px;"><?php echo $row['title']; ?></td>
                                        <td><p style="overflow:hidden; white-space:nowrap; text-overflow:ellipsis; width:100px;"><?php echo $row['description']; ?></p></td>
                                            <?php
                                            $tags = getNewTags($row['id']);
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
                                        <td>
                                            <button type="button" data-toggle="modal" class="btn btn-success editNewBtn" data-target="#editNew">Edit</button>
                                            <button type="button" class="btn btn-danger deleteNewBtn">Delete</button>
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
                                <th class="text-center">Main images</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Tag</th>
                                <td>Action</td>
                            </tr>
                        </tfoot>
                        <!-- <div class="pagination">
                            <?php
                            // PHẦN HIỂN THỊ PHÂN TRANG
                            // BƯỚC 7: HIỂN THỊ PHÂN TRANG

                            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                            if ($current_page > 1 && $total_page > 1) {
                                echo '<button class="btn-primary"><a style="color: white;" href="manage-news.php?page=' . ($current_page - 1) . '">Prev</a></button>';
                            }

                            // Lặp khoảng giữa
                            for ($i = 1; $i <= $total_page; $i++) {
                                // Nếu là trang hiện tại thì hiển thị thẻ span
                                // ngược lại hiển thị thẻ a
                                if ($i == $current_page) {
                                    echo '<button class="btn-primary"><span>' . $i . '</span></button>';
                                } else {
                                    echo '<button class="btn-primary"><a style="color: white;" href="manage-news.php?page=' . $i . '">' . $i . '</a></button>';
                                }
                            }

                            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                            if ($current_page < $total_page && $total_page > 1) {
                                echo '<button class="btn-primary"><a style="color: white;" href="manage-news.php?page=' . ($current_page + 1) . '">Next</a></button>';
                            }

                            ?>
                        </div> -->
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

    <style>
        @charset "UTF-8";

        html * {
            box-sizing: border-box;
        }

        p {
            margin: 0;
        }

        .upload__box {
            padding: 40px;
        }

        .upload__inputfile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        .upload__btn {
            display: inline-block;
            font-weight: 600;
            color: #fff;
            text-align: center;
            min-width: 116px;
            padding: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid;
            background-color: #4045ba;
            border-color: #4045ba;
            border-radius: 10px;
            line-height: 26px;
            font-size: 14px;
        }

        .upload__btn:hover {
            background-color: unset;
            color: #4045ba;
            transition: all 0.3s ease;
        }

        .upload__btn-box {
            margin-bottom: 10px;
        }

        .upload__img-wrap {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .upload__img-box {
            width: 200px;
            padding: 0 10px;
            margin-bottom: 12px;
        }

        .upload__img-close {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 10px;
            right: 10px;
            text-align: center;
            line-height: 24px;
            z-index: 1;
            cursor: pointer;
        }

        .upload__img-close:after {
            content: "✖";
            font-size: 14px;
            color: white;
        }

        .img-bg {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            padding-bottom: 100%;
        }
    </style>

</body>

</html>