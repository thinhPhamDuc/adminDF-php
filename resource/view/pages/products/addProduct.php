<?php
include '../../../../database/database.php';
include '../../../../function/function.php';

if (isset($_POST['addProduct'])) {
  $name = $_POST['name_addProduct'];
  $description = $_POST['description_addProduct'];
  $price = $_POST['price_addProduct'];
  $category = $_POST['category_addProduct'];
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  $time = date('Y-m-d H:i:s');
  $seller_id = $_POST['user_addProduct'];
  $brand_id = $_POST['brand_addProduct'];
  $file_store = uploadImages('../../../../public/backend/assets/images/product/', '../main/manage-products.php');
  // Upload mutiple images
  $file_store_mutiple = uploadMutipleImages('../../../../public/backend/assets/images/product/', '../main/manage-products.php');
  $file_store_mutiple_array = rtrim($file_store_mutiple, ",");
  $array_mutiple_upload = explode(",",$file_store_mutiple_array);
  // End upload mutiple images
  if ($name !== "" && $description !== "" && $price !== "" && $category !== "") {
    $sql = "INSERT INTO products (name, description, category_id, price, images,created_at,seller_id,brand_id) VALUES ('$name', '$description', '$category', '$price', '$file_store','$time','$seller_id','$brand_id')";
    
    if ($conn->query($sql) === TRUE) {
      $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 1";
      $last_id = $conn->insert_id;
      $products = $conn->query($sql);
      $products = $products->fetch_array();
      $product_id = $products['id'];
      $tags = $_POST['tags'];
      if (!empty($tags)) {
        foreach ($tags as $tag_id) {
          $sql = "INSERT INTO link_product_tag (product_id, tag_id) VALUES ('$product_id', '$tag_id')";
          $conn->query($sql);
        }
      }
      if (!empty($array_mutiple_upload)) {
        foreach ($array_mutiple_upload as $uploadMutipleImage) {
          $sql = "INSERT INTO product_images (product_id, images) VALUES ('$product_id', '$uploadMutipleImage')";
          $conn->query($sql);
        }
      }
      $sql1 = "INSERT INTO inventory (name,product_id, images,stock,created_at,price) VALUES ('$name','$last_id' ,'$file_store',0,'$time','$price')";

      if ($conn->query($sql1) === TRUE) {
        echo "<script>alert('Insert Success'); window.location='../main/manage-products.php';</script>";
      }
    } else {
      echo "Error : " . $sql . "<br>" . $conn->error;
    }
  } else {
    echo "<script>alert('Please Enter Information'); window.location='../main/manage-products.php';</script>";
  }
}
