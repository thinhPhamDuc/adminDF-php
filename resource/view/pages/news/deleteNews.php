<?php
include '../../../../database/database.php';

  $id = $_POST['id_deleteNew'];
  $sql = "SELECT * FROM new WHERE id = '$id' ";
  $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
  unlink($row['images']);
  $sql = "DELETE FROM new WHERE id = '$id' ";
  if ($conn->query($sql) === TRUE) {
    header('Location: ../main/manage-news.php');
  } else {
    echo '("Delete not succesfully")' . $conn->error;
  }
