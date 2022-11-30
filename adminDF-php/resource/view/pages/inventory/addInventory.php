<?php
include '../../../../database/database.php';
include '../../../../function/function.php';

if (isset($_POST['addInventory'])) {
    $product_addInventory = $_POST['product_addInventory'];
    $stock_addInventory = $_POST['stock_addInventory'];
    $str = explode("----", $product_addInventory);
    $id_addInventory = $str[0];
    $name = $str[1];
    $images = $str[2];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $time = date('Y-m-d H:i:s');

    $sql = "INSERT INTO inventory (name,product_id, images,stock,created_at) VALUES ('$name','$id_addInventory' ,'$images','$stock_addInventory','$time')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location = '../main/manage-inventory.php';</script>";
    } else {
        echo "Error";
    }
    
}
