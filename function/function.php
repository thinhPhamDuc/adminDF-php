<?php
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function getSellerName($seller_id)
{
  include '../../../../database/database.php';
  $sql = "SELECT * FROM users WHERE id = " . $seller_id;
  $sellers = $conn->query($sql);

  if (is_object($sellers)) {
    if ($sellers->num_rows > 0) {
      $seller = $sellers->fetch_array();
      return $seller;
    }
  }
  return false;
}
function getBrandName($brand_id)
{
  include '../../../../database/database.php';
  
  $sql = "SELECT * FROM brand WHERE id = " . $brand_id;
  $brands = $conn->query($sql);

  if (is_object($brands)) {
    if ($brands->num_rows > 0) {
      $brand = $brands->fetch_array();
      return $brand;
    }
  }
  return false;
}
function getClientName($client_id)
{
  include '../../../../database/database.php';
  
  $sql = "SELECT * FROM client WHERE id = " . $client_id;
  $clients = $conn->query($sql);

  if (is_object($clients)) {
    if ($clients->num_rows > 0) {
      $client = $clients->fetch_array();
      return $client;
    }
  }
  return false;
}
function editImages($folder, $location, $table, $id)
{
  include '../../../../database/database.php';
  $file_name = uniqid() . "." . pathinfo($_FILES['fileProduct']['name'], PATHINFO_EXTENSION);
  $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
  $file_size = $_FILES['fileProduct']['size'];
  $file_tem_loc = $_FILES['fileProduct']['tmp_name'];
  $file_store = $folder . $file_name;
  $uploadOk = 1;

  if (!is_uploaded_file($file_tem_loc)) {
    $query = mysqli_query($conn, "SELECT images FROM $table where id='$id'");
    $row = $query->fetch_assoc();
    $file_store = $row['images'];
  } else {
    if (($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
      && $file_type != "gif" && $file_type != "webp")) {
      echo "<script>alert('Xin lỗi, chỉ chấp nhận JPG, JPEG, PNG & GIF.'); window.location = $location;</script>";
      $uploadOk = 0;
    }
    if ($file_size > 500000000) {
      echo "<script>alert('Xin lỗi, ảnh của bạn quá lớn.'); window.location = $location;</script>";
      $uploadOk = 0;
    }
    if ($uploadOk !== 0) {
      $sql1 = "SELECT * FROM $table WHERE id = '$id'";
      $row = mysqli_fetch_assoc(mysqli_query($conn, $sql1));
      if ($row['images']) {
        unlink($row['images']);
      }
      move_uploaded_file($file_tem_loc, $file_store);
    }
  }
  return $file_store;
}
function editMutipleImages($folder, $location, $table, $id)
{
  include '../../../../database/database.php';
  $file_store1 = '';

  foreach ($_FILES['files']['tmp_name'] as $key => $value) {
    $file_name = uniqid() . "." . pathinfo($_FILES['files']['name'][$key], PATHINFO_EXTENSION);
    $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $file_size = $_FILES['files']['size'][$key];
    $file_tem_loc = $_FILES['files']['tmp_name'][$key];
    $file_store = $folder . $file_name;
    $file_store1 .= $folder . $file_name . ',';
    $uploadOk = 1;

    if (!is_uploaded_file($file_tem_loc)) {
      $query = mysqli_query($conn, "SELECT images FROM $table where id='$id'");
      $row = $query->fetch_assoc();
      $file_store = $row['images'];
    } else {
      if (($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
        && $file_type != "gif" && $file_type != "webp")) {
        echo "<script>alert('Xin lỗi, chỉ chấp nhận JPG, JPEG, PNG & GIF.'); window.location = $location;</script>";
        $uploadOk = 0;
      }
      if ($file_size > 500000000) {
        echo "<script>alert('Xin lỗi, ảnh của bạn quá lớn.'); window.location = $location;</script>";
        $uploadOk = 0;
      }
      if ($uploadOk !== 0) {
        $sql1 = "SELECT * FROM $table WHERE id = '$id'";
        $row = mysqli_fetch_assoc(mysqli_query($conn, $sql1));
        if (isset($row['images'])) {
          unlink($row['images']);
        }
        move_uploaded_file($file_tem_loc, $file_store);
      }
    }
  }
  return $file_store1;
}
function getProductCategory($category_id)
{
  include '../../../../database/database.php';
  $sql = "SELECT * FROM product_categories WHERE id = " . $category_id;
  $categories = $conn->query($sql);

  if (is_object($categories)) {
    if ($categories->num_rows > 0) {
      $category = $categories->fetch_array();
      return $category;
    }
  }
  return false;
}
function getProductTags($product_id)
{
  include '../../../../database/database.php';
  $sql = "SELECT product_tag.id, product_tag.name FROM product_tag INNER JOIN link_product_tag ON link_product_tag.tag_id = product_tag.id INNER JOIN products ON link_product_tag.product_id = products.id WHERE products.id = " . $product_id;
  $result = $conn->query($sql);

  $tags = [];
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $tags[] = $row;
    }
  }
  return $tags;
}
function getNewTags($new_id)
{
  include '../../../../database/database.php';
  $sql = "SELECT new_tag.id, new_tag.name FROM new_tag INNER JOIN link_new_tag ON link_new_tag.tag_id = new_tag.id INNER JOIN new ON link_new_tag.new_id = new.id WHERE new.id = " . $new_id;
  $result = $conn->query($sql);

  $tags = [];
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $tags[] = $row;
    }
  }
  return $tags;
}
function productCategoryTree($parent_id = 0, $sub_mark = "")
{
  include '../../../../database/database.php';
  $sql = "SELECT * FROM product_categories WHERE parent_id = $parent_id ORDER BY name ASC";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo '<option value="' . $row['id'] . '">' . $sub_mark . $row['name'] . '</option>';
      productCategoryTree($row['id'], $sub_mark . '--');
    }
  }
}
function productBrandTree($sub_mark = "---")
{
  include '../../../../database/database.php';
  $sql = "SELECT * FROM brand";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
    }
  }
}
function productInventory($sub_mark = "----")
{
  include '../../../../database/database.php';
  $sql = "SELECT * FROM products";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo '<option value="' . $row['id'] . $sub_mark . $row['name'] . $sub_mark . $row['images'] .'">' . $row['name'] . $sub_mark . $row['images'] .'</option>';
    }
  }
}
function uploadImages($folder, $location)
{

  $file_name = uniqid() . "." . pathinfo($_FILES['fileProduct']['name'], PATHINFO_EXTENSION);
  $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
  $file_size = $_FILES['fileProduct']['size'];
  $file_tem_loc = $_FILES['fileProduct']['tmp_name'];
  $file_store = $folder . $file_name;
  $uploadOk = 1;

  if (!is_uploaded_file($file_tem_loc)) {
    $file_store = null;
  } else {
    if (($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
      && $file_type != "gif")) {
      echo "<script>alert('Xin lỗi, chỉ chấp nhận JPG, JPEG, PNG & GIF.'); window.location = $location;</script>";
      $uploadOk = 0;
    }
    if ($file_size > 50000000) {
      echo "<script>alert('Xin lỗi, ảnh của bạn quá lớn.'); window.location = $location;</script>";
      $uploadOk = 0;
    }
    if ($uploadOk !== 0) {
      move_uploaded_file($file_tem_loc, $file_store);
    }
  }
  return $file_store;
}

