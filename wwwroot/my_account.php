<?php
    $page_title = 'Profile';
    include_once('inc.header.php');
    include_once('User.php');
    include_once('UserRepository.php');
    $uid = $_SESSION['USER'];
    //var_dump($uid);
    $urp = new UserRepository();
    $current_user = $urp->GetUserById($uid);
    //var_dump($current_user);
?>

    <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-4">
            <br>

            <img src="<?= PROFILE_PIC_URL ?><?= $current_user->image ?>" class="img-circle" height="130" width="130">
            <br><br>
        </div>
        <div class="col-md-3"></div>
    </div>

    <div class="row">
        <div class="col-md-2"></div>

        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title text-center" ><h4><?= $current_user->firstname ?></h4></div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2"></div>

                        <div class="col-md-8">

                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Last Name :</h4>
                                </div>
                                <div class="col-md-6">
                                    <h4><?= $current_user->lastname?></h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <h4>First Name :</h4>
                                </div>
                                <div class="col-md-6">
                                    <h4><?= $current_user->firstname?></h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Email :</h4>
                                </div>
                                <div class="col-md-6">
                                    <h4><?= $current_user->email?></h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <h4>ID Name  :</h4>
                                </div>
                                <div class="col-md-6">
                                    <h4><?= $current_user->id_name?></h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <h4>ID Number :</h4>
                                </div>
                                <div class="col-md-6">
                                    <h4><?= $current_user->id_number?></h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <h4>ID Issuer :</h4>
                                </div>
                                <div class="col-md-6">
                                    <h4><?= $current_user->id_issuer?></h4>
                                </div>
                            </div>

                            <a href="user_edit.php" class="btn btn-block btn-info"><h4>Edit Profile</h4></a>
                        </div>

                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-2"></div>

    </div>

<?php include_once('inc.footer.php')?>