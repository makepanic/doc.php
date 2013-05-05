<?php
class File{
	private $name;
    private $extensionString=null;
    private $extension=null;
	private $path;
    private $fileType="";

    public function readFile(){
        $pathStr = $this->path->toFullString();
        $fhandle = fopen($pathStr,"r");
        $filesize = filesize($pathStr);
        if($filesize > 0){
            $content = fread($fhandle,$filesize);
        }else{
            $content = "empty file";
        }
        return $content;
    }

    public function getContent(){
        if($this->extension){
            return $this->extension->getDetailCode($this);
        }else{
            if(!is_null($this->extension) || strlen($this->extensionString) > 0){
                $src = $this->path->toFullString();
                $ext=htmlspecialchars($this->extensionString);
                $fullname=$this->name.".".$ext;
                return '<div class="markdown"><h2>'.$fullname.'</h2><p>Sorry I have no idea how to handle this file. Really need "<strong>.'.$ext.'</strong>" support? Send me a <a href="http://twitter.com/home?status=hey @makepanic , don\'t be lazy, add '.$ext.' support to doc.php">tweet</a></p></div><div class="center"><a class="download" href="'.$src.'">download "'.$fullname.'"</a></div>';
            }else{
                return '<div class="markdown"><p>Sorry i can\'t handle a file without file extension. Please make sure you didn\'t accidentally a extension.</p></div><div class="center"><a class="download" href="'.$this->path->toFullString(true).'">download "'.$this->name.'"</a></div>';
            }
        }
    }

	public function __construct($path){
		$this->path = $path;
        $this->parseFileString();
    }

    public function getPathTo($num){
    	$path="";
    	for($i=0;$i<$num+1;$i++){
    		$path.="/".$this->path[$i];
    	}
    	return $path;
    }
    private function parseFileString(){
        $location = $this->path->toFullString();
    	if($this->path->isFile()){            
            $this->extensionString = pathinfo($location, PATHINFO_EXTENSION);
            $this->name = pathinfo($location, PATHINFO_FILENAME);
            $this->fileType = "unknown";

            if(strlen($this->extensionString)>0){
                $className=Extension::getClassName($this->extensionString);
                if($className){
                    $this->extension=new $className();
                    $this->fileType=$this->extension->getExtensionString();
                }
            }
    	}else{
            $this->name = pathinfo($location, PATHINFO_FILENAME);
            $this->fileType = "folder";
    	}
    }
    public function getTypeString(){
        return $this->fileType;
    }
    public function getExtension(){
        return $this->extension;
    }
    public function getCacheTimeout(){
        return $this->extension->getCacheTimeout();
    }
    public function needToReadFile(){
        return $this->extension->readsFile();
    }
    public function getName(){
    	return $this->name;
    }
    public function getPath(){
    	return $this->path;
    }
    public function getPathString(){
    	return $this->pathString;
    }
    public function toFullPathString($linkable = false){
        return $this->path->toFullString($linkable);
    }
    public function getFileType(){
        $extString=((strlen($this->extensionString)>0)?".".$this->extensionString:"");
        return $extString;
    }
    public function getListStyle(){
        return $this->extension->getListStyle($this);
    }
    public function hasDetails(){
        if($this->fileType=="unknown"){
            return true;
        }else{
            return $this->extension->allowsDetails();
        }
    }
    public function getDetailCode(){
        return $this->extension->getDetailCode($this);
    }
    public function usesCache(){
        return $this->extension->usesCache();
    }
    public function hasListStyle(){
        if($this->extension && $this->extension->hasListLayout()){
                return true;
        }
        return false;
    }
}
?>
