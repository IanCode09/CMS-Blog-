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
    <script src="https://cdn.tiny.cloud/1/h1i76jy2racx4ng0s2uzu1ttn6t10cf1q1cmvqqd5wrlhfj4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
</head>

<body>
    <?php include('includes/header.php') ?>

    <div class="container-fluid dashboard">
        <div class="row">
            <?php include('includes/sidebar.php') ?>

            <div class="col-lg-9">
                <div class="content-dashboard">
                    <div class="page-header">
                        <h2>Tambah Post</h2>
                    </div>
                    <form action="new_post.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Category</label>
                            <select class="form-control" name="category" required>
                                <option value="Programming">Programming</option>
                                <option value="Esport">Esport</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select class="form-control" name="status" required>
                                <option value="Publish">Publish</option>
                                <option value="Draft">Draft</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Image</label>
                            <input type="file" class="form-control-file" name="image" required>
                        </div>

                        <button type="submit" name="submit_post" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>


            </div>
        </div>
    </div>




</body>

</html>