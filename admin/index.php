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
            <?php  include('includes/sidebar.php') ?>

            <div class="col-lg-9">
            
                <div class="content-dashboard">
                <?php echo $_SESSION['email'] ?>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card mb-3" style="max-width: 18rem;">
                                <div class="card-body text-white bg-info">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <i class="fas fa-signal" style="font-size:70px"></i>
                                        </div>
                                        <div class="col-md-9 text-right">
                                            <div style="font-size:30px">30</div>
                                            <h4>Posts</h4>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="card-footer bg-transparent border-success">
                                        <div class="float-left">View Posts</div>
                                        <div class="float-right">
                                            <i class="fas fa-arrow-circle-left"></i>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card mb-3" style="max-width: 18rem;">
                                <div class="card-body bg-success text-white">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <i class="fas fa-th-list" style="font-size:70px"></i>
                                        </div>
                                        <div class="col-md-9 text-right">
                                            <div style="font-size:30px">30</div>
                                            <h4>Posts</h4>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="card-footer bg-transparent border-success">
                                        <div class="float-left">View Categories</div>
                                        <div class="float-right">
                                            <i class="fas fa-arrow-circle-left"></i>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card mb-3" style="max-width: 18rem;">
                                <div class="card-body text-white bg-danger">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <i class="fas fa-users" style="font-size:70px"></i>
                                        </div>
                                        <div class="col-md-9 text-right">
                                            <div style="font-size:30px">30</div>
                                            <h4>Users</h4>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="card-footer bg-transparent border-success">
                                        <div class="float-left">View Posts</div>
                                        <div class="float-right">
                                            <i class="fas fa-arrow-circle-left"></i>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card  mb-3" style="max-width: 18rem;">
                                <div class="card-body bg-warning text-white">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <i class="fas fa-tasks" style="font-size:70px"></i>
                                        </div>
                                        <div class="col-md-9 text-right">
                                            <div style="font-size:30px">30</div>
                                            <h4>Posts</h4>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="card-footer bg-transparent border-success">
                                        <div class="float-left">View Comments</div>
                                        <div class="float-right">
                                            <i class="fas fa-arrow-circle-left"></i>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="users-dashboard">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card border-primary mb-3">
                                <div class="card-header text-white  bg-primary list-table-dashboard">
                                    <h4>Daftar User</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Role</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card border-primary bg-info text-white" style="width: 18rem;">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3>Ian Lombu</h3>
                                        </div>
                                        <div class="col-md-6">
                                            <img src="../images/Foto.jpg" class="rounded-circle" alt="..."
                                                width="100px">
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <table class="table table-sm text-white">
                                        <tbody>
                                            <tr>
                                                <td>Job</td>
                                                <td>Developer</td>
                                            </tr>
                                            <tr>
                                                <td>Role</td>
                                                <td>Admin</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>ian@gmail.com</td>
                                            </tr>
                                            <tr>
                                                <td>Kontak</td>
                                                <td>08121212</td>
                                            </tr>
                                            <tr>
                                                <td>Negara</td>
                                                <td>Indonesia</td>
                                            </tr>
                                        </tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card table-dashboard  border-primary">
                    <div class="card-header bg-primary text-white">
                        <h4>Latest Posts</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Author</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card table-dashboard  border-primary">
                    <div class="card-header bg-primary text-white">
                        <h4>Latest Comments</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Post</th>
                                    <th scope="col">Comments</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>