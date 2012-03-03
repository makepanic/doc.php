<?php
class AudioExtension extends Extension{
	protected $allowDetail = false;
	protected $hasListLayout = true;
	protected $extensionString = 'audio';

	public function getListStyle($fileObj){
		$wireframe='<span class="controls" onclick="play(this)"></span>
                    <audio id="audioPlayer" src="'.$fileObj->getFullString(true).'" preload="auto" autobuffer>no html5 audio support</audio>
                    <a class="title">'.$fileObj->getName().'</a>
                    <div class="nil"></div>';
        return $wireframe;
	}
}

$ext=new AudioExtension();
$ext->register(array('wav','mp3','ogg'));
?>