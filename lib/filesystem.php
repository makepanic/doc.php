<?php

class DocPHP{
  private $path;
  private $content;
  private $name = '';

  public function __construct($path='')
  {
    $this->path = FileSystemHelper::makePath($path);

    if($this->path->isFile()){
      $this->loadFile();
    }else{
      $this->loadFolder();
    }
    $this->bakeTemplate();
  }

  private function loadFile(){
    $file = new File($this->path);
    $this->name = $file->getName();
    $this->content = $file->getContent();
    if($file->getExtension()){
      $this->content .= $file->getExtension()->getDownloadElement($file);
    }
  }
  private function loadFolder(){
    $pathString = $this->path->toFullString();
    $pathArray = $this->path->toArray();
    if(count($pathArray)-2 > -1){
      $this->name = $pathArray[count($pathArray)-2];
    }else{
      $this->name = "";
    }
    $this->name = strlen($this->name) > 0 ? $this->name : DOC_TITLE;
    $dir = scandir($pathString);
    natcasesort($dir);
    $dir=array_values($dir);
    $listItems = array();

    if(count($pathArray) > 0 && strlen($pathArray[0]) > 0){

      if(count($pathArray) - 2 > -1){
        $href = FileSystemHelper::linkTo($this->path, count($pathArray) - 2);     
      }else{
        $href = ROOT_FILE;    
      }

      array_push($listItems, '<li class="jump"><a href="' . $href .'">..</a></li>');
    }

    for ($i=2; $i < count($dir); $i++) {
      $pathArray = array('path' => $this->path->toString() . $dir[$i]);
      $path = FileSystemHelper::makePath($pathArray);
      $file = new File($path);
    
      $typeString = $file->getTypeString();
      if($file->hasListStyle()){
        array_push($listItems, '<li class="' . $typeString . '">'.$file->getListStyle().'</li>');
      }else{
        $path = $file->getPath();
        $url = FileSystemHelper::linkTo($path, count($path->toArray()), $path->isFile());
        $name = $file->getName() . (SHOW_EXTENSIONS ? $file->getFileType() : '');
        $text='<li class="'.$typeString.'"><span></span><a href="'.$url.'">'.$name.'</a></li>';
        array_push($listItems, $text);
      }
    }

    $this->content = '<ul class="fm">' . implode("", $listItems) . "</ul>";
  }

  private function bakeTemplate(){
    $tpl = new Template(LIB."templates/main.template");
    $tpl->content = $this->content;
    $tpl->style = STYLE;
    $tpl->theme = THEME;
    $tpl->docTitle = DOC_TITLE;
    $tpl->navigation = FileSystemHelper::makePathLink($this->path);
    $tpl->head = Layout::getBakedHead();
    $tpl->script = '<script src="' . SCRIPT . '"></script>';
    $tpl->title = $this->name;
    echo $tpl;
  }
}