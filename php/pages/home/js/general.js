
(function(){
	
	$( "#calendar" ).datepicker({ 
		dateFormat: 'yymmdd',
		onSelect: dateSelected,
		onChangeMonthYear: onChangeMonthYear
	 });
	$( "#calendar" ).datepicker($.datepicker.regional['de'] );
	
	
})();

function dateSelected(dateText,obj){
	
	$.ajax({
	  type: 'POST',
	  url: "php/schedule/ajax/appointments.php",
	  data: {cmd:"appRange",start:dateText,stop:dateText},
	  success: dateRecv,
	  dataType: "json"
	});
}
function onChangeMonthYear(year, month, inst){
	month = (month<10)?"0"+month:""+month;
	
	
	$.ajax({
	  type: 'POST',
	  url: "php/schedule/ajax/appointments.php",
	  data: {cmd:"appRange",start:year+month+"01",stop:year+month+"31"},
	  success: monthRecv,
	  dataType: "json"
	});
}

function dateRecv(apps){
	console.log(apps);
}
function monthRecv(apps){
	console.log(apps);
}
