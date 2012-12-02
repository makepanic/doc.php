<?php

/**
* 
*/
class Util
{
  public static function log($stuff){
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
  }
  public static function e($stuff){
    if(is_bool($stuff)){
      echo "<br/>".($stuff ? "true" : "false")."<br/>";
    }else{
      echo "<br/>".$stuff."<br/>";
    }
  }
}