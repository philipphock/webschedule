(function(){
	$("#viewnav").buttonset();
	$( "#calendar" ).datepicker({ autoSize: true,dateFormat: 'dd-mm-yyyy' });
	$("#calendarView>div").not(":first-child").hide();
})();
