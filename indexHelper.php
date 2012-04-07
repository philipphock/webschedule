<?php 
session_start();


include "php/index/IndexProcessor.php";
PathHelper::setBaseDir(__DIR__);

include "php/structure/first.php";
include "php/structure/nav.php";


$id=IndexProcessor::getPageID();

$info=IndexProcessor::getInfo($id);

if(!$info){
	$url=$_SERVER['PHP_SELF']."?id=404";
	header("Location: $url");
}
?>