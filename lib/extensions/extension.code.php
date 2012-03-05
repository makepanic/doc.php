<?php
class CodeExtension extends Extension{
	protected $allowDetail = true;
	protected $extensionString = 'code';

	public function getDetailCode($fileObj){
		$code=$fileObj->readFile();
		//Be careful with XSS
		return '<pre><code>'.htmlspecialchars($code).'</code></pre>';
	}
}

$ext=new CodeExtension();
$ext->register(array('php','js','java','php'));
?>