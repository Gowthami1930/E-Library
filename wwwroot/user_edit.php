<?php
    $page_title = 'Edit Profile';
    include_once('inc.header.php');
    include_once('User.php');
    include_once('UserRepository.php');
    $id = $_SESSION['USER'];
    $urp = new UserRepository();
    $current_user = $urp->GetUserById($id);
    //var_dump($current_user->image);

    $nt = new Notice();
    /*$upload_errors = array(
        UPLOAD_ERR_OK => "No errors",
        UPLOAD_ERR_INI_SIZE => "larger than upload_max_filesize",
        UPLOAD_ERR_FORM_SIZE => "larger than form MAX_FILE_SIZE",
        UPLOAD_ERR_PARTIAL => "partial upload",
        UPLOAD_ERR_NO_FILE => "No file",
        UPLOAD_ERR_NO_TMP_DIR => "No temp directory",
        UPLOAD_ERR_CANT_WRITE => "cant write to disk",
        UPLOAD_ERR_EXTENSION => "File upload stopped by extension"
    );*/

    //var_dump($_FILES["image"]);
    //move_uploaded_file($_FILES["image"]["tmp_name"],ASSETS."images/profile_pic/". $_FILES["image"]["name"]);

    /*if(isset($_POST['upload']))
    {
        $tmp_file = $_FILES['image']['tmp_name'];
        $target_file = basename($_FILES['image']['name']);
        $upload_dir = "content/images/profile_pic";
        $file_path = $upload_dir."/".$target_file;
        //move_uploaded_file($tmp_file,$upload_dir."/".$target_file);

        if(move_uploaded_file($tmp_file,$upload_dir."/".$target_file))
        {
            $message = "file uploaded successfully";
        }
        else
        {
            $error = $_FILES['image']['error'];
            $message = $upload_errors[$error];
        }

        //$current_user->image = $file_path;
    }*/

    if(isset($_POST['update']))
    {



        $current_user->lastname = $_POST["lname"];
        $current_user->firstname = $_POST["fname"];
        $current_user->email = $_POST["email"];
        $current_user->uploaded_image = $_FILES['image'];
        //move_uploaded_file($_FILES["image"]["tmp_name"],ASSETS."images/profile_pic/". $_FILES["image"]["name"]);
        //$current_user->id_name['id_name'];
        //$current_user->id_number['id_num'];
        //$current_user->id_issuer['id_issuer'];



        include_once('UserController.php');
        $uct = new UserController();
        $nt = $uct->Edit_User($current_user);
    }

?>
    <div class="panel panel-primary">
        <div class="panel-heading">
        </div>
        <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <?= $nt->Paint(); ?>
                        </div>
                    </div>

                    <div class="row">
                        <form method="post" action="user_edit.php" enctype="multipart/form-data">
                        <div class="col-md-1"></div>
                        <div class="col-md-4">
                            <img src="<?= PROFILE_PIC_URL ?><?= $current_user->image ?>" class="img-circle" height="130" width="130">
                            <br/><br/>
                            <input type="file" name="image" value="<? $target_file ?>">
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lname"><h4>Last Name</h4></label>
                                <input type="text" class="form-control" name="lname" placeholder="last name" value="<?= $current_user->lastname?>"/>
                            </div>
                            <div class="form-group">
                                <label for="fname"><h4>First Name</h4></label>
                                <input type="text" class="form-control" name="fname" placeholder="first name" value="<?= $current_user->firstname?>"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><h4>Email</h4></label>
                                <input type="text" class="form-control" name="email" placeholder="first name" value="<?= $current_user->email?>"/>
                            </div>
                            <input type="submit" name="update" class="btn btn-primary btn-block" value="Update" />
                        </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>

<?php include_once('inc.footer.php')?>