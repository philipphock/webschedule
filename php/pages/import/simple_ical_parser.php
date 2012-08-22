<?php

	/**
	 * a simple ical parser
	 * not based on a automat  
	 */
class IcalParser{
	

	/**
	 * @return Appointment[] 
	 */	
	function parse(&$filecontentArray){
		$line = 1;
		$cevent = null;
		
		$ret = array();
		
		$left;
		$right;
		
		$LRpattern = '/^([A-Z]+)\:(.+)$/';
		
		//$validLeft = new array("DTSTART","SUMMARY","DESCRIPTION");
		
		foreach ($filecontentArray as $key => $value) {
			if ($value == "") continue;
			$value = trim($value);
			
			
			
			if ($line==1 && $value != "BEGIN:VCALENDAR"){
				
				throw $this->err($line,"file does not begin with BEGIN:VCALENDAR");
			}
			
			
			
			if (!preg_match('#^([A-Z]+)\:(.*)$#',$value, $matches)){
				
				throw $this->err($line,"format string is not &ltkey&gt;:&ltvalue&gt;");
			}else{
				$left= $matches[1];
				$right= $matches[2];				
			}
			
			//echo "$left : $right <br>";
			
			
			if ($value == "BEGIN:VEVENT"){
				$cevent = new Appointment(0, null, null, null, null,false);
				continue;
			}
			
			if ($cevent != null){
				if ($left == "SUMMARY"){
					$cevent->setName($right);
					continue;
				}
				
				if ($left == "DTSTART"){
					if (preg_match('/(\d{8})T(\d{4})\d\dZ/', $right,$mat)){
						$date=$mat[1];
						$time=intval($mat[2]);
						if ($time==0) $time = -1;	
						$cevent->setDate($date);
						$cevent->setTime($time);
					} 
					continue;
				}
				
				if ($left == "DESCRIPTION"){
					$cevent->setNote($right);
					continue;
				}				
			}

			
			
			if ($value == "END:VEVENT"){
				
				if ($cevent == null) throw $this->err($line,"END:VEVENT before BEGIN:VEVENT");
				$ret[] = $cevent;
				$cevent = null;
				
				continue;
			}
			
			if ($value == "END:VCALENDAR"){
				if ($cevent != null) throw $this->err($line,"END:VCALENDAR before END:VEVENT");
				
				break;
			}
			
			$line++;
		}
		
		return $ret;
	}	
	
	
	function err($line,$msg="") {
		$err = new Exception("parsing error ", 1); 
		$err->parseLine=$line;
		$err->msg=$msg;
		return $err;
	}		
}
	