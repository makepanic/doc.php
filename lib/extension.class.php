<?php
class Extension{
	protected static $extArray=array();
	protected static $classArray=array();
	protected static $extCount = 0;
	protected static $classCount = 0;

	protected $extensionString = "unknown";
	protected $allowDetail = false;
	protected $allowDownload = false;
	protected $hasListLayout = false;
	protected $readFile = false;
	protected $caching = false;
	protected $cacheTimeout = 0; //in seconds

	public static function loadExtensions(){
		foreach (glob(LIB.'extensions/extension.*.php') as $filename)
		{
		    include $filename;
		}
	}
	public function register($extension){
		if(in_array($extension, static::$extArray)){
			Notification::Error('Extension bereits vorhanden');
		}else{
			if(is_string($extension)){
				static::$extArray[static::$extCount++]=strtolower($extension);
				static::$classArray[static::$classCount++]=get_class($this);	
			}elseif(is_array($extension)){
				for($i=0;$i<count($extension);$i++){
					static::$extArray[static::$extCount++]=strtolower($extension[$i]);
					static::$classArray[static::$classCount++]=get_class($this);
				}
			}
		}
	}
	public function allowsDetails(){
		return $this->allowDetail;
	}
	public function hasListLayout(){
		return $this->hasListLayout;
	}
	private static function exists($string){
		if(in_array(strtolower($string), static::$extArray)){
			return true;
		}else{
			return false;
		}
	}
	public static function getClassName($string){
		$string=strtolower($string);
		if(static::exists($string)){
			return static::$classArray[array_search($string, static::$extArray)];
		}else{
			return false;
		}
	}
	public function usesCache(){
		#echo get_class($this)." caching:".($this->caching?"ja":"nein");
		return $this->caching;
	}
	public function getCacheTimeout(){
		return $this->cacheTimeout;
	}
	public function readsFile(){
		return $this->readFile;
	}
	public function getDetailCode($fileObj){
		return "no specific code defined";
	}
	public function getDownloadElement($fileObj){
		if($this->allowDownload){
			$src = $fileObj->getPath()->toFullString(true);
			return '<div class="center"><a class="download" title="click to download" href="'.$src.'">download '.$fileObj->getName().$fileObj->getFileType().'</a></div>';
		}
	}
	public function getExtensionString(){
		return $this->extensionString;
	}
}
?>