<?php
include '../../../../database/database.php';
include '../../../../function/function.php';

if (isset($_POST['addUser'])) {
  $firstname = $_POST['firstname_addUser'];
  $lastname = $_POST['lastname_addUser'];
  $email = $_POST['email_addUser'];
  $password = md5('admin');
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  $time = date('Y-m-d H:i:s');
  $phone="";
  $active="0";
  $role_id="3";
  $address="";
  $file_store = uploadImages('../../../../public/backend/assets/images/user/', '../main/manage-employees.php');
//   if ($firstname !== "" && $lastname !== "" && $email !== "" ) {
//     echo "<script>alert('Không được để rỗng aaaaaa!'); window.location = '../main/manage-employees.php';</script>";
//   } else {
    $sql = "INSERT INTO users (firstname, lastname, email, password,created_at,phone,active,role_id,address) VALUES ('$firstname', '$lastname', '$email', '$password', '$time','$phone','$active','$role_id','$address')";
    if ($conn->query($sql) === TRUE) {
      echo "<script>window.location = '../main/manage-employees.php';</script>";
    } else {
      echo "<script>alert('Lỗi!')</script>";
    }
//   }
}