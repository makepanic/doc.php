<?php

class Wiki{
 	public static function makeLink($array,$num=null){
		$link=ROOT_FILE;
		if(defined(HTACCESS)&&HTACCESS){
			if(is_numeric($num)){
				$link.=".".$array->getPathTo($num);
			}else{
				$link.=$array;
			}
		}else{
			if(is_numeric($num)){
				$link.="?";
				for($i=0;$i<$num;$i++){
					$opt=$array->getPath($i);
					$link.=$i."=".$opt[$i]."&";
				}
			}else{
				$link.="?";
				$obj=$array->getPath();
				for($i=0;$i<count($obj);$i++){
					$link.=$i."=".$obj[$i]."&";
				}
				if($array->getType()==1)$link.="file=".$array->getName();
				elseif($array->getType()==0)$link.=$i."=".$array->getName();
			}
		}
		return $link;
	}
	private static function loadFolder($path){
		$dir=scandir($path->getFullString(true));
		$folderArray=array();
		for($i=2;$i<count($dir);$i++){
			array_push($folderArray, new File($path->getPath(),$dir[$i]));
		}
		return $folderArray;
	}
	public static function loadObj($path){
		if($path){
			$pathStr=$path->getPathString().$path->getName();
			$pathType=$path->getType();
			if($pathType==0){
				//is directory
				return static::loadFolder($path);
			}elseif($pathType==1){
				//is file
				if($path->getTypeString()=="file" || $path->needToReadFile()){
					//Read file if type = file
					return $path->getContent();
				}else{
					return null;
				}
			}else{
				Notification::Error($pathStr." not found");
			}
		}
	}
	private static function checkPush($array,$i){
		//check if $_GET[$i] exists and isn't empty
		if(isset($_GET[$i]) && !empty($_GET[$i])){
			if(strpos($_GET[$i],"..")===false){
				array_push($array, $_GET[$i]);
				return $array;
			}else{
				Notification::Error('Using ".." is not allowed.');
			}
		}
	}
	public static function parseGET(){
		$path=array();
		if(isset($_GET['0']) && !isset($_GET['file'])){
			//is directory
			$arrLength=count($_GET);
			for($i=0;$i<$arrLength;$i++){
				$path=static::checkPush($path,$i);
			}
			$path=new File($path,"");
		}elseif(isset($_GET['file'])){
			//is file
			$arrLength=count($_GET);
			if($arrLength>=1){
				for($i=0;$i<$arrLength-1;$i++){
					$path=static::checkPush($path,$i);
				}
			}
			$path=new File($path,$_GET['file']);
		}else{
			$path=new File("","");
		}
		return $path;
	}
}
?>