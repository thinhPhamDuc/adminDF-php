<?php
include '../../../../database/database.php';
include '../../../../function/function.php';

$id = $_GET['id'];
$sql = "UPDATE users SET active = '0' WHERE id = '$id' ";
if ($conn->query($sql) === TRUE) {
  header('Location: ../main/manage-employees.php');
} else {
  echo 'Not Activated';
}