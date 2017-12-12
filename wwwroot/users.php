<?php
    $page_title = "Users";
    $allowed_roles = array('admin');
    include_once('inc.header.php');

    include_once('User.php');
    include_once('UserRepository.php');

    $urp = new UserRepository();
    $users = $urp->GetAllUsers();

    var_dump($users);
?>
<?php
    include_once('inc.footer.php');
?>