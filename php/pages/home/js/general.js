
(function(){
	//init calendar
	$( "#calendar" ).datepicker({ 
		dateFormat: 'yymmdd',
		onSelect: dateSelected,
		onChangeMonthYear: onChangeMonthYear
	 });
	$( "#calendar" ).datepicker($.datepicker.regional['de'] );
	
	var date = new Date();
	onChangeMonthYear(date.getFullYear(),date.getMonth()+1,null);
	$("#notes").hide();
	
})();

function dateSelected(dateText,obj){
	$("#notes").hide();
	dateText=dateText+"";
	$("#appointments>h3>time").text(dateText.substr(6,2)+"."+dateText.substr(4,2)+"."+dateText.substr(0,4));
	$.ajax({
	  type: 'POST',
	  url: "php/schedule/ajax/appointments.php",
	  data: {cmd:"appRange",start:dateText,stop:dateText},
	  success: dateRecv,
	  dataType: "json"
	}).success(function(){
		//$( "#calendar" ).datepicker( "option", "disabled", false );
		onChangeMonthYear(obj.currentYear,obj.currentMonth+1);
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
	apps = toApp(apps);
	
	$("#appointments>ul>li").remove()
	var appList = $("#appointments>ul");
  	for (var i = 0;i< apps.length;i++){
  		appList.append("<li><a href='javascript:getAppointment("+apps[i].json.id+")'>"+apps[i].getTime()+": "+apps[i].json.name+"</a></li>");
  		$("#notes").show();
  	}
}

function monthRecv(apps){
	apps = toApp(apps);
	for (var i = 0;i<apps.length;i++){
  		var day = apps[i].getDay();  		
  		$("#calendar a:contains("+day+")").addClass("appDay");
  		
  	}
}

/**
 * makes an json App [array] to an Appointment [array]
 */
function toApp(json){
	if (json instanceof Array){
		for (var i = 0;i<json.length;i++){
	  		json[i] = new Appointment(json[i]);
	  	}	
	  	return json;
	}else{
		return new Appointment(json);
	}
}


function getAppointment(id){
	$.ajax({
	  type: 'POST',
	  url: "php/schedule/ajax/appointments.php",
	  data: {cmd:"appId",id:id},
	  success: idRecv,
	  dataType: "json"
	});
}

function idRecv(ap){
	console.log(ap);
	$("#details").html("");
	$("#details").append(ap.note);
	
}
