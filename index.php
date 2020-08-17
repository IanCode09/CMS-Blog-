<?php
    include ('db/db.php');
    $login_err = '';
    if(isset($_GET['login_error'])) {
        if($_GET['login_error'] == 'empty') {
            $login_err = '<div class="alert alert-danger">Username or Password was empty</div>';
        } elseif($_GET['login_error'] == 'wrong') {
            $login_err = '<div class="alert alert-danger">Username or Password was wrong</div>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e678eab684.js" crossorigin="anonymous"></script>

</head>

<body>

    <?php include('include/header.php') ?>

    
    <div class="container blog">
    <?php echo $login_err ?>
        <div class="row">
            <section class="col-lg-8">
                <?php
                    $sql = "SELECT * FROM posts";
                    $run_query = mysqli_query($conn, $sql);
                    while($rows = mysqli_fetch_assoc($run_query)) {
                        echo '
                            <div class="card card-success blog-list">
                                <div class="card-header">
                                    <h4 class="blog-title"><a href="post.php?post_id='.$rows['id'].'">'.$rows['title'].'</a></h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <img src="'.$rows['image'].'" width="100%">
                                        </div>
                                        <div class="col-lg-8">
                                            <p>'.substr($rows['description'],0,300).'......</p>  
                                            <a href="post.php?post_id='.$rows['id'].'" class="btn btn-sm btn-danger">Read More</a>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                ?>

            </section>

            <?php include('include/sidebar.php') ?>
            
        </div>
    </div>


    <?php include('include/footer.php') ?>


</body>

</html>