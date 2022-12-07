<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "defaultlearning_admindf_php_1";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}