<?php
//error_reporting(0);
date_default_timezone_set('Africa/Lagos');
$path = 'classes/'. PATH_SEPARATOR .'../classes/'; //what did yuh do here
//site info
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
session_start();
//database things
define('DBHOST',"localhost");
define('DBUSER',"root");
define('DBPWD',"");
define('DBNAME',"librarydb");
define('SITEURL',"/library/wwwroot/");
define('ASSETS',"/library/wwwroot/content/");
define('PROJECT',"Library App");
define('SITELOC','c:/wamp/www/library/wwwroot/');
define('ERRORLOG','c:/wamp/www/library/logs/');
define('PROFILE_PIC_PATH','c:/wamp/www/library/wwwroot/content/profile_pic/');
define('PROFILE_PIC_URL','http://localhost/library/wwwroot/content/profile_pic/');
define('BOOK_PIC_PATH','c:/wamp/www/library/wwwroot/content/book_pic/');
define('BOOK_PIC_URL','/library/wwwroot/content/book_pic/');
//define('BOOK_PATH','c:/wamp/www/library/wwroot/content/books');
//define('BOOK_URL','/library/wwwroot/content/books');
define('ALLOWED_IMAGES',':jpeg:jpg:png:');
define('MAX_IMAGE_SIZE','1024000');
define('PROFILE_PIC_DEFAULT','default_large.png');
define('BOOK_PIC_DEFAULT', 'defbookcover.jpg');

include_once('Connect.php');
include_once('Utility.php');
include_once('Notice.php');
include_once('User.php');
include_once('UserRepository.php');
include_once('Book.php');
include_once('BookRepo.php');
$site_role = "unauth";
if(isset($_SESSION["ROLE"]))
{
    $site_role = $_SESSION["ROLE"];
}

if(isset($allowed_roles))
{
    if(in_array($site_role, $allowed_roles))
    {
        //OK!
    }
    else
    {
        include_once('err.unauth.php');
        die;
    }
}