<?php
include_once('config.php');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title><?= PROJECT ?> - <?= $page_title ?></title>
    <link href="<?= ASSETS ?>css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?= ASSETS ?>css/bootstrap-theme.min.css" rel="stylesheet"/>
    <link href="<?= ASSETS ?>css/site.css" rel="stylesheet"/>
    <!--[if lt IE 9]>
    <script src="<?= ASSETS ?>js/html5shiv.min.js"></script>
    <script src="<?= ASSETS ?>js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
<?php
    include_once('inc.nav.php');
?>
    <div class="row">
        <div class="col-md-12">
            <div class="page-header"><h1><?= $page_title ?></h1></div>
        </div>
    </div>