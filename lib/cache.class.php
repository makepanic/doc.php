<?php
class Cache{
	private static $dir='cache/';

	public static function getCachedFile($name){
		return LIB.static::$dir.str_replace("/", ".", $name);
	}
	public static function wasCached($name,$timeout=0){
		$cachename=LIB.static::$dir.str_replace("/", ".", $name);
		if(file_exists($cachename)){
			#echo "timeout:".$timeout." ".(time()-filemtime(LIB.static::$dir.$cachename));
			if(time()-filemtime($cachename)>$timeout){
				return false;
			}else{
				return true;
			}
		}else{
			return false;
		}
	}
	public static function cacheFile($name,$input){
		$cachename=str_replace("/", ".", $name);
		$fp = fopen(LIB.static::$dir.$cachename, 'w'); 
		fwrite($fp, $input);
	    fclose($fp);
	}
}
?>