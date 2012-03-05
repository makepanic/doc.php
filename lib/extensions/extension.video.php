<?php
class VideoExtension extends Extension{
	protected $allowDetail = true;
	protected $extensionString = 'video';

	//COMING SOON tm
	public function getDetailCode($fileObj){
		return '<video src="'.$fileObj->getFullString(true).'" controls preload="auto">no html5 video support</video>';
	}
}

$ext=new VideoExtension();
$ext->register(array('mp4','wma','webm','ogg'));
?>