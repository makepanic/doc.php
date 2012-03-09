<?php
class CodeExtension extends Extension{
	protected $allowDetail = true;
	protected $extensionString = 'code';

	public function getDetailCode($fileObj){
		$code=$fileObj->readFile();
		//Be careful with XSS
		return '<div class="markdown"><pre><code>'.htmlspecialchars($code).'</code></pre></div>';
	}
}

$ext=new CodeExtension();
$ext->register(array('php','js','java','vb','cs','html','css'));
?>