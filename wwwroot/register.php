<?php
    $page_title = "Register";
    $allowed_roles = array('unauth');
    include_once('inc.header.php');
    $nt = new Notice();
    $reg = new User();
    if($_POST)
    {
        $reg->email = $_POST["email"];
        $reg->firstname = $_POST["fname"];
        $reg->lastname = $_POST["lname"];
        $reg->pwd = $_POST["pwd"];
        $reg->pwd2 = $_POST["pwd2"];
        include_once('UserController.php');
        $uct = new UserController();
        $nt = $uct->Register($reg);
    }
?>
    <div class="row">
        <div class="col-md-8">
            <img src="<?= ASSETS ?>images/register.jpg" class="img-responsive img-thumbnail" alt="Login Geek"/>
        </div>
        <div class="col-md-4">


            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Hello Guest!</h3>
                </div>
                <div class="panel-body">

                    <?= $nt->Paint() ?>

                    <form method="post" action="register.php">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $reg->email ?>" />
                        </div>
                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" value="<?= $reg->firstname ?>" />
                        </div>
                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" value="<?= $reg->lastname ?>" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password" value="" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Confirm Password</label>
                            <input type="password" class="form-control" id="pwd2" name="pwd2" placeholder="Confirm Password" value="" />
                        </div>

                        <input type="submit" class="btn btn-primary btn-block" value="Register"/>
                    </form>
                </div>
            </div>




        </div>
    </div>


<?php
    include_once('inc.footer.php');
?>