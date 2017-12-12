<?php
    $page_title = "Edit Book";
    include_once('inc.header.php');

    include_once('Book.php');
    include_once('BookRepo.php');

    $id = $_GET['id'];
    $brp = new BookRepository();
    $book = $brp->GetBookById($id);

    $nt = new Notice();


    if ($_POST) {
        //$book->id = $_POST["id"];
        $book->title = $_POST["title"];
        $book->isbn = $_POST["isbn"];
        $book->uploaded_image = $_FILES['image'];
        $book->author = $_POST["author"];
        $book->category = $_POST["category"];
        $book->publisher = $_POST["publisher"];
        $book->publish_year = $_POST["publish_year"];
        $book->info = $_POST["info"];
        include_once('BookController.php');
        $bct = new BookController();
        $nt = $bct->Edit_Book($book);
    }
?>

    <!--<div class="panel panel-primary">
        <div class="panel panel-heading"></div>
        <div class="panel-body">
        </div>
    </div>-->
<?= $nt->Paint() ?>

    <div class="row">
        <form method="post" enctype="multipart/form-data">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel panel-heading"></div>
                    <div class="panel-body">
                        <input type="hidden" name="id" value="<?= $id ?>"/>

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Book Title" name="title"
                                   value="<?= $book->title ?>">
                        </div>
                        <div class="form-group">
                            <label for="isbn">ISBN</label>
                            <input type="text" class="form-control" id="isbn" placeholder="ISBN Number" name="isbn"
                                   value="<?= $book->isbn ?>">
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" id="author" placeholder="Author" name="author"
                                   value="<?= $book->author ?>">
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" id="category" placeholder="Book category" name="category"
                                   value="<?= $book->category ?>">
                        </div>
                        <div class="form-group">
                            <label for="publisher">Publisher</label>
                            <input type="text" class="form-control" id="publisher" placeholder="Publisher" name="publisher"
                                   value="<?= $book->publisher ?>">
                        </div>
                        <div class="form-group">
                            <label for="year">Year Published</label>
                            <input type="date" class="form-control" id="year" placeholder="Year Published" name="publish_year"
                                   value="<?= $book->publish_year ?>">
                        </div>
                        <div class="form-group">
                            <label for="info">Book Information</label>
                            <textarea class="form-control" id="author" placeholder="Book Review info"
                              name="info" ><?= $book->info ?></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary btn-block" value="Update"/>

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-primary text-center">
                    <div class="panel panel-heading">
                        <div class="panel-title">
                            Book Cover Image
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-md-2"></div>
                            <!--<label for="image_url"><h4>Book Cover</h4></label>-->
                            <div class="col-md-8">
                                <br>
                                <img src="<?= BOOK_PIC_URL ?><?= $book->image_url ?>" class="img-responsive img-thumbnail" width="200">
                                <br/><br/>
                                <input type="file" name="image" value="">
                                <br>
                            </div>
                            <div class="col-md-2"></div>
                            <!--<input type="url" class="form-control" id="image_url" placeholder="Book Image url" name="image_url" value="<?/*=$book->image_url*/?>" >-->
                        </div>
                    </div>
                <div>
            </div>
        </form>
    </div>


<?php
    include_once('inc.footer.php');
?>