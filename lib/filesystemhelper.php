<?php

class FileSystemHelper{
  //splits requestpath to dir array
  public static function makePath($pathArray){
    $pathString = "";
    foreach ($pathArray as $value) {
      $pathString .= $value;
    }
    $pathArray = explode("/", $pathString);
    $pathArray = static::removeUnwanted($pathArray);
    return new Path($pathArray);
  }
  public static function removeUnwanted($pathArray){
    $unwanted = array("..");
    foreach ($pathArray as &$value){
      if(in_array($value, $unwanted)){
        $value = "";
      }
    }
    return $pathArray;
  }
  public static function makePathLink($path){
    $pathArray = $path->toArray();
    if(!$path->isFile()){
      array_pop($pathArray);
    }
    $pathCount = count($pathArray);
    $string = '<li><a href="'.ROOT_FILE.'/">home</a></li>';

    if($pathCount < MAX_NAV){
      $i = 0;
    }else{
      $i = $pathCount - MAX_NAV;
      $string .= '<li><a>...</a></li>';
    }
    for ($i; $i < $pathCount; $i++) { 
      $name = $pathArray[$i];

      if($path->isFile() && $i+1 == $pathCount){
        $url = static::linkTo($path, $i + 1, true);
      }else{
        $url = static::linkTo($path, $i + 1);
      }
      $string .= '<li><a title="'.$name.'" href="'.$url.'">'.$name.'</a></li>';
    }

    return $string;
  }
  public static function linkTo($path, $depth, $noSlash = false){
    $link = ROOT_FILE . (HTACCESS ? '/' : '');
    $pathArray = $path->toArray();
    for ($i=0; $i < $depth; $i++) {
      if($i + 1 == $depth && $noSlash){
        $link .= $pathArray[$i];
      }else{
        $link .= $pathArray[$i].'/';
      }
    }
    return $link;
  }
}