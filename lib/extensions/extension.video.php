<?php
class VideoExtension extends Extension{
	protected $allowDetail = true;
	protected $extensionString = 'video';

	//COMING SOON tm
	public function getDetailCode($fileObj){
<<<<<<< HEAD
		return '<div class="center"><video src="'.$fileObj->getFullString(true).'" controls preload="auto">no html5 video support</video></div>';
=======
		return '<video src="'.$fileObj->getFullString(true).'" controls preload="auto">HTML5 video is not supported by your browser</video>';
>>>>>>> f234910dbe2ed5f6378fff8a02414c45f99ed1a3
	}
}

$ext=new VideoExtension();
$ext->register(array('mp4','wma','webm','ogg','ogv'));
?>