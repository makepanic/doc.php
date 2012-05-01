<?php
class ImageExtension extends Extension{
	protected $allowDetail = true;
	protected $allowDownload = true;
	protected $hasListLayout = true;
	protected $extensionString = 'image';

	public function getListStyle($fileObj){
		$path=$fileObj->getFullString(true);
		$name=$fileObj->getName();
		$wireframe='
		<a href="'.$path.'">
			<div class="sneak" style="background:url(\''.$path.'\') center center no-repeat">
				<p>'.$name.'</p>
			</div>
		</a>';
        return $wireframe;
	}

	public function getDetailCode($fileObj){
		return '<div class="markdown center"><img src="'.$fileObj->getFullString(true).'" alt="#"/></div>';
	}
}

$ext=new ImageExtension();
$ext->register(array('jpg','jpeg','gif','png','apng','bmp'));
?>
