<?php
//Enable in case of debug
/*
error_reporting(E_ALL);
ini_set('display_errors', 1);
*/

define('ROOT_DIR','demo'); //home dir
define('MAX_NAV',4); //maximum of displayed navigaton files
define('SHORTEN_NAV',15); //char count in nav

/*DO NOT EDIT BELOW THIS COMMENT*/

define('LIB','lib/'); //Libary path
define('STYLE',LIB.'static/style.css'); //Stylesheet path
define('ROOT_FILE',$_SERVER['PHP_SELF']); //this file
define('HTACCESS',false); //TODO
define('DOTDOT',false); //only change if you want to allow going up in the file hierarchy

require(LIB.'wiki.class.php');
require(LIB.'file.class.php');
require(LIB.'view.class.php');
include_once LIB."markdown.php";
require(LIB.'notification.class.php');
require(LIB.'extension.class.php');

//Include all extension files
Extension::loadExtensions();
$reqPath = Wiki::parseGET();
$content = Wiki::loadObj($reqPath);
$response = View::addStuff($content,$reqPath);

echo $response;
?>
