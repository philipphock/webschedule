
(function(){
	$("#viewnav").buttonset();
	$( "#calendar" ).datepicker({ autoSize: true,dateFormat: 'dd-mm-yy' });
	$( "#calendar" ).datepicker($.datepicker.regional['de'] );
	
	$("#calendarView>div").not(":first-child").hide();
})();
