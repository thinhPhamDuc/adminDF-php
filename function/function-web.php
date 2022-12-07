<?php
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function getBrandName($brand_id)
{
  include '../../../database/database.php';
  
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
function productBrandTree()
{
  include '../../../database/database.php';
  $sql = "SELECT * FROM sizes";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
    }
  }
}
function productCategoryTree($parent_id = 0, $sub_mark = "")
{
  include '../../../database/database.php';
  $sql = "SELECT * FROM product_categories WHERE parent_id = $parent_id ORDER BY name ASC";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      // echo '<li><a href="shop.php">' . $sub_mark . $row['name'] . '<li>';
      // productCategoryTree($row['id'], $sub_mark . '--');
      echo '<li><a href="shop.php">' . $row['name'] . '</a>
      <ul class="mega-menu">
          <li><a href="shop.php">Hằng ngày</a>
              <ul class="sub-menu-2">
                  <li><a href="shop.php">áo khoác</a></li>
                  <li><a href="shop.php">áo len</a></li>
                  <li><a href="shop.php">áo nỉ chui đầu</a></li>
                  <li><a href="shop.php">áo sơ mi</a></li>
                  <li><a href="shop.php">áo phông</a></li>
                  <li><a href="shop.php">áo polo</a></li>
                  <li><a href="shop.php">quần jeans</a></li>
                  <li><a href="shop.php">quần vải</a></li>
                  <li><a href="shop.php">quần kaki</a></li>
                  <li><a href="shop.php">quần shorts</a></li>
              </ul>
          </li>
      </ul>
  </li> ';
    }
  }
}
function createTreeView($array, $currentParent, $currLevel = 0, $prevLevel = -1) {
  foreach ($array as $categoryId => $category) {
  if ($currentParent == $category['parent_id']) {                       
      if ($currLevel > $prevLevel) echo '
  <li>' ;
      if ($currLevel == $prevLevel) echo "  ";
      echo '<li> <a href="#">'.$category['name'].'</a>';
      if ($currLevel > $prevLevel) { $prevLevel = $currLevel; }
      $currLevel++; 
      createTreeView ($array, $categoryId, $currLevel, $prevLevel);
      $currLevel--;               
      }   
  }
  if ($currLevel == $prevLevel) echo "</li></li>";
  }    
