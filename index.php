<?php
//Enable in case of debug
/*
error_reporting(E_ALL);
ini_set('display_errors', 1);
*/

define('DOCPHP_VERSION',1.01);

require('config.php');

define('STYLE',LIB.'static/style.css'); //Stylesheet file path
define('SCRIPT',LIB.'static/script.js'); //Javascript file path
define('ROOT_FILE',$_SERVER['SCRIPT_NAME']); //this file
define('HTACCESS',false); //TODO

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
