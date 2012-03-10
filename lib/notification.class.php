<?php
class Notification{
	public static function Error($msg){
		echo view::parseView('<li><a>Error</a></li>','Error','<div class="markdown"><p>'.$msg.'<br/><a href="'.ROOT_FILE.'">back home</a></p></div>');
		die();
	}
}
?>