function Calendar(){}

Calendar.getAppointment = function(id,callback){
	$.ajax({
	  type: 'POST',
	  url: "php/schedule/ajax/appointments.php",
	  data: {cmd:"appId",id:id},
	  success: callback,
	  dataType: "json"
	});
}

Calendar.getAppointmentsOfMonth = function(year,month,callback){
	month = (month<10)?"0"+month:""+month;
	$.ajax({
	  type: 'POST',
	  url: "php/schedule/ajax/appointments.php",
	  data: {cmd:"appRange",start:year+month+"01",stop:year+month+"31"},
	  success: callback,
	  dataType: "json"
	});
}

Calendar.getAppointmentsInRange = function(start,stop,callback){
	$.ajax({
	  type: 'POST',
	  url: "php/schedule/ajax/appointments.php",
	  data: {cmd:"appRange",start:start,stop:stop},
	  success: callback,
	  dataType: "json"
	});
}
Calendar.deleteAppointment = function(id,callback){
	$.ajax({
	  type: 'POST',
	  url: "php/schedule/ajax/appointments.php",
	  data: {cmd:"del",id:id},
	  success: callback,
	  dataType: "json"
	});
}
