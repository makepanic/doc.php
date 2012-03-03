<?php
class Extension{
	protected static $extArray=array();
	protected static $classArray=array();
	protected $extensionString = "";
	protected $allowDetail = false;
	protected $hasListLayout = false;
	protected static $extCount = 0;
	protected static $classCount = 0;

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
				static::$extArray[static::$extCount++]=$extension;
				static::$classArray[static::$classCount++]=get_class($this);	
			}elseif(is_array($extension)){
				for($i=0;$i<count($extension);$i++){
					static::$extArray[static::$extCount++]=$extension[$i];
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
		if(in_array($string, static::$extArray)){
			return true;
		}else{
			return false;
		}
	}
	public static function getClassName($string){
		if(static::exists($string)){
			return static::$classArray[array_search($string, static::$extArray)];
		}else{
			return false;
		}
	}
	public function getDetailCode($fileObj=false){
		return "no specific code defined";
	}
	public function getExtensionString(){
		return $this->extensionString;
	}
}
?>