<?php
include("ajax_include.php");

if (!isset($_POST['cmd'])){
	die("invalid action");
}


if ($_POST['cmd'] == ""){
	
}else if ($_POST['cmd'] == "status"){
	$arr = array ('status'=>"it works");
	printJSON($arr);
}



