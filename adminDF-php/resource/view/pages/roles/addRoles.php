<?php

use Behat\Transliterator\Transliterator;

include '../../../../database/database.php';
include '../../../../function/function.php';

if (isset($_POST['addRole'])) {
  $name = $_POST['name_addRole'];
  $code = $_POST['name_addRole'];
  $slug = createSlug($code);
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  $time = date('Y-m-d H:i:s');
  var_dump($slug);
  if ($name === "") {
    echo "<script>alert('Không được để rỗng!'); window.location = '../main/manage-roles.php';</script>";
  } else {
    $sql = "INSERT INTO roles (name,code,created_at,updated_at) VALUES ('$name','$slug','$time','$time')";
    if ($conn->query($sql) === TRUE) {
      echo "<script>window.location = '../main/manage-roles.php';</script>";
    } else {
      echo "<script>alert('Lỗi!')</script>";
    }
  }
}
