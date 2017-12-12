<?php
    $allowed_roles = array('user');

    include_once('config.php');
    //var_dump($site_role);



    $page_title = 'Borrow Book';
    include_once('inc.header.php');
    include_once('User.php');
    include_once('UserRepository.php');
    include_once('Book.php');
    include_once('BookRepo.php');

    $uid = $_SESSION['USER'];
    $id = $_GET['id'];
    //var_dump( $id);

    $urp = new UserRepository();
    $brp = new BookRepository();
    $current_user = $urp->GetUserById($uid);
    //var_dump($current_user);
    $books = $brp->GetBookById($id);
?>

    <div class row>
        <div class="col-md-3"></div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">Pls confirm the following information</div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="#" class="thumbnail">
                                <img src=<?= $books->image_url ?>/>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h4>Book Title:</h4>
                        </div>
                        <div class="col-md-6"><h4><?=$books->title?></h4></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h4>Name :</h4>
                        </div>
                        <div class="col-md-6"><h4><?=$current_user->FullName()?></h4></div>
                    </div>
                        <a href="borrow_process.php?id=<?=$books->id?>" class="btn btn-default btn-block" name="borrow">Borrow</a>
                        <!--<a href="" type="button" class="btn btn-default btn-block" name= value="Borrow">-->
                </div>
            </div>
        </div>

        <div class="col-md-3"></div>
    </div>


<?php
    include_once('inc.footer.php');
?>