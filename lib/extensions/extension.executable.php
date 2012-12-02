<?php
class ExecutableExtension extends Extension{
	protected $allowDetail = true;
	protected $allowDownload = true;
	protected $extensionString = 'exe';

	public function getDetailCode($fileObj){
		return '<div class="markdown center"><h2>'.$fileObj->getName().'</h2></div>';
	}
}

$ext=new ExecutableExtension();
$ext->register(array('exe'));
?>
