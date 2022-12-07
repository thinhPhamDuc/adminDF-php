<?php
include '../../../../database/database.php';

  $id = $_POST['id_deleteInventory'];
  $sql1 = "SELECT * FROM inventory WHERE id = '$id' ";
  $row = mysqli_fetch_assoc(mysqli_query($conn, $sql1));
  unlink($row['images']);
  $sql = "DELETE FROM inventory WHERE id = '$id' ";
  if ($conn->query($sql) === TRUE) {
    header('Location: ../main/manage-inventory.php');
  } else {
    echo '("Delete not succesfully")' . $conn->error;
  }
