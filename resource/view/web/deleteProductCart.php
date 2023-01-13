<?php
session_start();

include '../../../database/database.php';
include '../../../function/function-web.php';

if ($_SESSION['cart'] && count($_SESSION['cart'])>0){
    $idProductDelete = $_GET['id'];
    unset($_SESSION['cart'][$idProductDelete]);
    header('Location: cart-new.php');
}
