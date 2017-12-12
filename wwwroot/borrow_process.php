<?php
    $allowed_roles = array('user');

    include_once('config.php');
    //var_dump($site_role);

    //$page_title = 'Borrow Book';
    include_once('inc.header.php');
    include_once('User.php');
    include_once('UserRepository.php');
    include_once('Book.php');
    include_once('BookRepo.php');

    $uid = $_SESSION['USER'];
    $id = $_GET['id'];
    //var_dump( $id);

    $borrow = new Borrow();

    $urp = new UserRepository();
    $brp = new BookRepository();
    $borrowrep = new BorrowRepository();
    $current_user = $urp->GetUserById($uid);
    //var_dump($current_user);
    $books = $brp->GetBookById($id);
?>