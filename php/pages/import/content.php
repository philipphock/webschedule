
	<div class="centerbox_outer">
		<div class="centerbox_inner">
<?php
defined('CMSCONTENT') or die ('access denied');



include("simple_ical_parser.php");

$parser = new IcalParser();

if (!isset($_POST['upload'])){
	include("View_import.php");
}else{
	if ($_FILES["file"]["error"] > 0){
  		echo "Error: " . $_FILES["file"]["error"] . "<br />";
  	}else{
  		
		if ($_FILES["file"]["size"] / 1024 > 4096){
			die ("<p>only files less than 4mb are allowed to upload</p>");
		}
		
		$lines = file($_FILES["file"]["tmp_name"]);
		
		$apts=null;
		try{
				
			$apts=$parser->parse($lines);
			
			echo "<ol><li>parsing calendar data successful and complete</li>";
			
			$dba = new DBAppointment();
			
			
			foreach ($apts as $key => $value) {
				$dba->createAppointment($value->getName(), $value->getDate(), $value->getTime(), $value->getNote());
				echo "<li>appointment " . $value->getName() . " added</li>";
			}
			
			echo "<li>Import complete</li></ol>";
		}catch(Exception $error){
			die("error parsing calendar file on line $error->parseLine : $error->msg");
		}

			
  }
}
?>
</div></div>
