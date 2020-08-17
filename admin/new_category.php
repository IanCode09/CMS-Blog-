<?php session_start();
    include('../db/db.php');
    if(isset($_SESSION['email']) && isset($_SESSION['password'])) {
        $sel_sql = "SELECT * FROM users WHERE email = '$_SESSION[email]' AND password = '$_SESSION[password]'";
        if($run_sql = mysqli_query($conn, $sel_sql)) {
            if(mysqli_num_rows($run_sql)) {

            } else {
                header('Location:../index.php');
            }
        }
    } else {
        header('Location:../index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e678eab684.js" crossorigin="anonymous"></script>
    
</head>

<body>
    <?php include('includes/header.php') ?>

    <div class="container-fluid dashboard">
        <div class="row">
            <?php include('includes/sidebar.php') ?>

            <div class="col-lg-4">
                <div class="content-dashboard">
                    <div class="page-header">
                        <h2>Tambah Category</h2>
                    </div>
                    <form action="new_category.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>

                        <button type="submit" name="submit_category" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>


            </div>
        </div>
    </div>




</body>

</html>