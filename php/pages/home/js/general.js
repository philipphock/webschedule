
(function(){
	$("#viewnav").buttonset();
	$( "#calendar" ).datepicker({ 
		dateFormat: 'dd-mm-yy',
		onSelect: dateSelected
	 });
	$( "#calendar" ).datepicker($.datepicker.regional['de'] );
	
	
})();

function dateSelected(dateText,obj){
	console.log(obj);
}