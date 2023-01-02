<?php
include '../../../../database/database.php';
include '../../../../function/function.php';

$id = $_POST['id_editNewTag'];
$name = test_input($_POST['name_editNewTag']);

if ($name === "") {
  echo "<script>alert('Không được để rỗng!'); window.location = '../main/manage-productsTag.php';</script>";
} else {
  $sql = "UPDATE new_tag SET name = '$name' WHERE id = '$id' ";
  if ($conn->query($sql) === TRUE) {
    echo "<script>window.location = '../main/manage-newsTag.php';</script>";
  } else {
    echo "Error";
  }
}