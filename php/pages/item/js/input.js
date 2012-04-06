(function(){
	
	
	
	$("input[name=date]").datepicker({ 
		dateFormat: 'dd.mm.yy'
	 });
	$("input[name=date]").datepicker($.datepicker.regional['de'] );
	
})();
