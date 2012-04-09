var selbtn_selected = true;
(function(){
	$("#selall").click(function(e){
		e.preventDefault();
		$(".selbtn").attr("checked",selbtn_selected);
		if (selbtn_selected){
			$("#selall").text("x");	
		}else{
			$("#selall").text("✔");
		}
		selbtn_selected = !selbtn_selected;		
	});
		
})();

function deleteApp(id){
	Calendar.deleteAppointment(id,function(){
		window.location.reload();
	});
}
