<?php
include '../../../../database/database.php';
include '../../../../function/function.php';


//chưa chỉnh sửa
if (isset($_POST['editProduct'])) {
  $id = $_POST['id_editProduct'];
  $name = $_POST['name_editProduct'];
  $description = $_POST['description_editProduct'];
  $category = $_POST['category_editProduct'];
  $price = $_POST['price_editProduct'];
  $file_store = editImages('../../../../public/backend/assets/images/product/', '../main/manage-products.php', 'products', $id);
  $product_slug = createSlug($name);
  // $file = editMutipleImages('../../../../public/backend/assets/images/product/', '../main/manage-products.php', 'product_images', $id);
  // $file_store_mutiple_array = rtrim($file, ",");
  // $array_mutiple_upload = explode(",", $file_store_mutiple_array);
  // $sqlUnlinkProductImages = "SELECT * FROM product_images WHERE product_id = '$id' ";
  // $fetchUnlinkProductImages = mysqli_fetch_all(mysqli_query($conn, $sqlUnlinkProductImages));
  // foreach ($fetchUnlinkProductImages as $key => $fetchUnlink) {
  //   unlink($fetchUnlink[2]);
  // }
  if ($name !== "" || $price !== "" || $category !== "") {
    $sql = "UPDATE products SET name = '$name', description = '$description', category_id = '$category', price = '$price', images = '$file_store' , slug = '$product_slug' WHERE id = '$id' ";
    $sql1 = "UPDATE inventory SET name = '$name', images = '$file_store',price = '$price'   WHERE product_id = '$id' ";
    // $sql2 = "DELETE FROM product_images where product_id = '$id' ";
    if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE) {
      $tags = $_POST["tags"];
      // upload mutiple images 
      // if (!empty($array_mutiple_upload)) {
      //   foreach ($array_mutiple_upload as $uploadMutipleImage) {
      //     $sql = "INSERT INTO product_images (product_id, images) VALUES ('$id', '$uploadMutipleImage')";
      //     $conn->query($sql);
      //   }
      // }
      // end upload images
      if (!empty($tags)) {
        $sql = "SELECT * FROM link_product_tag WHERE product_id = " . $id;
        $result = $conn->query($sql);
        $tag_select = [];
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $tag_select[$row['tag_id']] = $row['tag_id'];
          }
        }
        foreach ($tags as $tag_id) {
          $sql = "SELECT * FROM link_product_tag WHERE product_id = " . $id . " AND tag_id = " . $tag_id;
          $result = $conn->query($sql);
          if ($result->num_rows === 0) {
            $sql = "INSERT INTO link_product_tag (product_id, tag_id) VALUES ('$id', '$tag_id')";
            $conn->query($sql);
          }
          unset($tag_select[$tag_id]);
        }
        if (!empty($tag_select)) {
          $sql = "DELETE FROM link_product_tag WHERE product_id = " . $id . " AND tag_id in (";
          $arr = [];
          foreach ($tag_select as $v) {
            $arr[] = $v;
          }
          foreach ($arr as $k => $tag_id) {
            if ($k === 0) {
              $sql .= $tag_id;
            } else {
              $sql .= ',' . $tag_id;
            }
          }
          $sql .= ')';
          $conn->query($sql);
        }
      } else {
        $sql = "DELETE FROM link_product_tag WHERE product_id = " . $id;
        $conn->query($sql);
      }
      echo "<script >alert('Data Updated'); window.location='../main/manage-products.php'</script>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
  } else {
    echo "<script>alert('Không được để rỗng!'); window.location = '../main/manage-products.php';</script>";
  }
}
