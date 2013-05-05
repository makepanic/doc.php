<?php

class Path{
  private $pathArray;
  private $pathString;
  private $isFile = false;

  public function __construct($pathArray)
  {
    $this->pathArray = $pathArray;
    $this->pathString = implode("/", $pathArray);
    $this->isFile = is_file(ROOT_DIR . '/' . $this->pathString);
  }

  public function toArray(){
    return $this->pathArray;
  }
  public function toString(){
    return $this->pathString;
  }
  public function getLast(){
    return $this->pathArray[count($this->pathArray) - 1];
  }
  public function isFile(){
    return $this->isFile;
  }
  public function toFullString($linkable = false){
    return ($linkable ? "/" . APP_FOLDER . "/" : "") . ROOT_DIR . "/" .  $this->pathString;
  }
}