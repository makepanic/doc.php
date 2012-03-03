<?php
class ImageExtension extends Extension{
	protected $allowDetail = true;
	protected $extensionString = 'image';

	public function getDetailCode($fileObj){
		return '<img class="img" src="'.$fileObj->getFullString(true).'" alt="#"/>';
	}
}

$ext=new ImageExtension();
$ext->register(array('jpg','gif','png'));
?>