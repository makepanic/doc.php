#doc.php
doc.php is a PHP application that mimics a file explorer. 
Using html5 to display audio and video and [PHP markdown by Michel Fortin](http://michelf.com/projects/php-markdown/) to parse these files into a simple but interactive file browser.

doc.php was created by [@makepanic](https://twitter.com/makepanic).

##What does it do?

* parse files the way you want
* limits the access to a defined root folder
* individual rules for extensions

##Installation
1. download [doc.php](https://github.com/makepanic/doc.php) from github.
2. extract `index.php` and the `lib` folder on your php enabled server
3. create a subfolder for your filesystem, default:`docphp`
4. copy all the files you want to use in doc.php into the created folder

###Additional Config
open `index.php` and modify the define() commands if you want

	ROOT_DIR:	 default: `docs`
				 this string sets the root folder for your docphp presentation
	MAX_NAV :	 default: `4`
				 number of breadcrumbs to dispay in the top navigation
	SHORTEN_NAV: default: `15`
				 number of maximum folder length in the top navigation

###License
[WTFPL](http://sam.zoy.org/wtfpl/)

####TODO
* download option
* add more extensions
* htaccess options for better links