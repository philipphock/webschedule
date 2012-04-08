<?php
defined('CMSCONTENT') or die ('access denied');

if (isset($_GET['edit']) || isset($_GET['new'])){
	$dba = new DBAppointment();
	preg_match('/^(\\d\\d).(\\d\\d).(\\d\\d\\d\\d)$/', $_GET['date'], $datematches);
	preg_match('/^(\\d\\d):(\\d\\d)$/', $_GET['time'], $timematches);
	
	
	if (count($datematches)==4){
		
		$date = $datematches[3] . $datematches[2] . $datematches[1];
		if (count($timematches)==3){
			$time = $timematches[1] . $timematches[2];	
		}else{
			$time = -1; 
		}
	}else{
		UiUtil::error("date format error","item.html");
	} 	

	if (isset($_GET['edit'])){
		$appointment = new Appointment($_GET['apid'], $_GET['name'], $date, $time, $_GET['note'],false);
		try{
			$dba->editAppointment($appointment);
			UiUtil::success("Appointment changed","home.html",2);	
		}catch(Exception $e){
			UiUtil::error($e->getMessage(),"home.html");
		}	
		
	
	}else if (isset($_GET['new'])){
	
		try{
			$dba->createAppointment($_GET['name'],$date,$time,$_GET['note']);
			UiUtil::success("Appointment created","home.html",2);	
		}catch(Exception $e){
			UiUtil::error($e->getMessage(),"home.html");
		}	
	}		
	
}else if (isset($_GET['ap'])){
	$dba = new DBAppointment();
	$app=$dba->getAppointmentById($_GET['ap']);
	include "View_edit.php";
}else{
	include "View_new.php";
}