function uploadMutipleImages($folder, $location)
{
  $file_store1 = '';
  foreach ($_FILES['files']['tmp_name'] as $key => $value) {
    $file_name = uniqid() . "." . pathinfo($_FILES['files']['name'][$key], PATHINFO_EXTENSION);
    $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $file_size = $_FILES['files']['size'][$key];
    $file_tem_loc = $_FILES['files']['tmp_name'][$key];
    $file_store = $folder . $file_name;
    $file_store1 .= $folder . $file_name . ',';
    $uploadOk = 1;

    if (!is_uploaded_file($file_tem_loc)) {
      $file_store = null;
    } else {
      if (($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
      && $file_type != "gif")) {
        echo "<script>alert('Xin lỗi, chỉ chấp nhận JPG, JPEG, PNG & GIF.'); window.location = $location;</script>";
        $uploadOk = 0;
      }
      if ($file_size > 50000000) {
        echo "<script>alert('Xin lỗi, ảnh của bạn quá lớn.'); window.location = $location;</script>";
        $uploadOk = 0;
      }
      if ($uploadOk !== 0) {
        move_uploaded_file($file_tem_loc, $file_store);
      }
    }
  }
  return $file_store1;
}
// function createSlug($string)
// {

//   $table = array(
//     'Š' => 'S', 'š' => 's', 'Đ' => 'Dj', 'đ' => 'dj', 'Ž' => 'Z', 'ž' => 'z', 'Č' => 'C', 'č' => 'c', 'Ć' => 'C', 'ć' => 'c',
//     'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E',
//     'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O',
//     'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss',
//     'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e',
//     'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o',
//     'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'ý' => 'y', 'þ' => 'b',
//     'ÿ' => 'y', 'Ŕ' => 'R', 'ŕ' => 'r', '/' => '-', ' ' => '-'
//   );

//   // -- Remove duplicated spaces
//   $stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $string);

//   // -- Returns the slug
//   return strtolower(strtr($string, $table));
// }
function createSlug($string)
{
  $search = array(
    '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
    '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
    '#(ì|í|ị|ỉ|ĩ)#',
    '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
    '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
    '#(ỳ|ý|ỵ|ỷ|ỹ)#',
    '#(đ)#',
    '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
    '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
    '#(Ì|Í|Ị|Ỉ|Ĩ)#',
    '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
    '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
    '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
    '#(Đ)#',
    "/[^a-zA-Z0-9\-\_]/",
  );
  $replace = array(
    'a',
    'e',
    'i',
    'o',
    'u',
    'y',
    'd',
    'A',
    'E',
    'I',
    'O',
    'U',
    'Y',
    'D',
    '-',
  );
  $string = preg_replace($search, $replace, $string);
  $string = preg_replace('/(-)+/', '-', $string);
  $string = strtolower($string);
  return $string;
}
function checkPer($user_id, $per_code)
{
  include '../../../../database/database.php';
  $sql = "SELECT link_role_permission.* FROM link_role_permission INNER JOIN permissions ON permissions.id = link_role_permission.permission_id INNER JOIN roles ON roles.id = link_role_permission.role_id INNER JOIN users ON users.role_id = roles.id WHERE users.id = '$user_id' && permissions.code = '$per_code' ";
  $result = $conn->query($sql);
  if (!$result) {
    return false;
  }
  if ($result->num_rows > 0) {
    return true;
  }
  return false;
}
