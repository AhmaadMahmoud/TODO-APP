<?php

include '../connection.php';
session_start();
$id = $_GET['id'];
if (isset($id)) {
    $delete = "DELETE FROM notes WHERE id = $id";
    $result = mysqli_query($conn, $delete);
    $_SESSION['delete'] = 'TASK DELETED';
    header('location:../index.php');
}


?>