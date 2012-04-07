<?php
class Appointment{
	
	public function __construct($id, $name, $date, $time, $note){
		$this->id=$id;
		$this->name=$name;
		$this->date=$date;
		$this->time=$time;
		$this->note=$note;	
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


	public function setDate($date){
		$this->date = $date;
	}
	public function setTime($time){
		$this->time = $time;
	}
	public function setNote($note){
		$this->note = $note;
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
