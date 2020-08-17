<?php
    include ('db/db.php');
    if(isset($_POST['submit-contact'])) {
        $date = date('Y-m-d h:i:s');
        $ins_sql = "INSERT INTO comments (name, email, subject, comment, date) 
                    VALUES ('$_POST[name]', '$_POST[email]', '$_POST[subject]', '$_POST[comment]', '$date')";
        $run_sql = mysqli_query($conn, $ins_sql);
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
        <div class="row">
            <section class="col-lg-8">
                <div class="contact-heading">
                    <h1>Contact Us</h1>
                </div>
                <div class="contact-list">
                    <form action="contact.php" method="POST">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" name="email" placeholder="mail@example.com" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Subject</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Comment</label>
                            <div class="col-sm-7">
                                <textarea class="form-control" rows="5" name="comment" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-7">
                                <button type="submit" name="submit-contact" class="btn btn-block btn-sm btn-danger">Submit</button>
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