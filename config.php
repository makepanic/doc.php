<?php
define('ROOT_DIR', 'raw'); //home dir
define('DOC_TITLE', 'doc.php'); //change the title of the navigation bar h1

define('THEME', 'light'); //choose theme style ( light or dark )
define('MAX_NAV', 4); //maximum of displayed navigaton files
define('SHORTEN_NAV', 15); //char count in nav

define('LIB', 'lib/'); //Libary path
define('SHOW_EXTENSIONS', false); //change to display file extensions in list view
define('HTACCESS', false); //uses better urls if true
define('APP_FOLDER', basename(dirname($_SERVER['PHP_SELF'])));

define('FILE_ROOT', dirname($_SERVER["REQUEST_URI"]));
?>