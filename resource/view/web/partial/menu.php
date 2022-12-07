<?php
// $parentMenus = \App\Menu::where('parent_id', 0)->orderBy('order_number')->get();
$sql = "SELECT * FROM product_categories where parent_id = 0";
$categories = $conn->query($sql);
if ($categories->num_rows > 0) {
    while ($rows = $categories->fetch_all()) {  
        foreach($rows as $row){
?>
        <li><a href="#"><?php echo $row[1]; ?></a>
            <?php
            $sql1 = "SELECT * FROM product_categories where parent_id = " . $row[0];
            $childcategories = $conn->query($sql1);
            if ($childcategories->num_rows > 0) {
                while ($rows1 = $childcategories->fetch_all()) {
                    foreach($rows1 as $row1){
            ?>
            <ul class="mega-menu">
                <li>
                    <ul class="sub-menu-2">
                        <li><a href="#"><?php echo $row1[1]; ?></a>
                        </li>
                    </ul>
                </li>
            </ul>
                        <?php
                    }
                }
            }
            ?>
        </li>
<?php
        }
    }
}
?>