<?php
class ImageExtension extends Extension{
	protected $allowDetail = true;
	protected $allowDownload = true;
	protected $hasListLayout = true;
	protected $extensionString = 'image';

	public function getListStyle($fileObj){
		$path = $fileObj->getPath();
		$pathString = $fileObj->toFullPathString(true);
		$name = $fileObj->getName();
		$url = FileSystemHelper::linkTo($path, count($path->toArray()), true);
		$wireframe='
		<a href="'.$url.'">
			<div class="sneak" style="background:url(\''.$pathString.'\') center center no-repeat">
				<p>'.$name.'</p>
			</div>
		</a>';
		return $wireframe;
	}

	public function getDetailCode($fileObj){
		$path=$fileObj->toFullPathString(true);
		return '<div class="markdown"><h2>'.$fileObj->getName().'</h2></div><div class="markdown center"><img src="'.$path.'" alt="#"/></div>';
	}
}

$ext=new ImageExtension();
$ext->register(array('jpg','jpeg','gif','png','apng','bmp'));
?>
