<?php
defined('CMSCONTENT') or die ('access denied');


$c=PathHelper::getPages("export");

if($c){
		
	$nopage=base64_encode ($c->getDir() . "/exporting.php");
	
	include("View_export.php");
	

	
}else{
	echo "really serious error occured";
}


