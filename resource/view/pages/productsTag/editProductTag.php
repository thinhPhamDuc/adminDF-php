<?php
include '../../../../database/database.php';
include '../../../../function/function.php';

$id = $_POST['id_editProductTag'];
$name = $_POST['name_editProductTag'];

if ($name === "") {
  echo "<script>alert('Không được để rỗng!'); window.location = '../main/manage-productsTag.php';</script>";
} else {
  $sql = "UPDATE product_tag SET name = '$name' WHERE id = '$id' ";
  if ($conn->query($sql) === TRUE) {
    echo "<script>window.location = '../main/manage-productsTag.php';</script>";
  } else {
    echo "Error";
  }
}