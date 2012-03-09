<?php
class VideoExtension extends Extension{
	protected $allowDetail = true;
	protected $extensionString = 'video';

	public function getDetailCode($fileObj){
		return '<div class="center"><video src="'.$fileObj->getFullString(true).'" controls preload="auto">no html5 video support</video></div>';
	}
}

$ext=new VideoExtension();
$ext->register(array('mp4','wma','webm','ogg','ogv'));
?>
