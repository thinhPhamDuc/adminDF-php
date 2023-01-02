<?php
include '../../../../database/database.php';

if (isset($_POST['deleteNewTag'])) {
  $id = $_POST['id_deleteNewTag'];
  $sql1 = "SELECT * FROM new_tag WHERE id = '$id' ";
  $row = mysqli_fetch_assoc(mysqli_query($conn, $sql1));
  $sql = "DELETE FROM new_tag WHERE id = '$id' ";
  if ($conn->query($sql) === TRUE) {
    header('Location: ../main/manage-newsTag.php');
  } else {
    echo '("Delete not succesfully")' . $conn->error;
  }
}