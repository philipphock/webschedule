
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
}
function onChangeMonthYear(year, month, inst){
	console.log(month);
}