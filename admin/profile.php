<?php session_start();
    include('../db/db.php');
    if(isset($_SESSION['email']) && isset($_SESSION['password'])) {
        $sel_sql = "SELECT * FROM users WHERE email = '$_SESSION[email]' AND password = '$_SESSION[password]'";
        if($run_sql = mysqli_query($conn, $sel_sql)) {
            while($rows = mysqli_fetch_assoc($run_sql)) {
                $name = $rows['name'];
                $email = $rows['email'];
                $gender = $rows['gender'];
                $religion = $rows['religion'];
                $job = $rows['job'];
                $handphone = $rows['handphone'];
                $off_website = $rows['off_website'];
                $address = $rows['address'];

                if(mysqli_num_rows($run_sql)) {
                    if ($rows['role'] == 'admin') {
                    } else {
                        header('Location:../index.php');
                    } 
                } else {
                    header('Location:../index.php');
                }
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
                        <h2>Profile</h2>
                    </div>
                    <div class="profile rounded">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="profil-detail">
                                    <div class="avatar">
                                        <img src="../images/Foto.jpg" class="rounded-circle">
                                    </div>
                                    <!-- <div class="list-user-posts">
                                        <h6>POST</h6>
                                        <p class="user-posts">Programming</p>
                                        <p class="user-posts">Perkembangan Esport di Indonesia</p>
                                        <p class="user-posts">Barcelona vs Bayern Munchen</p>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-lg-6 list-profile">
                                <h2><?php echo $name ?></h2>
                                <p><i class="fas fa-atom"></i><?php echo $job ?></p>
                                <p><i class="fas fa-map-marker"></i><?php echo $address ?></p>
                                <p><i class="fas fa-phone-alt"></i><?php echo $handphone ?></p>
                                <p><i class="fas fa-envelope"></i><?php echo $email ?></p>
                                <p><i class="fas fa-venus-mars"></i><?php echo $gender ?></p>
                                <p><i class="fas fa-praying-hands"></i><?php echo $religion ?></p>
                                <p><i class="fas fa-blog"></i><?php echo $off_website ?></p>
                            </div>
                        </div>

                        <div class="list-user-posts">
                            <div class="col-lg-10">
                                <table class="table table-sm text-white">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Category</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>1</th>
                                            <td>Evos Esport</td>
                                            <td>Perkembangan ESport di Indonesia</td>
                                        </tr>
                                        <tr>
                                            <th>1</th>
                                            <td>Evos Esport</td>
                                            <td>Perkembangan ESport di Indonesia</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>




</body>

</html>