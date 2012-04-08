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
			<p>Time: <time id="time_detail"></time></p>
			<div id="details"></div>
		</div>
			
		</div>
	</div><!--middle-->
		
	<div class="right">
		<h3>Termine</h3>
		<ul>
			<li><time>30.03.2012</time>
				<ul>
					<li><a>Termin</a> <a  class="fadebtn">x</a></li>
					<li><a>Termin</a> <a  class="fadebtn">x</a></li>
				</ul>
			</li>
			
			<li><time>30.03.2012</time>
				<ul>
					<li><a>Termin</a> <a  class="fadebtn">x</a></li>
					<li><a>Termin</a> <a  class="fadebtn">x</a></li>
				</ul>
			</li>
		</ul>
		    
	</div><!--right-->
	
</div>





