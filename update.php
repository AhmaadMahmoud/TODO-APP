<?php
include '../connection.php';
session_start();
$id = $_GET['id'];
if (isset($id)) {
    $select = "SELECT * FROM notes WHERE id = $id";
    $result = mysqli_query($conn, $select);
}


if (isset($_POST['send'])) {
    $title = $_POST['title'];
    $id = $_GET['id'];
    $sql = "UPDATE `notes` SET `title`= '$title' WHERE `id` = $id ";
    $result = mysqli_query($conn, $sql);
    $_SESSION['update'] = 'TASK UPDATED';
    header("location:../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Update</title>
</head>

<body>

    <?php
    while ($row = mysqli_fetch_assoc($result)):
        ?>
        <div class="container">
            <h1 class='text-center'>Update</h1>
            <form action="" method="POST" class="form border p-2 my-5">
                <input type="text" name="title" class="form-control my-3 border border-success"
                    value="<?php echo $row['title'] ?>">
                <input type="submit" name="send" value="Update" class="form-control btn btn btn-warning my-3 "
                    placeholder="Update The Task">
            </form>
        </div>
    <?php endwhile ?>

</body>

</html>