<?php
include '../../../../database/database.php';
include '../../../../function/function.php';
$id = $_POST["id_editProductCategory"];
$name = test_input($_POST["name_editProductCategory"]);
$category_editProductCategory=$_POST["category_editProductCategory"];
$sql = mysqli_query($conn, "SELECT * FROM product_categories where name='$name'");
if ($name === "" && $sql->num_rows > 0) {
  echo "<script>alert('Không được để rỗng!'); window.location = '../main/manage-productsCategory.php';</script>";
  die;
} 
else{
  $update = "UPDATE product_categories SET name='$name', parent_id='$category_editProductCategory' WHERE id='$id'";
  if ($conn->query($update) === true) {
    echo "<script>window.location = '../main/manage-productsCategory.php';</script>";
  } else {
    echo "Lỗi";
  }
  
}

