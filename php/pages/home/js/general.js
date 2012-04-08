var datepicker_shown_year;
var datepicker_shown_month;
var datepicker_date;

var monthApps=null;
var curApps=null;
var curApp=null;


//init
(function(){
	//init calendar
	$( "#calendar" ).datepicker({ 
		dateFormat: 'yymmdd',
		onSelect: dateSelected,
		onChangeMonthYear: onChangeMonthYear
	 });
	$( "#calendar" ).datepicker($.datepicker.regional['de'] );
	
	var date = new Date();
	datepicker_shown_year = date.getFullYear(); 
	datepicker_shown_month = date.getMonth()+1;
	
	var month = datepicker_shown_month<10?"0"+datepicker_shown_month:""+datepicker_shown_month;
	var day = (date.getDay()+1)<10?"0"+(date.getDay()+1):""+(date.getDay()+1);
	datepicker_date = datepicker_shown_year+month+day;
	pullModel();
	$("#notes").hide();
	
})();


//commands
function getAppointment(id){
	Calendar.getAppointment(id,appRecv);
}


function deleteApp(id){
	Calendar.deleteAppointment(id,function(){
		
	});
	
}

function updateUI(){
	$("#notes").hide();
	$("#appointments>h3>time").text(datepicker_date.substr(6,2)+"."+datepicker_date.substr(4,2)+"."+datepicker_date.substr(0,4));
	
	//update months
	for (var i = 0;i<monthApps.length;i++){
  		var day = parseInt(monthApps[i].getDay());
  		  		
  		$("#calendar a:contains("+day+")").each(function(k,v){
  			var $v = $(v);
  			if ($v.text() == day){
  				$v.addClass("appDay");
  			}
  		});
  	}
  	
  	if (curApps != null){
	  	//update date
	  	$("#appointments>ul>li").remove()
		var appList = $("#appointments>ul");
	  	for (var i = 0;i< curApps.length;i++){
	  		if (i == 0){
	  			//getAppointment(curApps[i].json.id);
	  			if (curApp == null){
	  				curApp = curApps[i];
	  			}
	  		}
	  		appList.append("<li><a href='javascript:getAppointment("+curApps[i].json.id+")'>"+curApps[i].getTime()+": "+curApps[i].json.name+"</a> <a href=\"javascript:deleteApp("+curApps[i].json.id+")\" class=\"fadebtn\">x</a></li>");
	  	}
	}
	//update app
	if (curApp != null){
		
		$("#editLink").attr("href","item.html?ap="+curApp.json.id);
		$("#details").html("");	
		$("#details").html(curApp.json.note);
		$("#time_detail").html(curApp.getTime());
		$("#date_detail").html(curApp.getDate());
		$("#name_detail").html(curApp.json.name);
		$("#notes").show();
	}
}

function pullModel(){
	//reset cache
	monthApps=null;
	curApps=null;
	curApp=null;
	
	//getAppointmentsOfMonth
	Calendar.getAppointmentsOfMonth(datepicker_shown_year,datepicker_shown_month,monthRecv);
	//getAppointmentsOfSelected
	Calendar.getAppointmentsInRange(datepicker_date,datepicker_date,function(e){
				dateRecv(e);
				//onChangeMonthYear(datepicker_shown_year,datepicker_shown_month);
	});
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
	updateUI();
}
function appRecv(ap){
	curApp=toApp(ap);
	updateUI();
}


//user input callbacks
function dateSelected(dateText,obj){
	dateText=dateText+"";
	datepicker_date = dateText;
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