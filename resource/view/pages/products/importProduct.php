<?php
// session_start();
include '../../../../database/database.php';
include '../../../../function/function.php';


require '../../../../vendor/autoload.php';
require '../../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/IOFactory.php';

if (isset($_POST['save_excel_data'])) {
    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls', 'csv', 'xlsx'];

    if (in_array($file_ext, $allowed_ext)) {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach ($data as $key => $row) {
            if ($count > 0) {
                $nameProduct = $row['0'];
                $slug  = createSlug($nameProduct);
                $description = $row['1'];
                $price = $row['2'];
                $stock = $row['3'];
                // $seller_id = $_POST['user_addProduct'];
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $time = date('Y-m-d H:i:s');
                $checkExistProduct = "UPDATE products SET name = '$nameProduct', description = '$description', category_id = 15 , price = '$price', images = null , brand_id= 2, seller_id=5  WHERE slug = '$slug' ";
                error_log('$checkExistProduct', 3, 'log.txt');
                error_log($checkExistProduct, 3, 'log.txt');
                if ($conn->query($checkExistProduct) === TRUE) {
                    error_log('cột ảnh hưởng', 3, 'log.txt');
                    error_log($conn -> affected_rows, 3, 'log.txt');
                    if ($conn -> affected_rows > 0) {
                        error_log('vao if', 3, 'log.txt');
                        $sqlSelectProductID = "SELECT id FROM products WHERE slug = '$slug'";
                        error_log('$sqlSelectProductID', 3, 'log.txt');
                        error_log($sqlSelectProductID, 3, 'log.txt');
                        $selectByProductId = $conn->query($sqlSelectProductID);
                        if (isset($selectByProductId)) {
                            if ($selectByProductId->num_rows > 0) {
                                while ($row = $selectByProductId->fetch_assoc()) {
                                    $productid = $row['id'];
                                    $updateInventory = "UPDATE inventory SET stock = '$stock', price = '$stock' WHERE product_id = '$productid' ";
                                    if ($conn->query($updateInventory) === TRUE) {
                                        error_log($updateInventory, 3, 'log.txt');
                                        echo "<script>alert('Insert Success'); window.location='../main/manage-products.php';</script>";
                                        $msg = 1;
                                    }
                                }
                            }
                        }
                    }  
                    else {
                        error_log('vao else', 3, 'log.txt');
                        $sql = "INSERT INTO products (name, description, price,created_at,category_id,seller_id,brand_id,slug) VALUES ('$nameProduct', '$description','$price','$time',15,5,2,'$slug')";
                        error_log($sql, 3, 'log.txt');
                        if ($conn->query($sql) === TRUE) {
                            $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 1";
                            $last_id = $conn->insert_id;
                            error_log('$last_id', 3, 'log.txt');
                            error_log($last_id, 3, 'log.txt');

                            $sql1 = "INSERT INTO inventory (name,product_id,stock,created_at,price) VALUES ('$nameProduct','$last_id','$stock','$time','$price')";
                            error_log('$sql1', 3, 'log.txt');
                            error_log($sql1, 3, 'log.txt');

                            if ($conn->query($sql1) === TRUE) {
                                echo "<script>alert('Insert Success'); window.location='../main/manage-products.php';</script>";
                                $msg = 1;
                            }
                        }
                    } 
                } 
            } else {
                $count = "1";
            }
        }

        if (isset($msg)) {
            $_SESSION['message'] = "Successfully Imported";
            header('Location: ../main/manage-products.php');
            exit(0);
        } else {
            $_SESSION['message'] = "Not Imported";
            header('Location: ../main/manage-products.php');
            exit(0);
        }
    } else {
        $_SESSION['message'] = "Invalid File";
        header('Location: ../main/manage-products.php');
        exit(0);
    }
}
