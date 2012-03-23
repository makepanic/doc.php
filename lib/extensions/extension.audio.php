<?php
class AudioExtension extends Extension{
	protected $allowDetail = false;
	protected $hasListLayout = true;
	protected $extensionString = 'audio';

	public function getListStyle($fileObj){
		$name=$fileObj->getName().((SHOW_EXTENSIONS)?$fileObj->getFileType():'');
		$wireframe='<span class="controls" onclick="play(this)"></span>
                    <audio title="'.$name.'" id="audioPlayer" src="'.$fileObj->getFullString(true).'" preload="auto" autobuffer>
                    </audio>
                    <a class="title">'.$name.'</a>
                    <div class="nil"></div>';
        return $wireframe;
	}
}

$ext=new AudioExtension();
$ext->register(array('wav','mp3','ogg'));
?>
