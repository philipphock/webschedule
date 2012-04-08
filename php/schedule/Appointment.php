<?php
class Appointment{
	
	public function __construct($id, $name, $date, $time, $note,$seen){
		$this->id=$id;
		$this->name=$name;
		$this->date=$date;
		$this->time=$time;
		$this->note=$note;
		$this->seen=$seen;		
	}
	
	public function getId(){
		return $this->id;
	}
	public function getDate(){
		return $this->date;
	}
	public function getTime(){
		return $this->time;
	}
	public function getNote(){
		return $this->note;
	}
	public function isSeen(){
		return $this->seen;
	}
	public function getName(){
		return $this->name;
	}


	public function setDate($date){
		$this->date = $date;
	}
	public function setTime($time){
		$this->time = $time;
	}
	public function setNote($note){
		$this->note = $note;
	}
	public function setSeen($seen){
		$this->seen = $seen;
	}

	public function getFormattedDate(){
		
		return $this->getDay() . "." . $this->getMonth() . "." . $this->getYear();
	}
	public function getFormattedTime(){
		if ($this->getTime() == -1) return "";
		return $this->getMinute() . ":" . $this->getHour();  
	}
	
	public function getMonth(){
		return substr($this->date,4,2);
	}
	public function getDay(){
		return substr($this->date,6,2);
	}
	public function getYear(){
		return substr($this->date,0,4);
	}
	public function getHour(){
		$timestr = $this->time."";
		while (strlen($timestr)<4){
			$timestr = "0".$timestr;
		}
		return substr($timestr,0,2);
	}
	public function getMinute(){
		$timestr = $this->time."";
		while (strlen($timestr)<4){
			$timestr = "0".$timestr;
		}
		return substr($timestr,2,2);
	}
	
}
