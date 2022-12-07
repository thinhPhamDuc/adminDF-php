<?php
include '../../../../database/database.php';

if (isset($_POST['deleteProductTag'])) {
  $id = $_POST['id_deleteProductTag'];
  $sql1 = "SELECT * FROM product_tag WHERE id = '$id' ";
  $row = mysqli_fetch_assoc(mysqli_query($conn, $sql1));
  $sql = "DELETE FROM product_tag WHERE id = '$id' ";
  if ($conn->query($sql) === TRUE) {
    header('Location: ../main/manage-productsTag.php');
  } else {
    echo '("Delete not succesfully")' . $conn->error;
  }
}