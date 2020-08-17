<?php
    include ('db/db.php');
    $match = '';
    if(isset($_POST['submit-regist'])) {

        if($_POST['password'] == $_POST['con_password']) {
            $date = date('Y-m-d h:i:s');
            $ins_sql = "INSERT INTO users (role, name, email, password, gender, religion, handphone, off_website, address, regist_at) 
                        VALUES ('subscriber', '$_POST[name]', '$_POST[email]', '$_POST[password]', '$_POST[jenis_kelamin]', '$_POST[agama]', '$_POST[handphone]', '$_POST[off_website]', '$_POST[alamat]', '$date')";
            $run_sql = mysqli_query($conn, $ins_sql);
        } else {
            $match = '<div class="alert alert-danger">Password doesn&apos;t match!!</div>';
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

    <?php 
        include('include/header.php') 
    ?>
    

    <div class="container blog">
        <div class="row">
            <section class="col-lg-8">
                <div class="regist-heading">
                    <h1>Form Registrasi</h1>
                </div>
                <?php echo $match ?>
                <div class="contact-list">
                    <form action="registration.php" method="POST">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" name="email" placeholder="mail@example.com"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" name="password" placeholder="Password"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Confirm Password</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" name="con_password"
                                    placeholder="Confirm Password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-3">
                                <select class=" form-control" name="jenis_kelamin" required>
                                    <option value="">---</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <label class="col-sm-1 col-form-label">Agama</label>
                            <div class="col-sm-3">
                                <select class=" form-control" name="agama" required>
                                    <option value="">---</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pekerjaan</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nomor Handphone</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="handphone" placeholder="Nomor Handphone"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Official Website</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="off_website"
                                    placeholder="Official Website">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-7">
                                <button type="submit" name="submit-regist" class="btn btn-block btn-sm btn-danger">SIGN
                                    UP</button>
                            </div>
                        </div>
                    </form>
                </div>

            </section>

            <?php include('include/sidebar.php') ?>

        </div>
    </div>

    <?php include('include/footer.php') ?>


</body>

</html>