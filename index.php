<?php
define('DOCPHP_VERSION',1.6);

require('config.php');

define('STYLE', '/' . APP_FOLDER . '/' . LIB . 'static/style.css'); //Stylesheet file path
define('SCRIPT', '/' . APP_FOLDER . '/' . LIB . 'static/script.js'); //Javascript file path
define('ROOT_FILE', HTACCESS ? '' : $_SERVER['SCRIPT_NAME'] . '?path='); //this file

require(LIB.'path.class.php');
require(LIB.'filesystemhelper.php');
require(LIB.'filesystem.php');
require(LIB.'file.class.php');
require(LIB.'template.class.php');
require(LIB.'extension.class.php');
require(LIB.'layout.class.php');
require(LIB.'markdown.php');

Extension::loadExtensions();
$doc = new DocPHP($_GET);

?>