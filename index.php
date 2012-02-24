<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('LIB','lib/');
define('STYLE',LIB.'style.css');
define('ROOT_DIR','demo');
define('ROOT_FILE',$_SERVER['PHP_SELF']);
define('MAX_NAV',4);
define('SHORTEN_NAV',15);
define('HTACCESS',false); //TODO
define('DOTDOT',false); //only change if you want to allow going up in the file hierarchy
define('IMAGES','png|jpg|jpeg|gif');

require(LIB.'wiki.class.php');
require(LIB.'file.class.php');
require(LIB.'view.class.php');
include_once LIB."markdown.php";

$reqPath = Wiki::parseGET();
$content = Wiki::loadObj($reqPath);
$response = View::addStuff($content,$reqPath);

echo $response;
?>