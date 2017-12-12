<?php
    include_once('inc.header.php');
    $allowed_roles = array('admin');

    include_once('Book.php');
    include_once('BookRepo.php');
    $id = $_GET['id'];
    //var_dump($id);
    $brp = new BookRepository();
    $book = $brp->DeleteBook($id);
    header("Location: book_list.php");
?>
    <div class="row"></div>
<?php include_once('inc.footer.php')?>
