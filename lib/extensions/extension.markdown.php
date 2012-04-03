<?php
class MarkdownExtension extends Extension{
	protected $allowDetail = true;
	protected $extensionString = 'text';

	public function getDetailCode($fileObj){
		return '<div class="markdown">'.Markdown($fileObj->readFile()).'</div>';
	}
}

$ext=new MarkdownExtension();
$ext->register(array('md','markdown'));
?>
