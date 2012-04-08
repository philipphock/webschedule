<?php
include("ajax_include.php");

if (!isset($_POST['cmd'])){
	die("invalid action");
}

$dba = new DBAppointment();

if ($_POST['cmd'] == "appRange"){
	$apps = $dba->getAppointments($_POST['start'],$_POST['stop']);
	printJSON($apps);
}else if ($_POST['cmd'] == "status"){
	$arr = array ('status'=>"it works");
	printJSON($arr);
}else if ($_POST['cmd'] == "appId"){
	$ap = $dba->getAppointmentById($_POST['id']);
	printJSON($ap);
}else if ($_POST['cmd'] == "del"){
	$dba->deleteAppointment($_POST['id']);
	echo "";
}



