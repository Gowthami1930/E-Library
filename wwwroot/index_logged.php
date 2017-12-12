<?php
//include_once('config.php');
//?><!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="utf-8"/>-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1"/>-->
<!--    <title>--><?//= PROJECT ?><!-- - --><?//= $page_title ?><!--</title>-->
<!--    <link href="--><?//= ASSETS ?><!--css/bootstrap.min.css" rel="stylesheet"/>-->
<!--    <link href="--><?//= ASSETS ?><!--css/bootstrap-theme.min.css" rel="stylesheet"/>-->
<!--    <link href="--><?//= ASSETS ?><!--css/site.css" rel="stylesheet"/>-->
<!--    <!--[if lt IE 9]>-->
<!--    <script src="--><?//= ASSETS ?><!--js/html5shiv.min.js"></script>-->
<!--    <script src="--><?//= ASSETS ?><!--js/respond.min.js"></script>-->
<!--    <![endif]-->-->
<!--</head>-->
<!--<body>-->
<!--<div class="container">-->
<!--    --><?php
//        include_once('inc.nav.php');
//        $id = $_SESSION['USER'];
//        $urp = new UserRepository();
//        $current_user = $urp->GetUserById($id);
//    ?>
<!---->
<!---->
<!--    <div class="row">-->
<!--        <div class="col-md-12">-->
<!--            <div class="page-header"><h1>Welcome --><?//= $current_user->firstname ?><!-- !</h1></div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div class="row">-->
<!--        <div class="col-md-12">-->
<!--            <img src="--><?//= ASSETS ?><!--images/book_pages_heart-wallpaper-1600x480.jpg" class="img-responsive img-thumbnail" alt="book"/>-->
<!--        </div>-->
<!--    </div>-->
<!--    <br>-->
<!---->
<!--    --><?php
//        //$page_title = "Welcome";
//        //include_once('inc.header.php');
//        $allowed_roles = array('unauth');
//
//
//        include_once('Book.php');
//        include_once('BookRepo.php');
//
//        $brp = new BookRepository();
//        $books = $brp->GetAllBooks();
//    ?>
<!---->
<!---->
<!--    <div class="row">-->
<!--        --><?php //for($i = 0; $i < count($books); $i++) {
//            $book = $books[$i];
//            ?>
<!--            <div class="col-md-2 col-sm-2 col-xs-2">-->
<!--                <div class="thumbnail">-->
<!--                    <img src=--><?//=$book->image_url?><!-->-->
<!--                    <div class="caption">-->
<!--                        <h3>--><?//= $book->title ?><!--</h3>-->
<!--                        <p>Author: --><?//= $book->author ?><!--</p>-->
<!--                        <p><a href="book_details.php?id=--><?//=$book->id?><!--" class="btn btn-primary">Read More</a></p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        --><?php
//        }
//        ?>
<!--    </div>-->
<!---->
<!---->
<?php
//    include_once('inc.footer.php');
//?>