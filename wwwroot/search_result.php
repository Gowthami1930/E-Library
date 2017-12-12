<?php
    $page_title = "Search Result";
    $allowed_roles = array('unauth');
    include_once('inc.header.php');
    include_once('Book.php');
    include_once('BookRepo.php');

    $brp = new BookRepository();
    $title = $_POST['search'];
    var_dump($_POST['search']);
    $books = $brp->SearchBook($title);
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
                </tr>
            <?php
            }
            ?>
            </tbody>

        </table>

    </div>
</div>