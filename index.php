<?php
include 'connection.php';
session_start();

// echo $_SESSION['insert'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>TODO APP</title>
</head>

<body>


    <?php

    $select = "SELECT * FROM `notes`";
    $result = mysqli_query($conn, $select);


    ?>


    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <form action="handlers/insert.php" method="POST" class="form  p-2 my-5">
                    <h1 class="text-center mb-5">TODO APP</h1>
                    <?php
                    if (isset($_SESSION['insert'])):
                        ?>
                        <div class="alert alert-success text-center" role="alert">
                            <?php echo $_SESSION['insert'];
                            unset($_SESSION['insert']) ?>
                        </div>
                    <?php endif ?>
                    <?php
                    if (isset($_SESSION['delete'])):
                        ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <?php echo $_SESSION['delete'];
                            unset($_SESSION['delete']) ?>
                        </div>
                    <?php endif ?>
                    <?php

                    if (isset($_SESSION['error'])):
                        ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <?php echo $_SESSION['error'];
                            unset($_SESSION['error']) ?>
                        </div>
                    <?php endif ?>
                    <?php
                    if (isset($_SESSION['update'])):
                        ?>
                        <div class="alert alert-warning text-center" role="alert">
                            <?php echo $_SESSION['update'];
                            unset($_SESSION['update']) ?>
                        </div>
                    <?php endif ?>
                    <input type="text" name="title" class="form-control my-3 border border-success"
                        placeholder="Add New Task">
                    <input type="submit" name="send" value="Add" class="form-control btn btn-primary my-3 "
                        placeholder="add new todo">
                </form>
                <form action="handlers/deleteAll.php" method="POST">
                    <input type="submit" name="deleteAll" value="Delete All" class="form-control btn btn-danger my-3 "
                        placeholder="add new todo">
                </form>
            </div>
            <div class="col-12">
                <table class="table table-bordered rounded ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Task</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td>
                                    <?php echo $row['id'] ?>
                                </td>
                                <td>
                                    <?php echo $row['title'] ?>
                                </td>

                                <td>
                                    <a href="handlers/delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger"><i
                                            class="fa-solid fa-trash-can"></i></a>
                                    <a href="handlers/update.php?id=<?php echo $row['id'] ?>" class="btn btn-info"><i
                                            class="fa-solid fa-edit"></i></a>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="script.js"></script>
</body>

</html>