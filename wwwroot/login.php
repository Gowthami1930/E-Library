<?php
    $page_title = "Log In";
    $allowed_roles = array('unauth');
    include_once('inc.header.php');
    $nt = new Notice();
    $login = new User();
    if ($_POST) {
        $login->email = $_POST["email"];
        $login->pwd = $_POST["pwd"];
        include_once('UserController.php');
        $uct = new UserController();
        $nt = $uct->Login($login);
    }
?>

    <div class="row">
        <div class="col-md-7">
            <img src="<?= ASSETS ?>images/books.jpg" class="img-responsive img-thumbnail" alt="Login"/>
        </div>
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Hello Guest!</h3>
                </div>
                <div class="panel-body">
                    <p>If you don't have an account click here to <a href="<?= SITEURL ?>register.php">Register</a></p>
                    <?= $nt->Paint() ?>
                    <form method="post" action="login.php">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                   value="<?= $login->email ?>">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password</label>
                            <input type="password" class="form-control" id="pwd" name="pwd"
                                   placeholder="Password">
                        </div>

                        <input type="submit" class="btn btn-default btn-block" value="Login"/>
                    </form>
                </div>
            </div>


        </div>
    </div>


<?php
    include_once('inc.footer.php');
?>