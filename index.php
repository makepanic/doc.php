<?php
define('DOCPHP_VERSION',1.5);

require('config.php');

define('STYLE','./' . LIB . 'static/style.css'); //Stylesheet file path
define('SCRIPT','/' . LIB . 'static/script.js'); //Javascript file path
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
