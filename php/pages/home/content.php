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
			<h3>31.03.2012</h3>
			<ul>
				<li>9:30 Uhr
					<ul>
						<li>Termin <a  class="fadebtn">x</a></li>
						<li>Termin <a  class="fadebtn">x</a></li>
					</ul>
				</li>
				<li>10:30 Uhr
					<ul>
						<li>Termin <a  class="fadebtn">x</a></li>
						<li>Termin <a  class="fadebtn">x</a></li>
					</ul>
				</li>
				
			</ul>
		</div>
		
		<div id="notes" class="td">
			<h3>Termin <a  href="item.html?ap=20"class="fadebtn">µ</a></h3>
			
			<p>Date: </p>
			<p>Note: </p>
		</div>
			
		</div>
	</div><!--middle-->
		
	<div class="right">
		<h3>Termine</h3>
		<ul>
			<li>30.03.2012
				<ul>
					<li>Termin <a  class="fadebtn">x</a></li>
					<li>Termin <a  class="fadebtn">x</a></li>
				</ul>
			</li>
			
			<li>30.03.2012
				<ul>
					<li>Termin <a  class="fadebtn">x</a></li>
					<li>Termin <a  class="fadebtn">x</a></li>
				</ul>
			</li>
		</ul>
		    
	</div><!--right-->
	
</div>





