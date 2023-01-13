<?php
include '../../../../database/database.php';
include '../../../../function/function.php';

if (isset($_POST['addNew'])) {
  $title = $_POST['title_addNew'];
  $description = $_POST['description_addNew'];
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  $time = date('Y-m-d H:i:s');
  $file_store = uploadImages('../../../../public/backend/assets/images/new/', '../main/manage-news.php');
  // Upload mutiple images
//   $file_store_mutiple = uploadMutipleImages('../../../../public/backend/assets/images/new/', '../main/manage-news.php');
  // End upload mutiple images
  if ($title !== "" && $description !== "") {
    $sql = "INSERT INTO new (title, description, images,created_at,updated_at,deleted_at) VALUES ('$title', '$description', '$file_store', '$time', '$time',null)";
    
    if ($conn->query($sql) === TRUE) {
      $sql = "SELECT * FROM new ORDER BY id DESC LIMIT 1";
      $last_id = $conn->insert_id;
      $news = $conn->query($sql);
      $news = $news->fetch_array();
      $new_id = $news['id'];
      $tags = $_POST['tags'];
      if (!empty($tags)) {
        foreach ($tags as $tag_id) {
          $sql = "INSERT INTO link_new_tag (new_id, tag_id) VALUES ('$new_id', '$tag_id')";
          if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Insert Success'); window.location='../main/manage-news.php';</script>";
          }
        }
      }
    } else {
      echo "Error : " . $sql . "<br>" . $conn->error;
    }
  } else {
    echo "<script>alert('Please Enter Information'); window.location='../main/manage-news.php';</script>";
  }
}
