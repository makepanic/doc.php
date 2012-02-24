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
	public static function isImageFile($extension){
		$special = false;
		if(strlen($extension)>0){
			if(!(strpos(IMAGES, $extension)===false)){
				$special = true;
			}
		}
		return $special;
	}
	public static function isOpenFile($extension){
		$special = false;
		if(strlen($extension)>0){
			if(!(strpos(OPEN_FILES, $extension)===false)){
				$special = true;
			}
		}
		return $special;
	}
	private static function loadFolder($path){
		$dir=scandir($path->getFullString(true));
		$folderArray=array();
		for($i=2;$i<count($dir);$i++){
			array_push($folderArray, new File($path->getPath(),$dir[$i]));
		}
		return $folderArray;
	}
	private static function loadFile($path){
		$content = null;
		if(isset($_GET['file'])){
			$content = static::openFile($path);
		}
		return $content;
	}
	private static function openFile($filePath){
			$pathStr=$filePath->getFullString(true);
			$fhandle=fopen($pathStr,"r");
			$filesize=filesize($pathStr);
			if($filesize>0){
				$content=fread($fhandle,$filesize);
			}else{
				$content="Datei leer";
			}
		return $content;
	}
	public static function loadObj($path){
		if($path){
			$pathStr=$path->getPathString().$path->getName();
			$pathType=$path->getType();
			if($pathType==0){
				//ist Ordner
				return static::loadFolder($path);
			}elseif($pathType==1){
				//ist Datei
				return static::loadFile($path);
				//static::openFile();
			}else{
				die($pathStr." not found");
			}
		}
	}
	public static function parseGET(){
		$path=array();
		if(isset($_GET['0']) && !isset($_GET['file'])){
			//Keine Datei
			$arrLength=count($_GET);
			for($i=0;$i<$arrLength;$i++){
				$get=$_GET[$i];
				if(($get==".." || $get==".") && !DOTDOT)die ("no DOTS allowed");
				array_push($path, $_GET[$i]);
			}
			$path=new File($path,"");
		}elseif(isset($_GET['file'])){
			//ist Datei
			$arrLength=count($_GET);
			if($arrLength>=1){
				for($i=0;$i<$arrLength-1;$i++){
					if(isset($_GET[$i]) && !empty($_GET[$i])){
						if($_GET[$i]==".." && !DOTDOT)die ("no .. allowed");
						array_push($path, $_GET[$i]);
					}
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