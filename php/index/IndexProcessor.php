<?php


class IndexProcessor{
	private static $home="home";
	
	static function loadCSS($pageID,$style="default"){
		$res=PathHelper::getPages($pageID);
		if($res){
			$a=PathHelper::getFileList($res->getDir()."/css/".$style,$res->getUrl()."/css/".$style);
			foreach ($a as $cssUrl){
				echo  "<link rel='stylesheet' href='$cssUrl' />\n"; 
			}
		}
	}
	
	static function getPageID(){
		//TODO SAFETY

		if(!isset($_GET["id"])){
			return IndexProcessor::$home;
		}
		
		if(strstr($_GET["id"], '..')){
			return IndexProcessor::$home;
		}
		$safe=htmlspecialchars($_GET["id"]);
		return $safe;
		
	}
	
	static function loadJS($pageID){
		$res=PathHelper::getPages($pageID);
		if($res){
			$a=PathHelper::getFileList($res->getDir()."/js",$res->getUrl()."/js");
			foreach ($a as $jsUrl){
				echo "<script src='$jsUrl'></script>\n";
			}
		}
	}
	
	static function loadContent($pageID){
		$c=PathHelper::getPages($pageID);
		if($c){
			include $c->getDir()."/content.php";
		}
	}
	
	static function getInfo($id){
		$c=PathHelper::getPages($id);
		if($c){
			include $c->getDir()."/meta.php";
			$ret=new MetaInfo();
			return $ret;
		}
		
	}
	
	
	
}

class PathHelper{
		
	static $basedir;
	static $appdir;
	
	static function setBaseDir($baseDir){
		PathHelper::$basedir=$baseDir;
	}
	
	static function getBaseDir(){
		return PathHelper::$basedir;
	}
	
	static function getAppRoot(){
		return PathHelper::$appdir;
	}
	static function setAppRoot($appDir){
		PathHelper::$appdir=$appDir;
	}
	
	
	static function getPages($id=null){
		
		$pagesDir=PathHelper::getBaseDir()."/php/pages";
		$pagesUrl="php/pages";
		
		$pageDir=$pagesDir."/".$id;
		$pageUrl=$pagesUrl."/".$id;
		
		$ret = new Resource($pagesDir,$pagesUrl);
		

		
		if($id!=null){
			if(!is_file($pageDir) && file_exists($pageDir)){
				$ret->setDir($pageDir);
				$ret->setUrl($pageUrl);
				return $ret;
			}else{
				return false;
			}
		}else{
			return $ret;
		}
	}
		

	static function getFileList($path,$root){
		$ret=array();
		if ($handle = opendir($path)){
			while (false !== ($file = readdir($handle))) {
			 	if($file=="." || $file == "..")continue;
			 	
			 	if(is_file($path."/".$file)){
			 		$ret[] = $root."/".$file;
			 	}else{
			 		return array_merge($ret,PathHelper::getFileList($path."/".$file, $root));
			 		
			 	}
				
			}
		
			closedir($handle);
		}
		return $ret;
	}

}

class Resource{
	private $url;
	private $dir;
	
	
	
	public function __construct($url="",$dir=""){
		$this->setUrl($url);
		$this->setDir($dir);
	}
	public function getUrl(){
		return $this->url;
	}
	public function setUrl($url){
		$this->url=$url;
	}
	
	public function getDir(){
		return $this->dir;
	}
	public function setDir($dir){
		$this->dir=$dir;
	}
}


?>