<?php
define('DOC_TITLE','doc.php'); //change the title of the navigation bar
define('LIB','lib/'); //Libary path

define('FILE_ROOT', dirname($_SERVER["REQUEST_URI"]));
define('ROOT_DIR','raw'); //home dir

define('MAX_NAV',4); //maximum of displayed navigaton files
define('SHORTEN_NAV',15); //char count in nav

define('THEME','light'); //choose theme style ( light or dark )
define('SHOW_EXTENSIONS',true); //change to display file extensions in list view
?>