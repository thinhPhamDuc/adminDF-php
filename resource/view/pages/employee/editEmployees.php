<?php
include '../../../../database/database.php';
include '../../../../function/function.php';


//chưa chỉnh sửa
if (isset($_POST['editUser'])) {
  $id = $_POST['id_editUser'];
  $firstname = $_POST['firstname_editUser'];
  $lastname = $_POST['lastname_editUser'];
  $email = $_POST['email_editUser'];
  $phone = $_POST['phone_editUser'];
  $address = $_POST['address_editUser'];
  $file_store = editImages('../../../../public/backend/assets/images/user/', '../main/manage-employees.php', 'users', $id);


  if ($firstname === "" || $lastname === "" || $email === "" || $phone === ""|| $address === "") {
    echo "<script>alert('Không thể để rỗng.'); window.location = '../main/manage-employees.php';</script>";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Email không đúng định dạng.'); window.location = '../main/manage-employees.php';</script>";
  } else {
    $update = "UPDATE users SET firstname='$firstname', lastname ='$lastname', email ='$email', phone ='$phone',address ='$address', images ='$file_store'  WHERE id='$id'";
    if ($conn->query($update) === true) {
      echo "<script>window.location = '../main/manage-employees.php';</script>";
    } else {
      echo "Lỗi";
    }
  }
}