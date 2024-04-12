<?php
include '../connection.php';
session_start();
if (isset($_POST['deleteAll'])) {
    $deleteAll = "TRUNCATE TABLE notes;";
    $result = mysqli_query($conn, $deleteAll);
    $_SESSION['delete'] = 'TASK DELETED';
    header('location:../index.php');
}

?>