<?php
include '../../../../database/database.php';
include '../../../../function/function.php';
if (isset($_POST['editRoles'])) {
    $id= $_POST['id_editRoles'];
    $name = $_POST['name_editRoles'];
    $code = $_POST['name_editRoles'];
    $slug = createSlug($code);
    if ($name === "") {
        echo "<script>alert('Không được để rỗng!'); window.location = '../main/manage-roles.php';</script>";
    } else {
        $sql = "UPDATE roles SET name = '$name' , code = '$slug' WHERE id = '$id' ";
        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location = '../main/manage-roles.php';</script>";
        } else {
            echo "Error";
        }
    }
}
