<?php
    $page_title = "Welcome";
    include_once('inc.header.php');
    $allowed_roles = array('unauth');


    include_once('Book.php');
    include_once('BookRepo.php');

    $brp = new BookRepository();
    $books = $brp->GetAllBooks();
?>
    <div class="row">
        <div class="jumbotron">
            <h1>Read a book Today...</h1>
        </div>
        <!--<div class="col-md-12">
            <img src="<?/*= ASSETS */?>images/book_pages_heart-wallpaper-1600x480.jpg" class="img-responsive img-thumbnail" alt="book"/>
        </div>-->
    </div>
    <br>
    <br>
    <div class="row">
        <?php for($i = 0; $i < count($books); $i++) {
            $book = $books[$i];
        ?>
         <div class="col-md-2 col-sm-2 col-xs-2">
             <div class="thumbnail">
                 <img src="<?= BOOK_PIC_URL ?><?= $book->image_url ?>" class="img-responsive img-thumbnail" length="100" width="100">
                 <div class="caption">
                     <h4 class="text-center"><?= $book->title ?></h4>
                     <p>Author: <?= $book->author ?></p>
                     <p class="text-center"><a href="book_details.php?id=<?=$book->id?>" class="btn btn-primary">Read More</a></p>
                 </div>
             </div>
         </div>
        <?php
        }
        ?>
    </div>


<?php
    include_once('inc.footer.php');
?>