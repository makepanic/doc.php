<?php
class VideoExtension extends Extension{
	protected $allowDetail = true;
	protected $extensionString = 'video';

	//COMING SOON tm
}

$ext=new VideoExtension();
$ext->register('mp4','wma','avi');
?>