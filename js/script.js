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


function DateUtil(){}
DateUtil.days = ["Mo","Di","Mi","Do","Fr","Sa","So"];

DateUtil.YYYYMMDD = function(d){
		var date = new Date();
		date.setFullYear(d.substr(0,4));
		date.setMonth(parseInt(d.substr(4,2),10)-1);
		date.setDate(parseInt(d.substr(6,2),10));
		date.setHours(12);
		return date;	
}

DateUtil.DDMMYYYY = function(d){
		var date = new Date();
		date.setFullYear(d.substr(6,4));
		date.setMonth(parseInt(d.substr(3,2),10)-1);
		
		date.setDate(parseInt(d.substr(0,2),10));
		date.setHours(12);
		return date;	
}
DateUtil.parse = function(date,format){
	var now = new Date();
	format = format?format:DateUtil.DDMMYYYY;
	var pdate = format(date);
	var isToday = "";
	if (pdate.getDate() == now.getDate() && pdate.getMonth() == now.getMonth() && pdate.getFullYear() == now.getFullYear()){
		isToday = " (heute)";
	}
	var pdateDay = pdate.getDay()-1;
	if (pdateDay == -1) pdateDay = 6 
	return DateUtil.days[pdateDay] + " " + date + isToday;
}	




















