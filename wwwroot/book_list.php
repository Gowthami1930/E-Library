<?php
    $page_title = "List Books";
    $allowed_roles = array('admin');
    include_once('inc.header.php');


    include_once('Book.php');
    include_once('BookRepo.php');

    $brp = new BookRepository();
    $books = $brp->GetAllBooks();
   // var_dump($books);
?>


    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>ISBN</th>
                        <th>Image URL</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Publisher</th>
                        <th>Year</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i = 0; $i < count($books); $i++)
                    {
                        $book = $books[$i];
                        ?>
                        <tr>
                            <td><?= $book->id ?></td>
                            <td><?= $book->title ?></td>
                            <td><?= $book->isbn ?></td>
                            <td><?= $book->image_url ?></td>
                            <td><?= $book->author ?></td>
                            <td><?= $book->category ?></td>
                            <td><?= $book->publisher ?></td>
                            <td><?= $book->publish_year ?></td>
                            <td><a href="book_edit.php?id=<?= $book->id ?>" class="btn btn-primary">Edit</a>
                                &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="book_delete.php?id=<?= $book->id ?>"><input type="button" class="btn btn-danger" value="Delete" name="delete"></a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>

            </table>

        </div>
    </div>


<?php
    include_once('inc.footer.php');
?>