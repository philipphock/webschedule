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
		return $this->date; //TODO;
	}
	public function getFormattedTime(){
		return $this->time; //TODO;
	}
	
	public function getMonth(){
		return $this->date; //TODO;
	}
	public function getDay(){
		return $this->time; //TODO;
	}
	public function getYear(){
		return $this->date; //TODO;
	}
	public function getHour(){
		return $this->time; //TODO;
	}
	public function getMinute(){
		return $this->time; //TODO;
	}
	
}
