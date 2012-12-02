<?php
class MarkdownExtension extends Extension{
	protected $allowDetail = true;
	protected $extensionString = 'text';
	protected $caching = true;
	protected $cacheTimeout = 86400; #1 day (60sec*60min*24hours)

	public function getDetailCode($fileObj){
		return '<div class="markdown">'.Markdown($fileObj->readFile()).'</div>';
	}
}

$ext=new MarkdownExtension();
$ext->register(array('md','markdown'));
?>
