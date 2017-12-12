<?php
    $page_title = "Add Book";
    $allowed_roles = array('admin');
    include_once('inc.header.php');
    $nt = new Notice();
    $book = new Book();
    if(isset($_POST['add']))
    {
        $book->title = $_POST["title"];
        $book->isbn = $_POST["isbn"];
        $book->uploaded_image = $_FILES['image'];
        /*var_dump($book->uploaded_image);
        exit;*/
        $book->author = $_POST["author"];
        $book->category = $_POST["category"];
        $book->publisher = $_POST["publisher"];
        $book->publish_year = $_POST["publish_year"];
        $book->info = $_POST["info"];
        include_once('BookController.php');
        $bct = new BookController();
        $nt = $bct->Add_Book($book);
    }
?>

<?= $nt->Paint() ?>
<div class="row">
    <form method="post" enctype="multipart/form-data" action="book.add.php">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel panel-heading"></div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="title"><h4>Title</h4></label>
                        <input type="text" class="form-control" id="title" placeholder="Book Title" name="title" value="<?=$book->title?>" >
                    </div>
                    <div class="form-group">
                        <label for="isbn"><h4>ISBN</h4></label>
                        <input type="text" class="form-control" id="isbn" placeholder="ISBN Number" name="isbn" value="<?=$book->isbn?>" >
                    </div>
                    <div class="form-group">
                        <label for="author"><h4>Author</h4></label>
                        <input type="text" class="form-control" id="author" placeholder="Author" name="author" value="<?=$book->author?>">
                    </div>
                    <div class="form-group">
                        <label for="category"><h4>Category</h4></label>
                        <input type="text" class="form-control" id="category" placeholder="Book category" name="category" value="<?=$book->category?>">
                    </div>
                    <div class="form-group">
                        <label for="publisher"><h4>Publisher</h4></label>
                        <input type="text" class="form-control" id="publisher" placeholder="Publisher" name="publisher" value="<?=$book->publisher?>">
                    </div>
                    <div class="form-group">
                        <label for="year"><h4>Year Published</h4></label>
                        <input type="date" class="form-control" id="year" placeholder="Year Published" name="publish_year" value="<?=$book->publish_year?>">
                    </div>
                    <div class="form-group">
                        <label for="info"><h4>Book Information</h4></label>
                        <textarea class="form-control" id="author" placeholder="Book Review info" name="info" <?=$book->info?>></textarea>
                    </div>
                    <input type="submit" name="add" class="btn btn-primary btn-block" value="Add"/>
                </div>
             </div>
        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel panel-heading">
                        <div class="panel-title">
                            Book Cover Image
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <br>
                                <img src="<?= BOOK_PIC_URL ?><?= $book->image_url ?>" class="img-responsive img-thumbnail" width="200">
                                <br/><br/>
                                <input type="file" name="image" value="<? $target_file ?>">
                                <br>
                                <!--<input type="url" class="form-control" id="image_url" placeholder="Book Image url" name="image_url" value="<?/*=$book->image_url*/?>" >-->
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                </div>

                <!--<div class="row">
                    <div class="panel panel-primary">
                        <div class="panel panel-heading">
                            <div class="panel-title">
                                Book File
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <br>

                                    <input type="file" name="book_file" value="<?/* $target_file */?>">
                                    <br>

                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div>

        </div>
    </form>
</div>


<?php
    include_once('inc.footer.php');
?>
