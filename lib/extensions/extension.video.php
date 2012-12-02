<?php
class VideoExtension extends Extension{
	protected $allowDetail = true;
	protected $extensionString = 'video';

	public function getDetailCode($fileObj){
    $src = $fileObj->getPath()->toFullString();
		return '<div class="markdown"><h2>'.$fileObj->getName().'</h2></div><div class="center"><video src="'.$src.'" controls preload="auto">no html5 video support</video></div>';
	}
}

$ext=new VideoExtension();
$ext->register(array('mp4','wma','webm','ogv'));
?>
