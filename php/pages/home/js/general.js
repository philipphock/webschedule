
(function(){
	
	$( "#calendar" ).datepicker({ 
		dateFormat: 'dd.mm.yy',
		onSelect: dateSelected,
		onChangeMonthYear: onChangeMonthYear
	 });
	$( "#calendar" ).datepicker($.datepicker.regional['de'] );
	
	
})();

function dateSelected(dateText,obj){
	console.log(obj);
	$.ajax({
	  type: 'POST',
	  url: "php/schedule/ajax/appointments.php",
	  data: {cmd:"status"},
	  success: dateRecv,
	  dataType: "json"
	});
}
function onChangeMonthYear(year, month, inst){
	console.log(month);
}

function dateRecv(data){
	
}
