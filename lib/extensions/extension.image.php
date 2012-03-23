<?php
class ImageExtension extends Extension{
	protected $allowDetail = true;
	protected $allowDownload = true;
	protected $extensionString = 'image';

	public function getDetailCode($fileObj){
		return '<div class="markdown center"><img src="'.$fileObj->getFullString(true).'" alt="#"/></div>';
	}
}

$ext=new ImageExtension();
$ext->register(array('jpg','jpeg','gif','png','apng','bmp'));
?>
