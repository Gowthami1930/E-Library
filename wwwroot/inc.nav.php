
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= SITEURL ?>index.php"><?= PROJECT ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?= SITEURL ?>index.php">Home</a></li>

                <?php

                    if($site_role == "admin")
                    {
                        include_once("inc.nav.admin.php");
                    }
                    if($site_role == "user")
                    {
                        include_once("inc.nav.user.php");
                    }

                ?>
                <form class="navbar-form navbar-right" method="post" action="search_result.php">
                    <input type="text" name="search" class="form-control" placeholder="Search...">
                    <input type="submit" class="btn btn-default" value="Search">
                </form>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                    if($site_role == "unauth")
                    {
                        include_once("inc.nav.login.php");
                    }
                    else
                    {
                        include_once("inc.nav.logged.php");
                    }
                ?>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false">Site Info <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= SITEURL ?>about.php">About</a></li>
                        <li><a href="<?= SITEURL ?>contact.php">Contact</a></li>
                        <li><a href="<?= SITEURL ?>help.php">Help</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>