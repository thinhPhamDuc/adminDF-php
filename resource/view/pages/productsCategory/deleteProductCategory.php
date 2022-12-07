<?php
include '../../../../database/database.php';
include '../../../../function/function.php';

$id = $_POST['id_deleteProductCategory'];
$sql = "DELETE FROM product_categories WHERE id = '$id' ";
if ($conn->query($sql) === TRUE) {
  echo "<script>window.location = '../main/manage-productsCategory.php';</script>";
} else {
  echo 'Error';
}