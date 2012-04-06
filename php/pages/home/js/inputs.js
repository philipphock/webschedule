(function(){
	$("#viewnav>label").click(function(e){
		var elem = ($(this).index()-1) / 2;
		
		$("#calendarView>div").hide();
		$("#calendarView>div").eq(elem).show();
		
	});
})();
