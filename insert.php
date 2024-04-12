<?php
include '../connection.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim(filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING));
    $title = $_POST['title'];
    if(!empty($title)){
        if(strlen($title) > 3){
            $insert = "INSERT INTO `notes` (`title`) VALUES ('$title')";
            $result = mysqli_query($conn, $insert);
            $_SESSION['insert'] = 'TASK INSERTED';
            header('location:../index.php');
        }else{
            $_SESSION['error'] = 'Must Be Charchter above 5 letters !!';
            header('location:../index.php');
        }
    }else{
        $_SESSION['error'] = 'There Is No Tasks';
        header('location:../index.php');
    }
}

?>