<aside class="col-lg-4">
    <form class="panel-group form-horizontal search-blog" action="search.php" role="form">
        <div class="panel panel-default">
            <div class="panel-heading"></div>
            <div class="panel-body">
                <div class="panel-header">
                    <h5>DunklerBlog</h5>
                </div>
                <div class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="Search ...">
                    <div class="input-group-btn">
                        <button class="btn btn-danger" type="submit" name="search-submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form class="panel-group form-horizontal login-blog" role="form" action="accounts/login.php" method="POST">
        <div class="panel panel-default">
            <strong>
                <div class="panel-heading text-center">LOGIN</div>
            </strong>
            <div class="panel-body">
                <div class="form-group">
                    <label for="username" class="control-label col-sm-4">Username</label>
                    <div class="col-sm-12">
                        <input type="email" placeholder="example@mail.com" class="form-control" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="control-label col-sm-4">Password</label>
                    <div class="col-sm-12">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="submit" name="submit_login" class="btn btn-success btn-block">
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="category">

        <h5 class="category-header">Kategori</h5>

        <?php
            $sql_category = "SELECT * FROM category";
            $run_category = mysqli_query($conn, $sql_category);
            while($cat_rows = mysqli_fetch_assoc($run_category)) {
                echo '
                    <a href="menu.php?cat_name='.$cat_rows['category_name'].'"><p>'.ucfirst($cat_rows['category_name']).'</p></a>
                ';
            }
        ?>

    </div>

    <div class="list-group">
        <div class="list-group-item ">
            <div class="row">
                <?php
                    $sel_side = "SELECT * FROM posts";
                    $run_side = mysqli_query($conn, $sel_side);
                    while($rows = mysqli_fetch_assoc($run_side)) {
                        echo '
                            <div class="col-sm-4">
                                <img src="'.$rows['image'].'" width="120%">
                            </div>
                            <div class="col-sm-8">
                                <h4 class="list-group-item-heading"><a href="post.php?post_id='.$rows['id'].'">'.$rows['title'].'</a></h4>
                                <p class="list-group-item-text">'.substr($rows['description'],0,100).'......</p>
                            </div>       
                        ';
                    }
                ?>

            </div>
        </div>
    </div>
</aside>