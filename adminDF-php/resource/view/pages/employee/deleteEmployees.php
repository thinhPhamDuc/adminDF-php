<?php
include '../../../../database/database.php';


if (isset($_POST['deleteUser'])) {
  $id = $_POST['id_deleteUser'];
  $sql1 = "SELECT * FROM users WHERE id = '$id' ";
  $row = mysqli_fetch_assoc(mysqli_query($conn, $sql1));
  unlink($row['images']);
  $sql = "DELETE FROM users WHERE id = '$id' ";
  if ($conn->query($sql) === TRUE) {
    header('Location: ../main/manage-employees.php');
  } else {
    echo '("Delete not succesfully")' . $conn->error;
  }
}