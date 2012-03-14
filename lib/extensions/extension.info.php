<?php
class InfoExtension extends Extension{
	protected $allowDetail = false;
	protected $hasListLayout = true;
	protected $extensionString = 'info';

	public function getListStyle($fileObj){
		//<span class="full"></span>
		$wireframe='<div class="markdown">'.Markdown($fileObj->readFile()).'</div>';
        return $wireframe;
	}
}

$ext=new InfoExtension();
$ext->register('info');
?>