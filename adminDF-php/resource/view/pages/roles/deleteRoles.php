<?php
include '../../../../database/database.php';

if (isset($_POST['deleteRoles'])) {
    $id = $_POST['id_deleteRoles'];
    $sql1 = "SELECT * FROM roles WHERE id = '$id' ";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql1));
    $sql = "DELETE FROM roles WHERE id = '$id' ";
    if ($conn->query($sql) === TRUE) {
        header('Location: ../main/manage-roles.php');
    } else {
        echo '("Delete not succesfully")' . $conn->error;
    }
}
