<?php
include '../../../../database/database.php';

if (isset($_POST['deleteProduct'])) {
  $id = $_POST['id_deleteProduct'];
  $sql1 = "SELECT * FROM products WHERE id = '$id' ";
  $row = mysqli_fetch_assoc(mysqli_query($conn, $sql1));
  unlink($row['images']);
  $sqlUnlinkProductImages = "SELECT * FROM product_images WHERE product_id = '$id' ";
  $fetchUnlinkProductImages = mysqli_fetch_all(mysqli_query($conn, $sqlUnlinkProductImages));
  foreach ($fetchUnlinkProductImages as $key => $fetchUnlink) {
    unlink($fetchUnlink[2]);
  }
  $sql = "DELETE FROM products WHERE id = '$id' ";
  $sql1 = "DELETE FROM inventory WHERE product_id = '$id' ";
  $sql2 = "DELETE FROM product_images WHERE product_id = '$id' ";
  if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
    header('Location: ../main/manage-products.php');
  } else {
    echo '("Delete not succesfully")' . $conn->error;
  }
}