<?php session_start();
    include('../db/db.php');
    if(isset($_POST['submit_login'])) {
        if(!empty($_POST['email']) && !empty($_POST['password'])) {
            $get_email = mysqli_real_escape_string($conn, $_POST['email']);
            $get_password = mysqli_real_escape_string($conn, $_POST['password']);
            $sql = "SELECT * FROM users WHERE email = '$get_email' AND password = '$get_password'";
            if($result = mysqli_query($conn, $sql)) {
                while($rows = mysqli_fetch_assoc($result)) {
                    if(mysqli_num_rows($result)) {
                        $_SESSION['email'] = $get_email;
                        $_SESSION['password'] = $get_password;
                        $_SESSION['role'] = $rows['role'];
                        header('Location:../admin/index.php');
                        
                    } else {
                        header('Location:../index.php?login_error=wrong');
                    }
                }
            } else {
                header('Location:../index.php?login_error=query_error');
            }
        } else {
            header('Location:../index.php?login_error=empty');
        }
    } else {}


?>