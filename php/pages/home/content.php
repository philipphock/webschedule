<?php
defined('CMSCONTENT') or die ('access denied');
$days=array("Mo","Di","Mi","Do","Fr","Sa","So");

?>
<br>

<div class="faketable">
	
	<div class="left">
		<div id="calendar"></div>
		<br>
		<a href="item.html">neu</a>    
	</div><!--left-->
	
	
	<div class="middle">
		<div class="faketable">
			
		<div id="appointments" class="td">
			<h3><time></time></h3>
			<ul>
				
			</ul>
		</div>
		
		<div id="notes" class="td">
			<h3><span id="name_detail"></span><a id="editLink"  href="" class="fadebtn">µ</a></h3>
			<p>Date: <time id="date_detail"></time></p>
			<p id="time_label">Time: <time id="time_detail"></time></p>
			<div id="details"></div>
		</div>
			
		</div>
	</div><!--middle-->
		
	<div class="right">
		<h3>Termine <span id="dayPrev"></span> Tage</h3>
		<ul id="nextApps">
			
		</ul>
		    
	</div><!--right-->
	
</div>





