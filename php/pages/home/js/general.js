var datepicker_shown_year;
var datepicker_shown_month;
var datepicker_date;

var nextApps = null;
var monthApps=null;
var curApps=null;
var curApp=null;
var dayPrev = 7;

//init
(function(){
	//init calendar
	$( "#calendar" ).datepicker({ 
		dateFormat: 'yymmdd',
		onSelect: dateSelected,
		onChangeMonthYear: onChangeMonthYear
	 });
	$( "#calendar" ).datepicker($.datepicker.regional['de'] );
	
	if ($("#setdate").length>0){
		datepicker_date = $("#setdate").val();
		datepicker_shown_year = datepicker_date.substr(0,4); 
		datepicker_shown_month = datepicker_date.substr(4,2);
		
	}else{
		var date = new Date();
		datepicker_shown_year = date.getFullYear(); 
		datepicker_shown_month = date.getMonth()+1;
		var month = datepicker_shown_month<10?"0"+datepicker_shown_month:""+datepicker_shown_month;
		var day = (date.getDate())<10?"0"+(date.getDate()):""+(date.getDate());
		datepicker_date = datepicker_shown_year+month+day;
	}
	
	if ($("#setapp").length>0){
		getAppointment($("#setapp").val());
	}
	
	
	pullModel();
	$("#notes").hide();
	$("#dayPrev").text(dayPrev);
	
})();


//commands
function getAppointment(id){
	Calendar.getAppointment(id,appRecv);
}


function deleteApp(id){
	curApp=null;
	Calendar.deleteAppointment(id,function(){
		pullModel();
	});
	
}

function getNextAppointments(){
	var todayDate = new Date();
	var nextDate = new Date(Date.parse(todayDate)+dayPrev*1000*60*60*24);
	
	var today = dateToYYYYMMDD();
	nextDate = dateToYYYYMMDD(nextDate);
	Calendar.getAppointmentsInRange(today,nextDate,nextAppsRecv);
	
}

function updateUI(){
	$("#notes").hide();
	$("#nextApps li").remove();
	$( "#calendar" ).datepicker("refresh");
	$("#appointments>h3>time").text(datepicker_date.substr(6,2)+"."+datepicker_date.substr(4,2)+"."+datepicker_date.substr(0,4));
	
	//update calendar
	
	if (monthApps){
		//update months
		for (var i = 0;i<monthApps.length;i++){
	  		var day = parseInt(monthApps[i].getDay(),10);
	  			
	  		$("#calendar a:contains("+day+")").each(function(k,v){
	  			var $v = $(v);
	  			if ($v.text() == day){
	  				$v.addClass("appDay");
	  			}
	  		});
	  	}
	
	}
	  	
  	if (curApps != null){
	  	//update date
	  	$("#appointments>ul>li").remove()
		var appList = $("#appointments>ul");
	  	for (var i = 0;i< curApps.length;i++){
	  		if (i == 0){
				
	  			if (curApp == null){
	  				console.log(">",curApp);
	  				curApp = curApps[i];
	  			}
	  		}
	  		appList.append("<li>"+getAppLink(curApps[i],true)+"</li>");
	  	}
	}
	//update app
	if (curApp != null){
		
		$("#editLink").attr("href","item.html?ap="+curApp.json.id);
		$("#details").html("");	
		$("#details").html(curApp.json.note);
		var time = curApp.getTime();
		$("#time_detail").html(time);
		if (!time){
			$("#time_label").hide();	
		}else{
			$("#time_label").show();
		}
		
		$("#date_detail").html(curApp.getDate());
		$("#name_detail").html(curApp.json.name);
		$("#notes").show();
	}
	
	//nextApps
	
	if (nextApps != null){
		
		var $next = $("#nextApps");
		for (var i = 0;i<nextApps.length;i++){
			$next.append("<li>"+getAppLink(nextApps[i],false,true)+"</li>");
		}
	}
}

function pullModel(noreset){
	if (!noreset){
		//reset cache
		monthApps=null;
		curApps=null;
		
		nextApps = null;	
	}
	
	
	//getAppointmentsOfMonth
	Calendar.getAppointmentsOfMonth(datepicker_shown_year,datepicker_shown_month,monthRecv);
	//getAppointmentsOfSelected
	Calendar.getAppointmentsInRange(datepicker_date,datepicker_date,function(e){
				dateRecv(e);
	});
	getNextAppointments();
}
//ajax callbacks

function dateRecv(apps){
	apps = toApp(apps);
	curApps = apps;
	updateUI();
}

function monthRecv(apps){
	apps = toApp(apps);
	monthApps = apps;
	updateUI(true);
}
function appRecv(ap){
	console.log(ap);
	curApp=toApp(ap);
	updateUI();
}
function nextAppsRecv(apps){
	nextApps = toApp(apps);
	updateUI();
}

//user input callbacks
function dateSelected(dateText,obj){
	dateText=dateText+"";
	datepicker_date = dateText;
	curApp=null;
	pullModel();
}

function onChangeMonthYear(year, month, inst){
	datepicker_shown_year = year
	datepicker_shown_month = month;
	//month = (month<10)?"0"+month:""+month;
	pullModel();
}

//util
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

function dateToYYYYMMDD(date){
	date=(date)?date:new Date();
	
	var month = date.getMonth()+1;
	month = (month<10)?"0"+month:""+month;
	var day = date.getDate();
	var day = day<10 ? "0"+day : ""+day; 
	var year = date.getFullYear();
	
	return year+month+day;
	
	 
}

function getAppLink(app,showtime,showdate){
	var time = app.getTime();
	
	if (time && showtime){
		time = time + ": ";
	}else{
		time="";
	}
	
	var date = "";
	
	if (showdate){
		date = app.getDate() +": ";
	}
	return "<a href='javascript:getAppointment("+app.json.id+")'>"+date+time+app.json.name+"</a> <a href=\"javascript:deleteApp("+app.json.id+")\" class=\"fadebtn\">x</a>";
}
