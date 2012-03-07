<?php
class File{
	private $name;
	private $path;
	private $pathString;
    private $fileType=null;
	private $type=-1;
    private $fileString="";
    private $extension=null;

    public function readFile(){
        $pathStr=$this->getFullString(true);
        $fhandle=fopen($pathStr,"r");
        $filesize=filesize($pathStr);
        if($filesize>0){
            $content=fread($fhandle,$filesize);
        }else{
            $content="empty file";
        }
        return $content;
    }
    public function getContent(){
        if($this->extension){
            return $this->extension->getParsedContent($this);
        }else{
            return $this->readFile();
        }
        
    }
	public function __construct($path,$name){
		$this->name=$name;
		$this->path=$this->parsePath($path);
		$this->makeType();
    }
    public function getPathTo($num){
    	$path="";
    	for($i=0;$i<$num+1;$i++){
    		$path.="/".$this->path[$i];
    	}
    	return $path;
    }
    public function getFullString($root=false){
        $name="";
        if (strlen($this->name)>0)$name="/".$this->name;
    	return (($root)?ROOT_DIR:".").$this->pathString.$name;
    }
    private function makeType(){
    	$location=ROOT_DIR.$this->pathString."/".$this->name;
    	if(is_dir($location)){
    		$this->type=0;
    	}elseif(is_file($location)){
            $this->fileType=pathinfo($location, PATHINFO_EXTENSION);
    		$this->type=1;
            $this->makeFileString();
    	}else{
    		die("no valid object");
    	}
    }
    private function makeFileString(){
        if($this->type==1){
            //check if image file
            if(strlen($this->fileType)>0){
                //add filters for more filterstrings
                $className=Extension::getClassName($this->fileType);
                if($className){
                    $this->extension=new $className();
                    $this->fileString=$this->extension->getExtensionString();
                }else{
                    $this->fileString="file";
                }
            }else{
                $this->fileString="file";
            }
        }
    }
    private function getFileExtension($file_name){
        return substr(strrchr($file_name,'.'),1);
    }
    private function parsePath($path){
    	if(is_array($path)){
    		$string="";
    		for($i=0;$i<count($path);$i++){
    			$string.="/".$path[$i];
    		}
    		$this->pathString=$string;
			return $path;
		}elseif(is_string($path)){
			$this->pathString=$path;
			$tmp=explode("/",$path);
			$i=0;
			if($tmp[0]=="" || $tmp[0]=="."){
				$i=1;
			}
			$tmpArray=array();
			for($i;$i<count($tmp);$i++){
				array_push($tmpArray, $tmp[$i]);
			}
			return $tmpArray;
		}else die("no valid path format (array|string)");
    }
    public function getType(){
        return $this->type;
    }
    public function getTypeString(){
        switch ($this->type) {
            case 0:
                return "folder";
                break;
            case 1:
                return $this->fileString;
                break;
        }
        die("can't get filetype");
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
    public function getFileType(){
        return $this->fileType;
    }
    public function getListStyle(){
        return $this->extension->getListStyle($this);
    }
    public function hasDetails(){
        if($this->fileString=="file"){
            return true;
        }else{
            return $this->extension->allowsDetails();
        }
    }
    public function getDetailCode(){
        return $this->extension->getDetailCode($this);
    }
    public function hasListStyle(){
        if($this->extension){
            if($this->extension->hasListLayout()){
                return true;
            }
        }
        return false;
    }
}
?>
