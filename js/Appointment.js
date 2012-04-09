function Appointment(json){
	var self = this;
	self.json = json;
	
	self.getTime =function(){
		var time = self.json.time+"";
		if (time==-1){
			return false;
		}else{
			while(time.length<4){
				time="0"+time;
			}	
		}
			
		return time.substr(0,2)+":"+time.substr(2,2);
	}
	self.getDate = function(){
		var date = self.json.date+"";
		return date.substr(6,2)+"."+date.substr(4,2)+"."+date.substr(0,4);
	}
	self.getJSON = function(){
		return self.json;
	}
	self.getDay = function(){
		var date = self.json.date+"";
		return date.substr(6,2);
	}
	
	
}
