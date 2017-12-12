<?php
    $page_title = 'Details';
    include_once('inc.header.php');
    $allowed_roles = array('unauth');

    $id = $_GET['id'];
    //var_dump($id);

    include_once('Book.php');
    include_once('BookRepo.php');

    $brp = new BookRepository();
    $books = $brp->GetBookById($id);
?>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title"><h4><strong><?=$books->title?></strong></h4></div>
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
                        <h4>Author :</h4>
                    </div>
                    <div class="col-md-6">
                        <h4><?= $books->author?></h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <h4>Category :</h4>
                    </div>
                    <div class="col-md-6">
                        <h4><?= $books->category?></h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <h4>Publisher :</h4>
                    </div>
                    <div class="col-md-6">
                        <h4><?= $books->publisher?></h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <h4>Date Published :</h4>
                    </div>
                    <div class="col-md-6">
                        <h4><?= $books->publish_year ?></h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <h4>Info :</h4>
                    </div>
                    <div class="col-md-6">
                        <h4><?= $books->info ?></h4>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <a href="borrow.php?id=<?=$books->id?>" class="btn btn-info">Borrow</a>
                    </div>
                    <div class="col-md-6">
                        <a href="index.php" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include_once('inc.footer.php')?>