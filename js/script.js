(function(){
	$("input.searchfield[type=text]").blur(function(e){
		$(this).val("search");
	});
	$("input.searchfield[type=text]").click(function(e){

		if ($(this).val() == "search"){
			$(this).val("");
		}
		
	});
})();






















