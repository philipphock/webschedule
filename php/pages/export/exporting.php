<?php
defined('CMSCONTENT') or die ('access denied');

header("Content-Type: text/plain");
header("Content-Disposition: attachment; filename=\"schedule.ics\"");  
//define VCALBODY
$vcalbody0 = "BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//philipphock.de/NONSGML Schedule v1.0//EN";
$vcalbody1="
END:VCALENDAR";


/**
 * @return string vcal string of an appointment
 */
function getEventString($name,$date,$time,$descr){
if (!preg_match("/^[0-9]+$/", $time)){
	$time="0000";
}

while (strlen($time) < 4){
	$time="0".$time;
}
$descr = mysql_real_escape_string($descr);
$dtstart = $date . "T" . $time . "00Z";
 
return"
BEGIN:VEVENT
DTSTART:$dtstart
SUMMARY:$name
DESCRIPTION:$descr
END:VEVENT";

//DURATION:PT1H
}

      
$dba = new DBAppointment();
      
$apts = $dba->getAppointmentFilter(new Filter(false,false,false,false));

echo $vcalbody0;
foreach ($apts as $key => $value) {
	echo getEventString($value->getName(),$value->getDate(),$value->getTime(),$value->getNote());
}   
echo $vcalbody1;   
