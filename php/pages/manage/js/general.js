(function(){
	
})();

function deleteApp(id){
	Calendar.deleteAppointment(id,function(){
		window.location.reload();
	});
}
