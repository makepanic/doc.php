<?php
class CodeExtension extends Extension{
	protected $allowDetail = true;
	protected $allowDownload = true;
	protected $extensionString = 'code';

	public function getDetailCode($fileObj){
		Layout::addScript("http://yandex.st/highlightjs/6.1/highlight.min.js");
		Layout::addStyle("http://yandex.st/highlightjs/6.1/styles/solarized_light.min.css");
		Layout::addScriptInline("hljs.initHighlightingOnLoad();");
		$code=$fileObj->readFile();
		//Be careful with XSS
		return '<div class="markdown"><h2>'.$fileObj->getName().'</h2></div><div class="markdown"><pre><code>'.htmlspecialchars($code).'</code></pre></div>';
	}
}
$ext=new CodeExtension();
$ext->register(array('php','js','java','vb','cs','html','css','py'));
?>
