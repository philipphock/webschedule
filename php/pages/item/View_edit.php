
<form>
	<div class="centerbox_outer">
		<div class="centerbox_inner">
			<h1>Edit Appointment</h1>
			
			<form method="get">
			<label for="title">Title:</label>
			<input required="required" name="title" type="text" autofocus="autofocus"/>
			<br>
			<label for="date">Date:</label>
			<input required="required" name="date" type="date" />
			<br>
			
			<label for="time">Time:</label>
			<input name="time" type="time" />
			<br>
			<br>
			<label for="note">Note:</label>
			<textarea name="note"></textarea>
			
			<br>
			<br>
			<input type="hidden" name="edit" value="true" />
			<input type="submit" name="apsubmit" value="ok" /> <input type="submit" value="abort" id="abort" formnovalidate="formnovalidate" formaction="home.html">
			</form>
			

			
		</div>
	</div>	
</form>
<script>
var elem = document.querySelector("#abort");
elem.addEventListener("click",function(e){
	e.preventDefault();
	window.location.href="home.html";
},false);

</script>