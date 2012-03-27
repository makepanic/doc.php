<?php
class Layout{
	private static $head=array();
	public static function addScriptSrc($src){
		static::addHeadElement('<script src="'.$src.'"></script>',true);
	}
	public static function addStyleSrc($src){
		static::addHeadElement('<link rel="stylesheet" href="'.$src.'">',true);
	}
	public static function addScript($script){
		static::addHeadElement('<script>'.$script.'</script>',true);
	}
	private static function addHeadElement($src,$ifExists=false){
		if(is_string($src)){
			if(($ifExists && array_search($src,static::$head)===false) || !$ifExists){
				array_push(static::$head, $src);
			}
		}
	}
	public static function getBakedHead(){
		$buff="";
		foreach(static::$head as $value){
			$buff.=$value;
		}
		return $buff;
	}
}
?>