<?php
class PdfExtension extends Extension{
	protected $allowDetail = true;
	protected $extensionString = 'pdf';

	public function getDetailCode($fileObj){
    $src = $fileObj->getPath()->toFullString(true);
		return '<div class="markdown"><h2>'.$fileObj->getName().'</h2></div><object width="100%" height="500" type="application/pdf" data="'.$src.'?#view=fitb&zoom=scale&scrollbar=0&toolbar=1&navpanes=0" id="pdf_content">
    <p class="markdown">Looks like you cannot display this PDF file in your browser. Download the file <a href="'.$src.'">here</a> to view it.</p>
  </object>
  ';
	}
}
$ext=new PdfExtension();
$ext->register(array('pdf'));
?>
