<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include '../../../../database/database.php';
include '../../../../function/function.php';

if (isset($_POST['addNewTag'])) {
    $name = test_input($_POST['name_addNewTag']);
    print_r($name);
    if ($name === "") {
        echo "<script>alert('Không được để rỗng!'); window.location = '../main/manage-newsTag.php';</script>";
      } else {
        $sql = "INSERT INTO new_tag (name) VALUES ('$name')";
        print_r($sql);
        if ($conn->query($sql) === TRUE) {
          echo "<script>window.location = '../main/manage-newsTag.php';</script>";
        } else {
          echo "<script>alert('Lỗi!')</script>";
        }
      }
}