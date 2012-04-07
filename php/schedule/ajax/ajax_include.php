<?php
define('CMSCONTENT',true);
include("../../login/User.php");
include("../../login/Login.php"); 
include("../db/DB.php");
include("../db/DBAppointment.php");
include("../db/DBUser.php");
session_start();

function printJSON($obj){
	header('Cache-Control: no-cache, must-revalidate');
	header('Content-type: application/json');
	echo json_encode($obj);
}

if (!Login::isLoggedIn()){
	die("access denied");
}