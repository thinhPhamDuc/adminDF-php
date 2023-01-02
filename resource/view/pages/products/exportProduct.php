<?php
include '../../../../database/database.php';
include '../../../../function/function.php';

// Fetch records from database 
$query = $conn->query("SELECT * FROM products ORDER BY id DESC"); 
 
if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "products-data_" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('SKU', 'images', 'price', 'seller_id','Status'); 
    // 'name', 'description',
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
        $status = ($row['status'] == 1)?'Active':'Inactive'; 
        $us = getSellerName($row['seller_id']);

        $lineData = array($row['slug'], $row['images'], $row['price'], $us['lastname'], $status); 
        // $row['name'], $row['description'],
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header("Content-Type: application/vnd.ms-excel; charset=utf-8");
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 

