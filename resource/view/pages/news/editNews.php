<?php
include '../../../../database/database.php';
include '../../../../function/function.php';


//chưa chỉnh sửa
if (isset($_POST['editNew'])) {
  $id = $_POST['id_editNew'];
  $title = $_POST['title_editNew'];
  $description = $_POST['description_editNew'];
  $file_store = editImages('../../../../public/backend/assets/images/new/', '../main/manage-news.php', 'new', $id);
  if ($title !== "" || $description !== "" ) {
    $sql = "UPDATE new SET title = '$title', description = '$description', images = '$file_store' WHERE id = '$id' ";
    if ($conn->query($sql) === TRUE) {
      $tags = $_POST["tags"];

      if (!empty($tags)) {
        $sql = "SELECT * FROM link_new_tag WHERE new_id = " . $id;
        $result = $conn->query($sql);
        $tag_select = [];
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $tag_select[$row['tag_id']] = $row['tag_id'];
          }
        }
        foreach ($tags as $tag_id) {
          $sql = "SELECT * FROM link_new_tag WHERE new_id = " . $id . " AND tag_id = " . $tag_id;
          $result = $conn->query($sql);
          if ($result->num_rows === 0) {
            $sql = "INSERT INTO link_new_tag (new_id, tag_id) VALUES ('$id', '$tag_id')";
            $conn->query($sql);
          }
          unset($tag_select[$tag_id]);
        }
        if (!empty($tag_select)) {
          $sql = "DELETE FROM link_new_tag WHERE new_id = " . $id . " AND tag_id in (";
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
        $sql = "DELETE FROM link_new_tag WHERE new_id = " . $id;
        $conn->query($sql);
      }
      echo "<script >alert('Data Updated'); window.location='../main/manage-news.php'</script>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
  } else {
    echo "<script>alert('Không được để rỗng!'); window.location = '../main/manage-news.php';</script>";
  }
}
