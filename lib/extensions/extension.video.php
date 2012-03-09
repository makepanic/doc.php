<?php
class VideoExtension extends Extension{
	protected $allowDetail = true;
	protected $extensionString = 'video';

	//COMING SOON tm
	public function getDetailCode($fileObj){
		return '<video src="'.$fileObj->getFullString(true).'" controls preload="auto">HTML5 video is not supported by your browser</video>';
	}
}

$ext=new VideoExtension();
$ext->register(array('mp4','wma','webm','ogg','ogv'));
?>