<h2>Search Results</h2>
<?php
defined('CMSCONTENT') or die ('access denied');

if (!isset($_GET["q"])){
	echo "<p>no results</p>";
}else{
	$dba = new DBAppointment();
	$apps = $dba->searchAppointments($_GET["q"]);
	
	if (count($apps)==0){
		echo "<p>no results</p>";
		
	}else{
		echo "<div id=\"results\"><ul>";
				
			foreach ($apps as $key => $value) {
				echo "<li><a href='home.html?date=".$value->getDate()."&app=".$value->getId()."'>" . $value->getFormattedDate() . ": " . $value->getName() . "</a></li>";
			}	
				
		echo "</div>";	
	}
		
}

?>



