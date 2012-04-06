<?php
defined('CMSCONTENT') or die ('access denied');

?>
<br>

<div class="faketable">
	
	<div class="left">
		<nav id="calendar">
		CAL
		</nav>	
	</div><!--left-->
	
	<div class="middle">
		<nav id="viewnav" class="horizontalNav">
		
			<input type="radio" id="viewNavMonth" name="viewNavRadio" /><label for="viewNavMonth">Monat</label>
			<input type="radio" id="viewNavWeek" name="viewNavRadio" /><label for="viewNavWeek">Woche</label>
			<input type="radio" id="viewNavDay" name="viewNavRadio" /><label for="viewNavDay">Tag</label>

		</nav>
		<div id="calendarView"></div>
	</div><!--middle-->
	
	<div class="right">
		<div id="nextTerm">
			<ul>
				<li><span>31.03.2012</span>Termin</li>
				<li><span>31.03.2012</span>Termin</li>
			</ul>	
		</div>
	</div><!--right-->
	
</div>





