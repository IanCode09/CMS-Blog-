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
    $error = '';
    if(isset($_POST['submit_post'])) {
        $title = strip_tags($_POST['title']);
        $category = strip_tags($_POST['category']);
        $description = strip_tags($_POST['description']);
        $status = strip_tags($_POST['status']);
        $date = date("Y-m-d H:i:s");
        if($_FILES['image'] ['name'] != '') {
            $image_name = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            $image_size = $_FILES['image']['size'];
            $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
            $image_path = '../images/'.$image_name;
            $image_db_path = 'images/'.$image_name;
            
            if($image_size < 1000000) {
                if($image_ext == 'JPG' || $image_ext == 'png' || $image_ext == 'gif'){
                    if(move_uploaded_file($image_tmp, $image_path)) {
                        $ins_sql = "INSERT INTO posts (title, description, image, category, date, author)
                                    VALUES ('$title','$description','$image_db_path','$category','$date','$_SESSION[email]')";
                        if(mysqli_query($conn, $ins_sql)) {
                            header('post_list.php');
                        } else {
                            $error = '<div class="alert alert-danger">The Query Was not working</div>';
                        }
                    } else {
                        $error = '<div class="alert alert-danger">Sorry, Unfortunately Image has not been uploaded!</div>';
                    }
                } else {
                    $error = '<div class="alert alert-danger">Image format was not correct!</div>';
                }
            } else {
                $error = '<div class="alert alert-danger">Image file size is much bigger than Expect!</div>';
            }
        } else {
            $ins_sql = "INSERT INTO posts (title, description, category, date, author)
                        VALUES ('$title','$description','$category','$date','$_SESSION[email]')";
            if(mysqli_query($conn, $ins_sql)) {
                header('post_list.php');
            } else {
                $error = '<div class="alert alert-danger">The Query Was not working</div>';
            }
        }
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
    <script src="https://cdn.tiny.cloud/1/h1i76jy2racx4ng0s2uzu1ttn6t10cf1q1cmvqqd5wrlhfj4/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea'
        });
    </script>
</head>

<body>
    <?php include('includes/header.php') ?>

    <div class="container-fluid dashboard">
        <div class="row">
            
            <?php include('includes/sidebar.php') ?>

            <div class="col-lg-9">
                <div class="content-dashboard">
                <?php echo $error ?>
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
                                <option value="">--Pilih Kategori</option>
                                <?php 
                                    $sel_cat = "SELECT * FROM category";
                                    $run_sel = mysqli_query($conn, $sel_cat);
                                    while($rows = mysqli_fetch_assoc($run_sel)) {
                                        echo '
                                            <option value="'.$rows['category_name'].'">'.$rows['category_name'].'</option>
                                        ';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="17"></textarea>
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
                            <input type="file" class="form-control-file" name="image">
                        </div>

                        <button type="submit" name="submit_post" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>


            </div>
        </div>
    </div>




</body>

</html>