<?php
    include ('db/db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e678eab684.js" crossorigin="anonymous"></script>

</head>

<body>

    <?php include('include/header.php') ?>

    <div class="container blog">
        <div class="row">

        <?php
            if(isset($_GET['post_id'] )) {
                $sql = "SELECT * FROM posts WHERE id = '$_GET[post_id]'";
                $run_sql = mysqli_query($conn, $sql);
                while($rows = mysqli_fetch_assoc($run_sql)) {
                    echo '
                        <div class="col-lg-8">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="panel-header">
                                        <h4>'.$rows['title'].'</h4>
                                    </div>
                                    <img src="'.$rows['image'].'" width="90%">
                                    <p>'.$rows['description'].'</p>
                                </div>
                            </div>
                        </div>
                    ';
                }
            }
        ?>
            

        <?php include('include/sidebar.php') ?>
        
        </div>
    </div>

    <?php include('include/footer.php') ?>

</body>

</html>