<?php
include '../../../../database/database.php';
include '../../../../function/function.php';

$id = $_POST['userId_pro'];
if (isset($_POST['editUser'])) {
  $firstname = $_POST['firstname_pro'];
  $lastname = $_POST['lastname_pro'];
  $email = $_POST['email_pro'];
  $phone = $_POST['phone_pro'];
  $address = $_POST['address_pro'];
  $file_store = editImages('../../../../public/backend/assets/images/user/', '../auth/profile.php', 'users', $id);

  if ($firstname === "" || $lastname === "" || $email === "" || $phone === ""|| $address === "") {
    echo "<script>alert('Không thể để rỗng.'); window.location = '../auth/profile.php';</script>";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Email không đúng định dạng.'); window.location = '../auth/profile.php';</script>";
  } else {
    $update = "UPDATE users SET firstname='$firstname', lastname ='$lastname', email ='$email', images ='$file_store'  WHERE id='$id'";
    if ($conn->query($update) === true) {
      echo "<script>window.location = '../auth/profile.php';</script>";
    } else {
      echo "Lỗi";
    }
  }
}