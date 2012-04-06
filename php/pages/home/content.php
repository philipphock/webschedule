<?php
defined('CMSCONTENT') or die ('access denied');

?>
<br>

<div class="faketable">
	
	<div class="left">
		<table>
			<tr>
				<td><strong>Today:&nbsp;&nbsp;</strong></td>	
				<td id="today">31.03.2012</td>
			</tr>
			<tr>
				<td><strong>Selected:&nbsp;&nbsp;</strong></td>	
				<td id="selday">31.03.2012</td>
			</tr>
			
		</table>
		<br>
		<div id="calendar">
		
		</div>	
	</div><!--left-->
	
	<div class="middle">
		<nav id="viewnav" class="horizontalNav">
		
			<input type="radio" id="viewNavMonth" name="viewNavRadio" checked="checked"/><label for="viewNavMonth">Monat</label>
			<input type="radio" id="viewNavWeek" name="viewNavRadio" /><label for="viewNavWeek">Woche</label>
			<input type="radio" id="viewNavDay" name="viewNavRadio" /><label for="viewNavDay">Tag</label>

		</nav>
		<div id="calendarView">
			<div id="monthView">
				<h3 id="monthLabel">April</h3>
			</div>
			
			<div id="weekView">
				<h3 id="weekLabel">42</h3>
			</div>
			
			<div id="dayView">
				<h3 id="dayLabel">Friday</h3>
			</div>
			
			
			
		</div>
	</div><!--middle-->
	
	<div class="right">
		<h2 id="today">Termine</h2>
		<div id="nextTerm">
			<ul>
				<li><span>31.03.2012</span>Termin</li>
				<li><span>31.03.2012</span>Termin</li>
			</ul>	
		</div>
	</div><!--right-->
	
</div>





