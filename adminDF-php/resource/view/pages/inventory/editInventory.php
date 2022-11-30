<?php
include '../../../../database/database.php';
include '../../../../function/function.php';

$id = $_POST['id_editInventory'];
$stock = test_input($_POST['stock_editInventory']);

$sql = "UPDATE inventory SET stock = '$stock' WHERE id = '$id' ";
if ($conn->query($sql) === TRUE) {
    echo "<script>window.location = '../main/manage-inventory.php';</script>";
} else {
    echo "Error";
}
